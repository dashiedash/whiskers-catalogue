<!DOCTYPE html>
<html>

<x-head />

<body class="bg-slate-100">
  <x-header class="sticky top-0" />
  <x-hero class="" />
  <x-book-table :books="$books" class="" />
  <div class="mt-6 p-4">
    {{ $books->links() }}
  </div>
  <x-footer class="bg-slate-300" />
  <x-flash-message />
</body>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://kit.fontawesome.com/a7437f466d.js" crossorigin="anonymous"></script>
<script src="//unpkg.com/alpinejs" defer></script>

</html>
