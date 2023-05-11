<main>
  <div class="container my-7 mx-auto max-w-screen-xl rounded-lg">
    <div class="flex flex-wrap justify-evenly">
      @foreach ($books as $book)
        <div class="m-3 flex w-full bg-white p-7 md:w-2/5">
          <div class="w-1/4">
            <img class="w-full" src="\images\default-cover.png" alt="" />
          </div>
          <div class="w-3/4 px-3">
            <a href="book/{{ $book['id'] }}">
              <h3 class="text-xl font-bold">
                {{ $book->title }}
              </h3>
              <p class="text-sm italic text-slate-600">{{ $book->subtitle }}</p>
            </a>
            <div class="bg-slate-950 px-3 pb-1 w-fit my-1 rounded-full">
              <span class="text-xs text-white">{{ $book->genre }}</span>
            </div>
            <p class="my-2 font-bold">{{ $book->author_first_name }} {{ $book->author_last_name }}</p>
            <p class="my-3 font-bold">$ {{ $book->price }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</main>
