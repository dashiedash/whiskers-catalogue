<!DOCTYPE html>
<html>

<x-head />

<body class="bg-slate-100">
  <x-header class="" />

  <main>
    <div class="container mx-auto my-7 rounded-lg bg-white p-7">
      <div class="my-3 flex items-center justify-between">
        <a href="#" onclick="history.back()" class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
            <path fill-rule="evenodd"
              d="M7.793 2.232a.75.75 0 01-.025 1.06L3.622 7.25h10.003a5.375 5.375 0 010 10.75H10.75a.75.75 0 010-1.5h2.875a3.875 3.875 0 000-7.75H3.622l4.146 3.957a.75.75 0 01-1.036 1.085l-5.5-5.25a.75.75 0 010-1.085l5.5-5.25a.75.75 0 011.06.025z"
              clip-rule="evenodd" />
          </svg>
          <span class="p-1">Back</span>
        </a>
        <div class="flex space-x-3">
        @auth
          <a href="{{ route('books.edit', $book->id) }}"
            class="rounded bg-teal-500 py-2 px-5 text-sm font-bold text-white hover:bg-teal-400">
            Edit
          </a>
          <form action="/book/{{ $book->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
              class="rounded bg-rose-500 py-2 px-5 text-sm font-bold text-white hover:bg-rose-700">
              Delete
            </button>
          </form>
        @endauth
        </div>
      </div>
      <div class="flex">
        <div class="w-1/4">
          <img class="w-full"
            src="{{ $book->cover ? asset('storage/' . $book->cover) : asset('images\default-cover.png') }}"
            alt="" />
        </div>
        <div class="w-3/4 px-7">
          <h3 class="text-xl font-bold">{{ $book->title }}</h3>
          <p class="text-sm italic text-slate-600">{{ $book->subtitle }}</p>
          <p class="font-bold">{{ $book->author_first_name }} {{ $book->author_last_name }}</p>
          <p class="my-3 font-bold">$ {{ $book->price }}</p>
          <p class="my-5 text-sm">{{ $book->description }}</p>
          <h4 class="font-bold">Information</h4>
          <table class="m-3 table-auto text-left text-xs">
            <tbody>
              <tr class="border border-solid border-slate-400">
                <th class="p-1">Title</th>
                <td class="p-1">{{ $book->title }}</td>
              </tr>
              <tr class="border border-solid border-slate-400">
                <th class="p-1">Author</th>
                <td class="p-1">{{ $book->author_first_name }} {{ $book->author_last_name }}</td>
              </tr>
              <tr class="border border-solid border-slate-400">
                <th class="p-1">Genre</th>
                <td class="p-1">{{ $book->genre }}</td>
              </tr>
              <tr class="border border-solid border-slate-400">
                <th class="p-1">Store Price</th>
                <td class="p-1">$ {{ $book->price }} </td>
              </tr>
              <tr class="border border-solid border-slate-400">
                <th class="p-1">Year Published</th>
                <td class="p-1">{{ $book->publish_year }}</td>
              </tr>
              <tr class="border border-solid border-slate-400">
                <th class="p-1">Publisher</th>
                <td class="p-1">{{ $book->publisher }}</td>
              </tr>
              <tr class="border border-solid border-slate-400">
                <th class="p-1">Place Published</th>
                <td class="p-1">
                  {{ $book->publish_city }},
                  {{ $book->publish_state }},
                  {{ $book->publish_country }}
                </td>
              </tr>
              <tr class="border border-solid border-slate-400">
                <th class="p-1">ISBN</th>
                <td class="p-1">{{ $book->isbn }}</td>
              </tr>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>

  <x-footer class="bg-slate-300" />
  <x-flash-message />
</body>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://kit.fontawesome.com/a7437f466d.js" crossorigin="anonymous"></script>

</html>
