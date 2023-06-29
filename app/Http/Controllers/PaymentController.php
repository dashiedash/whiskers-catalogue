<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Omnipay\Omnipay;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $gateway;
    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_SANDBOX_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_SANDBOX_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request)
    {
        try {
            $response = $this->gateway
                ->purchase([
                    'amount' => $request->amount,
                    'currency' => env('PAYPAL_CURRENCY'),
                    'returnUrl' => url('success'),
                    'cancelUrl' => url('error'),
                ])
                ->send();

            if ($response->isRedirect()) {
                $response->redirect();
            } else {
                return $response->getMessage();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function success(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase([
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ]);

            $response = $transaction->send();

            if ($response->isSuccessful()) {
                $arr = $response->getData();

                $payment = new Payment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];

                $payment->save();

                // Update book stock based on quantities in the user's cart
                $user = auth()->user();
                $cartItems = $user->cartItems()->with('book')->get();

                foreach ($cartItems as $cartItem) {
                    $book = $cartItem->book;
                    $quantity = $cartItem->quantity;

                    if ($book->stock >= $quantity) {
                        $book->stock -= $quantity;
                        $book->save();
                    }
                }

                $user->cartItems()->delete();

                return view('payment.after', [
                    'paymentHeading' => 'Payment Successful',
                    'paymentMessage' => 'Your payment has been successful.',
                    'transactionId' => $arr['id']
                ]);
            } else {
                return view('payment.after', [
                    'paymentHeading' => 'Payment Declined',
                    'paymentMessage' => 'Your payment has been declined.',
                    'transactionId' => null
                ]);
            }
        } else {
            return view('payment.after', [
                'paymentHeading' => 'User Declined',
                'paymentMessage' => 'The user has declined the payment.',
                'transactionId' => null
            ]);
        }
    }

    public function error()
    {
        return "User has declined the payment.";
    }
}
