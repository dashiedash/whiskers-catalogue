<!DOCTYPE html>
<html>

<x-head />

<body class="bg-slate-100">
  <x-header class="sticky top-0" />

  <div class="container p-7">
    <form action="{{ 'book-store' }}" method="POST" class="mx-auto max-w-md rounded bg-white p-8 shadow">
      @csrf
      {{-- Author's Last Name --}}
      <div class="mb-4">
        <label for="author_last_name" class="mb-2 block font-bold text-gray-700">Author's Last Name</label>
        <input type="text" name="author_last_name" id="author_last_name"
          class="form-input w-full rounded border border-slate-500 p-2">
      </div>

      {{-- Author's First Name --}}
      <div class="mb-4">
        <label for="author_first_name" class="mb-2 block font-bold text-gray-700">Author's First Name</label>
        <input type="text" name="author_first_name" id="author_first_name"
          class="form-input w-full rounded border border-slate-500 p-2">
      </div>

      {{-- Year Published --}}
      <div class="mb-4">
        <label for="publish_year" class="mb-2 block font-bold text-gray-700">Year Published</label>
        <input type="number" min="1000" max="{{ date('Y') }}" name="publish_year" id="publish_year"
          class="form-input w-full rounded border border-slate-500 p-2">
      </div>

      {{-- Title --}}
      <div class="mb-4">
        <label for="title" class="mb-2 block font-bold text-gray-700">Title</label>
        <input type="text" name="title" id="title"
          class="form-input w-full rounded border border-slate-500 p-2">
      </div>

      {{-- Subtitle --}}
      <div class="mb-4">
        <label for="title" class="mb-2 block font-bold text-gray-700">Subtitle <span
            class="align-top text-xs font-normal italic">(optional)</span> </label>
        <input type="text" name="title" id="title"
          class="form-input w-full rounded border border-slate-500 p-2">
      </div>

      {{-- Genre  --}}
      <div class="mb-4">
        <label for="genre" class="mb-2 block font-bold text-gray-700">Genre</label>
        <select name="genre" id="genre" class="form-select w-full rounded p-2">
          @foreach ($genres as $genre)
            <option value="{{ $genre }}">{{ $genre }}</option>
          @endforeach
        </select>
      </div>

      {{-- Publisher --}}
      <div class="mb-4">
        <label for="publisher" class="mb-2 block font-bold text-gray-700">Publisher</label>
        <input type="text" name="publisher" id="publisher"
          class="form-input w-full rounded border border-slate-500 p-2">
      </div>

      {{-- Publisher City --}}
      <div class="mb-4">
        <label for="publish_city" class="mb-2 block font-bold text-gray-700">City</label>
        <input type="text" name="publish_city" id="publish_city"
          class="form-input w-full rounded border border-slate-500 p-2">
      </div>

      {{-- Publisher State --}}
      <div class="mb-4">
        <label for="publish_state" class="mb-2 block font-bold text-gray-700">State/Province</label>
        <input type="text" name="publish_state" id="publish_state"
          class="form-input w-full rounded border border-slate-500 p-2">
      </div>

      {{-- Publisher Country --}}
      <div class="mb-4">
        <label for="publish_country" class="mb-2 block font-bold text-gray-700">Country</label>
        <input type="text" name="publish_country" id="publish_country"
          class="form-input w-full rounded border border-slate-500 p-2">
      </div>

      {{-- Description --}}
      <div class="mb-4">
        <label for="description" class="mb-2 block font-bold text-gray-700">Description</label>
        <textarea name="description" id="description" rows="7"
          class="form-input w-full rounded border border-slate-500 p-2"></textarea>
      </div>

      {{-- ISBN --}}
      <div class="mb-4">
        <label for="isbn" class="mb-2 block font-bold text-gray-700">ISBN</label>
        <input type="number" min="1000000000" max="9999999999" name="isbn" id="isbn"
          class="form-input w-full rounded border border-slate-500 p-2">
      </div>

      {{-- Stock --}}
      <div class="mb-4">
        <label for="stock" class="mb-2 block font-bold text-gray-700">Stock Available</label>
        <input type="number" min="0" max="50" name="stock" id="stock"
          class="form-input w-full rounded border border-slate-500 p-2">
      </div>

      {{-- Price --}}
      <div class="mb-4">
        <label for="price" class="mb-2 block font-bold text-gray-700">Price</label>
        <input type="number" min="10" max="200" name="price" id="price"
          class="form-input w-full rounded border border-slate-500 p-2">
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
