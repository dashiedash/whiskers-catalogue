<!DOCTYPE html>
<html>

<x-head />

<body class="bg-slate-100">
  <x-header class="" />

  <main>
    <div class="container mx-auto my-7 rounded-lg bg-white p-7">
      <div class="flex">
        <div class="w-1/4">
          <img class="w-full" src="\images\default-cover.png" alt="" />
        </div>
        <div class="w-3/4 px-3">
          <h3 class="text-xl font-bold">{{ $book->title }}</h3>
          <p class="text-sm italic text-slate-600">{{ $book->subtitle }}</p>
          <p class="font-bold">{{ $book->author_first_name }} {{ $book->author_last_name }}</p>
          <p class="my-3 font-bold">$ {{ $book->price }}</p>
          <p class="my-5 text-sm">{{ $book->description }}</p>
          <h4 class="text-center font-bold">Information</h4>
          <table class="m-3 w-full table-auto text-left text-xs">
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
</body>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://kit.fontawesome.com/a7437f466d.js" crossorigin="anonymous"></script>

</html>
