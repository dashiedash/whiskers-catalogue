<header {{ $attributes->class('bg-slate-100') }}>
  <div class="container mx-auto">
    <nav x-data=" { isOpen: false }" class="">
      {{--  Nav Bar --}}
      <div class="flex max-w-screen-xl items-center justify-between">
        {{-- Logo --}}
        <div class="p-2">
          <a href="/">
            {{-- This is a cat logo. Don't let the monstrous code scare you. --}}
            <svg class="h-full w-12" version="1.1" viewBox="70 0 560 560" xmlns="http://www.w3.org/2000/svg">
              <path
                d="m350 0c154.64 0 280 125.36 280 280s-125.36 280-280 280c-154.63 0-280-125.36-280-280s125.36-280 280-280zm-49.656 317.94c-55.684 19.367-60.715 21.898-60.73 21.914l2.6367 4.4219c0.019531-0.007813 4.6055-2.2773 59.785-21.469l-1.6914-4.8633zm0-10.465c-43.285 15.059-47.184 17.008-47.191 17.008l2.3047 4.6055c0.007813-0.007813 3.6094-1.8047 46.582-16.75l-1.6914-4.8633zm0-9.6875c-35.973 12.512-39.324 14.227-39.328 14.23l2.8594 4.2969c0.007812 0 2.8516-1.3789 38.164-13.664l-1.6914-4.8633zm99.316 20.152c55.684 19.367 60.723 21.898 60.734 21.914l-2.6445 4.4219c-0.015625-0.007813-4.6016-2.2773-59.785-21.469l1.6914-4.8633zm0-10.465c43.285 15.059 47.184 17.008 47.199 17.008l-2.3047 4.6055c-0.015625-0.007813-3.6094-1.8047-46.586-16.75zm0-9.6875c35.973 12.512 39.328 14.227 39.336 14.23l-2.8672 4.2969c-0.007812 0-2.8438-1.3789-38.164-13.664l1.6914-4.8633zm-49.66 43.078 43.293-42.242h-86.574l43.285 42.242zm-69.512-128.36c-21.594 0-39.109 16.863-39.109 37.656 0 20.797 17.512 37.656 39.109 37.656 21.594 0 39.102-16.863 39.102-37.656 0-20.797-17.508-37.656-39.102-37.656zm30.621 36.324c-12.672 33.391-58.188 11.719-42.945-22.316-52.41 48.078 39.211 84.75 42.945 22.316zm108.41-36.324c21.594 0 39.109 16.863 39.109 37.656 0 20.797-17.512 37.656-39.109 37.656-21.594 0-39.109-16.863-39.109-37.656 0-20.797 17.512-37.656 39.109-37.656zm-30.621 36.324c12.664 33.391 58.188 11.719 42.945-22.316 52.402 48.078-39.211 84.75-42.945 22.316zm52.707-84.176 66.535-39.309 10.629 8.4922-25.73 79.348c14.496 22.094 22.496 47.703 22.496 74.168 0 88.281-82.281 147.3-165.54 147.3-83.254 0-165.54-59.016-165.54-147.3 0-26.48 8-52.07 22.496-74.168l-25.73-79.348 10.637-8.4922 66.531 39.309c27.68-16.383 59.492-24.598 91.602-24.598 32.094 0 63.949 8.2148 91.605 24.598zm57.391-16.98-57.559 34.008c-28.656-18.055-57.383-27.035-91.441-27.035-33.957 0-62.781 9.0078-91.441 27.035l-57.543-34.008 21.988 67.828c-15.41 22.273-23.938 44.43-23.938 71.852 0 80.199 75.73 132.7 150.93 132.7s150.95-52.5 150.95-132.7c0-27.297-8.5273-49.605-23.945-71.852z"
                fill-rule="evenodd" />
            </svg>
          </a>
        </div>
        {{-- Search Bar --}}
        <div class="flex w-3/4 justify-between space-x-6 p-2 py-2 px-5">
          <form action="{{ route('layout.index') }}" method="GET" class="w-full">
            @csrf
            <div class="text-gray-40 relative flex items-center">
              <svg class="pointer-events-none absolute ml-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor" class="h-5 w-5">
                <path fill-rule="evenodd"
                  d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                  clip-rule="evenodd" />
              </svg>

              <input type="text" name="search" placeholder="Find books..." autocomplete="off"
                class="border-non ring-02 w-full rounded-2xl py-2 pr-3 pl-10 text-black placeholder-gray-400 ring-gray-300 focus:ring-2 focus:ring-gray-500">
            </div>
          </form>
        </div>
        {{-- Nav Links --}}
        <div class="hidden w-1/2 p-2 md:block">
          <ul class="hidden items-center justify-between md:flex">
            <li class="px-1 py-1">
              <a href="/" class="flex items-center">
                <i class="fa-solid fa-store mx-1 text-sm"></i>
                <span class="text-sm font-semibold uppercase">Store</span>
              </a>
            </li>
            <li class="px-1 py-1">
              <a href="" class="flex items-center">
                <i class="fa-solid fa-cart-shopping mx-1 text-sm"></i>
                <span class="text-sm font-semibold uppercase">Cart</span>
              </a>
            </li>
            @auth
              <li class="px-1 py-1">
                <form action="/logout" method="POST" class="inline">
                  @csrf
                  <button type="submit" class="w-full text-left">
                    <i class="fa-solid fa-arrow-right-from-bracket mx-1 text-sm"></i>
                    <span class="text-sm font-semibold uppercase">Logout</span>
                  </button>
                </form>
              </li>
            @else
              <li class="px-1 py-1">
                <a href="/login" class="flex items-center">
                  <i class="fa-solid fa-circle-user mx-1 text-sm"></i>
                  <span class="text-sm font-semibold uppercase">Account</span>
                </a>
              </li>
            @endauth
          </ul>
        </div>
        {{-- Mobile Menu --}}
        <div class="p-3 md:hidden">
          <button type="button"
            aria-label="toggle menu"
            @click="isOpen = !isOpen">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
              <path fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10zm0 5.25a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75a.75.75 0 01-.75-.75z"
                clip-rule="evenodd" />
            </svg>
          </button>
        </div>
      </div>
      {{-- Mobile Nav Links --}}
      <div x-show="isOpen" class="items-center md:flex md:hidden">
        @auth
          <div class="my-1 mx-5">
            <p class="uppercase">Hello, {{ auth()->user()->name }} &#128513</p>
          </div>
        @endauth
        <ul class="flex flex-col justify-between md:ml-6 md:flex-row">
          <li class="px-3 py-2 hover:bg-slate-300">
            <a href="" class="flex items-center">
              <i class="fa-solid fa-store mx-2 text-sm"></i>
              <span class="text-sm font-semibold uppercase">Store</span>
            </a>
          </li>

          <li class="px-3 py-2 hover:bg-slate-300">
            <a href="" class="flex items-center">
              <i class="fa-solid fa-cart-shopping mx-2 text-sm"></i>
              <span class="text-sm font-semibold uppercase">Cart</span>
            </a>
          </li>

          <li class="px-3 py-2 hover:bg-slate-300">
            <a href="/login" class="flex items-center">
              <i class="fa-solid fa-circle-user mx-2 text-sm"></i>
              <span class="text-sm font-semibold uppercase">Account</span>
            </a>
          </li>
          @auth
            <li class="px-3 py-2 hover:bg-slate-300">
              <form action="/logout" method="POST" class="inline">
                @csrf
                <button type="submit" class="w-full text-left">
                  <i class="fa-solid fa-arrow-right-from-bracket ml-2 mr-1 text-sm"></i>
                  <span class="text-sm font-semibold uppercase">Logout</span>
                </button>
              </form>
              </a>
            </li>
          @endauth

      </div>
    </nav>
  </div>
</header>
