<!DOCTYPE html>
<html>

<x-head />

<body class="bg-slate-100">
  <x-header class="sticky top-0" />

  <div class="container p-7">
    <form action="{{ '/book' }}" method="POST" class="mx-auto max-w-md rounded bg-white p-11 shadow">
      @csrf
      <div class="my-3 flex items-center justify-between">
        <h2 class="text-2xl font-bold">Create a book</h2>
        <a href="/" class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
            <path fill-rule="evenodd"
              d="M7.793 2.232a.75.75 0 01-.025 1.06L3.622 7.25h10.003a5.375 5.375 0 010 10.75H10.75a.75.75 0 010-1.5h2.875a3.875 3.875 0 000-7.75H3.622l4.146 3.957a.75.75 0 01-1.036 1.085l-5.5-5.25a.75.75 0 010-1.085l5.5-5.25a.75.75 0 011.06.025z"
              clip-rule="evenodd" />
          </svg>
          <span class="p-1">Back</span>
        </a>
      </div>
      {{-- Author's Last Name --}}
      <div class="mb-4">
        <label for="author_last_name" class="mb-2 block font-bold text-gray-700">Author's Last Name</label>
        <input type="text" name="author_last_name" id="author_last_name" value="{{ old('author_last_name') }}"
          class="form-input w-full rounded border border-slate-500 p-2">
        @error('author_last_name')
          <p class="text-xs italic text-red-500">{{ $message }}</p>
        @enderror
      </div>

      {{-- Author's First Name --}}
      <div class="mb-4">
        <label for="author_first_name" class="mb-2 block font-bold text-gray-700">Author's First Name</label>
        <input type="text" name="author_first_name" id="author_first_name" value="{{ old('author_last_name') }}"
          class="form-input w-full rounded border border-slate-500 p-2">
        @error('author_first_name')
          <p class="text-xs italic text-red-500">{{ $message }}</p>
        @enderror
      </div>

      {{-- Year Published --}}
      <div class="mb-4">
        <label for="publish_year" class="mb-2 block font-bold text-gray-700">Year Published</label>
        <input type="number" min="1000" max="{{ date('Y') }}" name="publish_year"
          value="{{ old('publish_year') }}" id="publish_year"
          class="form-input w-full rounded border border-slate-500 p-2">
        @error('publish-year')
          <p class="text-xs italic text-red-500">{{ $message }}</p>
        @enderror
      </div>

      {{-- Title --}}
      <div class="mb-4">
        <label for="title" class="mb-2 block font-bold text-gray-700">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}"
          class="form-input w-full rounded border border-slate-500 p-2">
        @error('title')
          <p class="text-xs italic text-red-500">{{ $message }}</p>
        @enderror
      </div>

      {{-- Subtitle --}}
      <div class="mb-4">
        <label for="subtitle" class="mb-2 block font-bold text-gray-700">Subtitle <span
            class="align-top text-xs font-normal italic">(optional)</span> </label>
        <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle') }}"
          class="form-input w-full rounded border border-slate-500 p-2">
      </div>

      {{-- Genre  --}}
      <div class="mb-4">
        <label for="genre" class="mb-2 block font-bold text-gray-700">Genre</label>
        <select name="genre" id="genre" value="{{ old('genre') }}"
          class="form-select w-full rounded border border-slate-500 p-2">
          @foreach ($genres as $genre)
            <option value="{{ $genre }}">{{ $genre }}</option>
          @endforeach
        </select>
        @error('genre')
          <p class="text-xs italic text-red-500">{{ $message }}</p>
        @enderror
      </div>

      {{-- Publisher --}}
      <div class="mb-4">
        <label for="publisher" class="mb-2 block font-bold text-gray-700">Publisher</label>
        <input type="text" name="publisher" id="publisher" value="{{ old('publisher') }}"
          class="form-input w-full rounded border border-slate-500 p-2">
        @error('publisher')
          <p class="text-xs italic text-red-500">{{ $message }}</p>
        @enderror
      </div>

      {{-- Publisher City --}}
      <div class="mb-4">
        <label for="publish_city" class="mb-2 block font-bold text-gray-700">City</label>
        <input type="text" name="publish_city" id="publish_city" value="{{ old('publish_city') }}"
          class="form-input w-full rounded border border-slate-500 p-2">
        @error('publish_city')
          <p class="text-xs italic text-red-500">{{ $message }}</p>
        @enderror
      </div>

      {{-- Publisher State --}}
      <div class="mb-4">
        <label for="publish_state" class="mb-2 block font-bold text-gray-700">State/Province</label>
        <input type="text" name="publish_state" id="publish_state" value="{{ old('publish_state') }}"
          class="form-input w-full rounded border border-slate-500 p-2">
        @error('publish_city')
          <p class="text-xs italic text-red-500">{{ $message }}</p>
        @enderror
      </div>

      {{-- Publisher Country --}}
      <div class="mb-4">
        <label for="publish_country" class="mb-2 block font-bold text-gray-700">Country</label>
        <input type="text" name="publish_country" id="publish_country" value="{{ old('publish_country') }}"
          class="form-input w-full rounded border border-slate-500 p-2">
        @error('publish_country')
          <p class="text-xs italic text-red-500">{{ $message }}</p>
        @enderror
      </div>

      {{-- Description --}}
      <div class="mb-4">
        <label for="description" class="mb-2 block font-bold text-gray-700">Description</label>
        <textarea name="description" id="description" value="{{ old('description') }}" rows="7"
          class="form-input w-full rounded border border-slate-500 p-2"></textarea>
        @error('description')
          <p class="text-xs italic text-red-500">{{ $message }}</p>
        @enderror
      </div>

      {{-- ISBN --}}
      <div class="mb-4">
        <label for="isbn" class="mb-2 block font-bold text-gray-700">ISBN</label>
        <input type="number" min="1000000000" max="9999999999" name="isbn" id="isbn"
          value="{{ old('isbn') }}"
          class="form-input w-full rounded border border-slate-500 p-2">
        @error('isbn')
          <p class="text-xs italic text-red-500">{{ $message }}</p>
        @enderror
      </div>

      {{-- Stock --}}
      <div class="mb-4">
        <label for="stock" class="mb-2 block font-bold text-gray-700">Stock Available</label>
        <input type="number" min="0" max="50" name="stock" id="stock"
          value="{{ old('stock') }}"
          class="form-input w-full rounded border border-slate-500 p-2">
        @error('stock')
          <p class="text-xs italic text-red-500">{{ $message }}</p>
        @enderror
      </div>

      {{-- Price --}}
      <div class="mb-4">
        <label for="price" class="mb-2 block font-bold text-gray-700">Price</label>
        <input type="number" min="10" max="200" name="price" id="price"
          value="{{ old('price') }}"
          class="form-input w-full rounded border border-slate-500 p-2">
        @error('price')
          <p class="text-xs italic text-red-500">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex justify-end">
        <button type="submit" class="rounded bg-teal-700 py-2 px-4 font-bold text-white hover:bg-teal-600">
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
