<!DOCTYPE html>
<html>

<x-head />

<body class="bg-slate-100">
  <x-header class="sticky top-0" />
  <div class="container m-7">
    <div class="">
      @php
        $lastLetter = strtolower(substr(auth()->user()->name, -1));
        $cartText = $lastLetter === 's' ? auth()->user()->name . "' cart" : auth()->user()->name . "'s Cart";
      @endphp

      <h2 class="uppercase text-xl font-bold">{{ $cartText }}</h2>
    </div>
  </div>
  <x-footer class="bg-slate-300" />
  <x-flash-message />
</body>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://kit.fontawesome.com/a7437f466d.js" crossorigin="anonymous"></script>
<script src="//unpkg.com/alpinejs" defer></script>

</html>
