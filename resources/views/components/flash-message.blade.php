@if (session()->has('message'))
  <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
    class="fixed top-0 mb-4 w-full bg-slate-700 p-5 text-center text-white">
    {{ session('message') }}
  </div>
@endif

@if (session()->has('success'))
  <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
    class="fixed top-0 mb-4 w-full bg-teal-700 p-5 text-center text-white">
    {{ session('success') }}
  </div>
@endif

@if (session()->has('error'))
  <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
    class="fixed top-0 mb-4 w-full bg-red-700 p-5 text-center text-white">
    {{ session('error') }}
  </div>
@endif