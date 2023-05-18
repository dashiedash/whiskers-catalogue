<main>
  <div class="container my-7 mx-auto max-w-screen-xl rounded-lg">
    @if (request('tag') || request('search'))
      <div class="m-3 flex items-center justify-between">
        <p>Searching for "{{ request('tag') ?? request('search') }}"...</p>
        <a href="{{ url()->previous() }}" class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-3">
            <path fill-rule="evenodd"
              d="M7.793 2.232a.75.75 0 01-.025 1.06L3.622 7.25h10.003a5.375 5.375 0 010 10.75H10.75a.75.75 0 010-1.5h2.875a3.875 3.875 0 000-7.75H3.622l4.146 3.957a.75.75 0 01-1.036 1.085l-5.5-5.25a.75.75 0 010-1.085l5.5-5.25a.75.75 0 011.06.025z"
              clip-rule="evenodd" />
          </svg>
          <span class="p-1">Back</span>
        </a>
      </div>
    @endif
    <div class="flex flex-wrap justify-evenly">
      @if ($books->isEmpty())
        <p>We don't have "{{ request('tag') }}" books yet. Sorry :(</p>
      @else
        @foreach ($books as $book)
          <div class="m-3 flex w-full bg-white p-7 shadow-lg md:w-2/5">
            <div class="w-1/4">
              <img class="w-full" src="\images\default-cover.png" alt="" />
            </div>
            <div class="w-3/4 px-3">
              <a href="book/{{ $book['id'] }}">
                <h3 class="text-lg font-bold">
                  {{ $book->title }}
                </h3>
                <p class="text-sm italic text-slate-600">{{ $book->subtitle }}</p>
              </a>
              <div class="bg-slate-950 my-1 w-fit rounded-full px-3 pb-1">
                <a href="/?tag={{ urlencode($book->genre) }}"><span
                    class="text-xs text-white">{{ $book->genre }}</span></a>
              </div>
              <p class="my-2 font-bold">{{ $book->author_first_name }} {{ $book->author_last_name }}</p>
              <p class="my-3 font-bold">$ {{ $book->price }}</p>
            </div>
          </div>
        @endforeach
      @endif
    </div>
  </div>
</main>
