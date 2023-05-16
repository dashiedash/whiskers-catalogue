<!DOCTYPE html>
<html>

<x-head />

<body class="bg-slate-100">
  <x-header class="sticky top-0" />

  <main>
    <div class="container my-7 mx-auto max-w-screen-xl">
      <div class="flex h-screen items-center justify-center">
        <div class="w-96 rounded-lg bg-white p-8 shadow-lg">
          <div class="mb-8 flex items-center justify-between">
            <h2 class="text-2xl font-bold">Register</h2>
            <a href="{{ url()->previous() }}" class="flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-3">
                <path fill-rule="evenodd"
                  d="M7.793 2.232a.75.75 0 01-.025 1.06L3.622 7.25h10.003a5.375 5.375 0 010 10.75H10.75a.75.75 0 010-1.5h2.875a3.875 3.875 0 000-7.75H3.622l4.146 3.957a.75.75 0 01-1.036 1.085l-5.5-5.25a.75.75 0 010-1.085l5.5-5.25a.75.75 0 011.06.025z"
                  clip-rule="evenodd" />
              </svg>
              <span class="p-1">Back</span>
            </a>
          </div>
          <form action="{{ route('register') }}" method="POST">
            @csrf
            {{-- Username --}}
            <div class="mb-4">
              <label for="name" class="my-1 block font-bold text-gray-700">Username</label>
              <input type="name" name="name" id="name" value="{{ old('name') }}"
                class="form-input w-full rounded border border-slate-500 p-2" required autofocus>
              @error('name')
                <p class="text-xs italic text-red-500">{{ $message }}</p>
              @enderror
            </div>

            {{-- Email --}}
            <div class="mb-4">
              <label for="email" class="my-1 block font-bold text-gray-700">Email</label>
              <input type="email" name="email" id="email" value="{{ old('email') }}"
                class="form-input w-full rounded border border-slate-500 p-2" required autofocus>
              @error('email')
                <p class="text-xs italic text-red-500">{{ $message }}</p>
              @enderror
            </div>

            {{-- Password --}}
            <div class="mb-6">
              <label for="password" class="my-1 block font-bold text-gray-700">Password</label>
              <input type="password" name="password" id="password" autocomplete="new-password"
                class="form-input w-full rounded border border-slate-500 p-2" required>
              @error('password')
                <p class="my-1 text-xs italic text-red-500">{{ $message }}</p>
              @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="mb-6">
              <label for="password_confirmation" class="my-1 block font-bold text-gray-700">Confirm Password</label>
              <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password"
                class="form-input w-full rounded border border-slate-500 p-2" required>
              @error('password_confirmation')
                <p class="my-1 text-xs italic text-red-500">{{ $message }}</p>
              @enderror
            </div>

            <div class="flex items-center justify-between">
              <button type="submit" class="rounded bg-teal-700 py-2 px-4 font-bold text-white hover:bg-teal-600">
                Register
              </button>
              <p class="text-sm">Already Registered? <a href="/register" class="font-bold text-rose-400">Login here.</a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>

  <x-footer class="bg-slate-300" />
</body>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://kit.fontawesome.com/a7437f466d.js" crossorigin="anonymous"></script>

</html>
