<!DOCTYPE html>
<html>

<x-head />

<body class="bg-slate-100">
  <x-header class="sticky top-0" />
  <main>
    {{-- User's Cart Heading --}}
    <div class="m-5">
      <div>
        @php
          $lastLetter = strtolower(substr(auth()->user()->name, -1));
          $cartText = $lastLetter === 's' ? auth()->user()->name . "' cart" : auth()->user()->name . "'s Cart";
        @endphp

        <h2 class="text-xl font-bold uppercase">{{ $cartText }}</h2>
      </div>
    </div>

    {{-- User's Cart Items --}}
    <div class="container m-auto">
      <div class="flex flex-wrap justify-evenly">
        @if ($cartItems->isEmpty())
          <p>Your cart is empty.</p>
        @else
          <table class="min-w-full divide-y divide-gray-200">
            <thead>
              <tr>
                <th
                  class="bg-gray-50 px-5 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
                  Book Title
                </th>
                <th
                  class="bg-gray-50 px-5 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
                  Quantity
                </th>
                <th
                  class="bg-gray-50 px-5 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
                  Price
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
              @foreach ($cartItems as $cartItem)
                <tr>
                  <td class="whitespace-no-wrap flex content-center px-5 py-3">
                    <form action="{{ route('cart.remove', $cartItem) }}"
                      onsubmit="return confirm('Are you sure you want to remove &quot;{{ $cartItem->book->title }}&quot; from the cart?')"
                      method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit"
                        class="text-red-500 hover:text-red-700 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                          class="mr-3 h-5 w-5">
                          <path fill-rule="evenodd"
                            d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                            clip-rule="evenodd" />
                        </svg>

                      </button>
                    </form>
                    <a href="{{ route('books.show', $cartItem->book) }}" class="text-blue-700 hover:underline">
                      {{ $cartItem->book->title }}
                    </a>
                  </td>
                  <td class="whitespace-no-wrap px-5 py-3">
                    {{ $cartItem->quantity }}
                  </td>
                  <td class="whitespace-no-wrap w-1/4 px-5 py-3">
                    $ {{ $cartItem->book->price }}
                  </td>
                </tr>
              @endforeach

              <tr>
                <td class="whitespace-no-wrap px-6 py-4 text-right font-bold" colspan="2">Total:</td>
                <td class="whitespace-no-wrap px-6 py-4 font-bold">
                  $
                  {{ $cartItems->sum(function ($item) {
                      return $item->book->price * $item->quantity;
                  }) }}
                </td>
              </tr>
            </tbody>
          </table>
        @endif
      </div>
      <div class="flex justify-end py-3">
        <form action="{{ route('paypal.payment') }}" method="POST">
          @csrf

          <input type="hidden" name="amount"
            value="{{ $cartItems->sum(function ($item) {
                return $item->book->price * $item->quantity;
            }) }}">

          <div class="flex flex-row-reverse">
            <button type="submit" class="rounded bg-teal-500 py-2 px-4 font-bold text-white hover:bg-teal-700">
              Pay with PayPal
            </button>
          </div>
        </form>
      </div>
  </main>
  <x-footer class="bg-slate-300" />
  <x-flash-message />
</body>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://kit.fontawesome.com/a7437f466d.js" crossorigin="anonymous"></script>
<script src="//unpkg.com/alpinejs" defer></script>

</html>
