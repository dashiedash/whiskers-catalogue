<div class="container my-7 mx-auto w-full max-w-screen-xl rounded-lg px-3">
  <div class="flex flex-row-reverse justify-between">
    @auth
      <div class="">
        <a href="{{ route('book-create') }}"
          class="rounded-lg bg-teal-500 py-2 px-4 font-bold text-white hover:bg-teal-600">
          <i class="fa-solid fa-plus mr-2"></i>
          Add Book
        </a>
      </div>
      <div class="my-1 mx-5 hidden md:block">
        <p class="uppercase">Hello, {{ auth()->user()->name }} &#128513</p>
      </div>
    @endauth
  </div>
</div>
