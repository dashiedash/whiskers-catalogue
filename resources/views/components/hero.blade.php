<div class="flex flex-col flex-wrap items-center justify-between bg-amber-200 px-10 py-5">
  <h1 class="my-7 font-serif text-3xl font-bold">New Releases!</h1>
  <div class="flex justify-evenly py-7">
    @php
      use App\Models\Book;
      $newReleases = Book::latest()
          ->limit(4)
          ->get();
    @endphp
    @foreach ($newReleases as $book)
      <div class="flex max-h-64 w-1/6 justify-center">
        <a href="/book/{{ $book->id }}">
          <img class="h-full rounded-lg object-cover"
            src="{{ $book->cover ? asset('storage/' . $book->cover) : asset('images/default-cover.png') }}"
            alt="{{ $book->title }}" />
        </a>
      </div>
    @endforeach
  </div>
</div>
