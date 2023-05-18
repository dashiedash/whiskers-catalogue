<!DOCTYPE html>
<html>

<x-head />

<body class="bg-slate-100">
  <x-header class="sticky top-0" />

  <div class="container p-7">
    <form action="{{ 'book-store' }}" method="POST" class="mx-auto max-w-md rounded bg-white p-8 shadow">
      @csrf
      {{-- Title --}}
      <div class="mb-4">
        <label for="title" class="mb-2 block font-bold text-gray-700">Title:</label>
        <input type="text" name="title" id="title"
          class="w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500">
      </div>

      <div class="mb-4">
        <label for="author" class="mb-2 block font-bold text-gray-700">Author:</label>
        <input type="text" name="author" id="author"
          class="w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500">
      </div>

      {{-- Genre  --}}
      <div class="mb-4">
        <label for="genre" class="mb-2 block text-sm font-bold text-gray-700">Genre:</label>
        <select name="genre" id="genre" class="form-select">
          @foreach ($genres as $genre)
            <option value="{{ $genre }}">{{ $genre }}</option>
          @endforeach
        </select>
      </div>

      <div class="flex justify-end">
        <button type="submit" class="rounded bg-blue-500 py-2 px-4 font-bold text-white hover:bg-blue-600">
          Add Book
        </button>
      </div>
    </form>
  </div>

  <x-footer class="bg-slate-300" />
  <x-flash-message />
</body>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://kit.fontawesome.com/a7437f466d.js" crossorigin="anonymous"></script>
<script src="//unpkg.com/alpinejs" defer></script>

</html>
