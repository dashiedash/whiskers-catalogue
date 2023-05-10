<main>
  <div class="container my-7 mx-auto max-w-screen-xl rounded-lg">
    <div class="flex flex-wrap justify-evenly">
      @foreach ($books as $book)
        <div class="m-3 flex md:w-2/5 w-full bg-white p-7">
          <div class="w-1/4">
            <img class="w-full" src="\images\default-cover.png" alt="" />
          </div>
          <div class="w-3/4 px-3">
            <h3 class="text-xl font-bold">{{ $book->title }}</h3>
            <p class="text-sm italic text-slate-600">{{ $book->subtitle }}</p>
            <p class="font-bold">{{ $book->author_first_name }} {{ $book->author_last_name }}</p>
            <p class="my-3 font-bold">$ {{ $book->price }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</main>
