@if (session()->has('message'))
  <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
    class="fixed top-0 mb-4 w-full bg-teal-700 p-4 text-center text-white">
    {{ session('message') }}
  </div>
@endif
