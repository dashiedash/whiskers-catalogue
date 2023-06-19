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
        @forelse ($cartItems as $cartItem)
          <div class="m-3 flex w-full bg-white p-7 shadow-lg md:w-2/5">
            <div class="w-1/4">
              <img class="w-full"
                src="{{ $cartItem->book->cover ? asset('storage/' . $cartItem->book->cover) : asset('images\default-cover.png') }}"
                alt="" />
            </div>
            <div class="w-3/4 px-3">
              <a href="{{ route('books.show', ['id' => $cartItem->book->id]) }}"">
                <h3 class="text-lg font-bold">
                  {{ $cartItem->book->title }}
                </h3>
                <p class="text-sm italic text-slate-600">{{ $cartItem->book->subtitle }}</p>
              </a>
              <div class="bg-slate-950 my-1 w-fit rounded-full px-3 pb-1">
                <a href="/?tag={{ urlencode($cartItem->book->genre) }}"><span
                    class="text-xs text-white">{{ $cartItem->book->genre }}</span></a>
              </div>
              <p class="my-2 font-bold">{{ $cartItem->book->author_first_name }} {{ $cartItem->book->author_last_name }}
              </p>
              <p class="my-3 font-bold">$ {{ $cartItem->book->price }}</p>

              <form action="{{ route('cart.remove', ['id' => $cartItem->id]) }}" method="POST" class="mt-4">
                @csrf
                @method('DELETE')
                <button type="submit"
                  class="rounded bg-rose-500 py-2 px-3 text-sm font-bold text-white hover:bg-rose-400">
                  Remove
                </button>
              </form>
            </div>
          </div>
        @empty
          <p>Your cart is empty.</p>
        @endforelse
      </div>
      <div class="p-3">
        <form action="{{ route('paypal.payment') }}" method="POST">
          @csrf

          <input type="hidden" name="amount" value="10">

          <div class="flex-row-reverse flex">
            <button type="submit" class="rounded bg-teal-500 py-2 px-4 font-bold text-white hover:bg-teal-700">
              Pay with PayPal
            </button>
          </div>
        </form>
      </div>
    </div>
  </main>
  <x-footer class="bg-slate-300" />
  <x-flash-message />
</body>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://kit.fontawesome.com/a7437f466d.js" crossorigin="anonymous"></script>
<script src="//unpkg.com/alpinejs" defer></script>

</html>
