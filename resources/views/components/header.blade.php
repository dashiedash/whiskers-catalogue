<header {{ $attributes->class('bg-slate-100') }}>
  <div class="container mx-auto">
    <nav x-data=" { isOpen: false } " class="">
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
          <ul class="hidden justify-between md:flex">
            <li class="px-3 py-1">
              <a href="" class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                  class="mx-2 h-5 w-5">
                  <path
                    d="M2.879 7.121A3 3 0 007.5 6.66a2.997 2.997 0 002.5 1.34 2.997 2.997 0 002.5-1.34 3 3 0 104.622-3.78l-.293-.293A2 2 0 0015.415 2H4.585a2 2 0 00-1.414.586l-.292.292a3 3 0 000 4.243zM3 9.032a4.507 4.507 0 004.5-.29A4.48 4.48 0 0010 9.5a4.48 4.48 0 002.5-.758 4.507 4.507 0 004.5.29V16.5h.25a.75.75 0 010 1.5h-4.5a.75.75 0 01-.75-.75v-3.5a.75.75 0 00-.75-.75h-2.5a.75.75 0 00-.75.75v3.5a.75.75 0 01-.75.75h-4.5a.75.75 0 010-1.5H3V9.032z" />
                </svg>
                <span class="font-semibold uppercase">Store</span>
              </a>
            </li>
            <li class="px-3 py-1">
              <a href="" class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                  class="mx-2 h-5 w-5">
                  <path
                    d="M1 1.75A.75.75 0 011.75 1h1.628a1.75 1.75 0 011.734 1.51L5.18 3a65.25 65.25 0 0113.36 1.412.75.75 0 01.58.875 48.645 48.645 0 01-1.618 6.2.75.75 0 01-.712.513H6a2.503 2.503 0 00-2.292 1.5H17.25a.75.75 0 010 1.5H2.76a.75.75 0 01-.748-.807 4.002 4.002 0 012.716-3.486L3.626 2.716a.25.25 0 00-.248-.216H1.75A.75.75 0 011 1.75zM6 17.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15.5 19a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                </svg>
                <span class="font-semibold uppercase">Cart</span>
              </a>
            </li>
            <li class="px-3 py-1">
              <a href="" class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                  class="mx-2 h-5 w-5">
                  <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-5.5-2.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zM10 12a5.99 5.99 0 00-4.793 2.39A6.483 6.483 0 0010 16.5a6.483 6.483 0 004.793-2.11A5.99 5.99 0 0010 12z"
                    clip-rule="evenodd" />
                </svg>
                <span class="font-semibold uppercase">Account</span>
              </a>
            </li>
          </ul>
        </div>
        {{-- Mobile Menu --}}
        <div class="md:hidden p-3">
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
        <ul class="flex flex-col justify-between md:ml-6 md:flex-row">
          <li class="px-3 py-2 hover:bg-slate-300">
            <a href="" class="flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                class="mx-2 h-5 w-5">
                <path
                  d="M2.879 7.121A3 3 0 007.5 6.66a2.997 2.997 0 002.5 1.34 2.997 2.997 0 002.5-1.34 3 3 0 104.622-3.78l-.293-.293A2 2 0 0015.415 2H4.585a2 2 0 00-1.414.586l-.292.292a3 3 0 000 4.243zM3 9.032a4.507 4.507 0 004.5-.29A4.48 4.48 0 0010 9.5a4.48 4.48 0 002.5-.758 4.507 4.507 0 004.5.29V16.5h.25a.75.75 0 010 1.5h-4.5a.75.75 0 01-.75-.75v-3.5a.75.75 0 00-.75-.75h-2.5a.75.75 0 00-.75.75v3.5a.75.75 0 01-.75.75h-4.5a.75.75 0 010-1.5H3V9.032z" />
              </svg>
              <span class="font-semibold uppercase">Store</span>
            </a>
          </li>
          <li class="px-3 py-2 hover:bg-slate-300">
            <a href="" class="flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                class="mx-2 h-5 w-5">
                <path
                  d="M1 1.75A.75.75 0 011.75 1h1.628a1.75 1.75 0 011.734 1.51L5.18 3a65.25 65.25 0 0113.36 1.412.75.75 0 01.58.875 48.645 48.645 0 01-1.618 6.2.75.75 0 01-.712.513H6a2.503 2.503 0 00-2.292 1.5H17.25a.75.75 0 010 1.5H2.76a.75.75 0 01-.748-.807 4.002 4.002 0 012.716-3.486L3.626 2.716a.25.25 0 00-.248-.216H1.75A.75.75 0 011 1.75zM6 17.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15.5 19a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
              </svg>
              <span class="font-semibold uppercase">Cart</span>
            </a>
          </li>
          <li class="px-3 py-2 hover:bg-slate-300">
            <a href="" class="flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                class="mx-2 h-5 w-5">
                <path fill-rule="evenodd"
                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-5.5-2.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zM10 12a5.99 5.99 0 00-4.793 2.39A6.483 6.483 0 0010 16.5a6.483 6.483 0 004.793-2.11A5.99 5.99 0 0010 12z"
                  clip-rule="evenodd" />
              </svg>
              <span class="font-semibold uppercase">Account</span>
            </a>
          </li>
      </div>
    </nav>
  </div>
</header>
