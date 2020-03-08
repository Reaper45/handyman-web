 <nav x-data="{ open: false }" @keydown.window.escape="open = false" class="bg-indigo-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-32">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="h-8 w-8" src="{{ asset('img/logo.png') }}" alt="{{ config('app.name') }}" />
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline">
              <a href="{{ route('dashboard') }}" class="{{ (request()->is('dashboard*')) ? 'bg-gray-900 text-white' : 'text-gray-300' }} px-3 py-2 rounded-md text-sm font-medium focus:outline-none focus:text-white focus:bg-gray-700">Dashboard</a>
              <a href="{{ route('handymen') }}" class="{{ (request()->is('handymen*')) ? 'bg-gray-900 text-white' : 'text-gray-300' }} ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Handymen</a>
              <a href="{{ route('clients') }}" class="{{ (request()->is('clients*')) ? 'bg-gray-900 text-white' : 'text-gray-300' }} ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Clients</a>
              <a href="{{ route('jobs') }}" class="{{ (request()->is('jobs*')) ? 'bg-gray-900 text-white' : 'text-gray-300' }} ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Jobs</a>
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            {{-- <button class="p-1 border-2 border-transparent text-gray-400 rounded-full hover:text-white focus:outline-none focus:text-white focus:bg-gray-700">
              <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
              </svg>
            </button> --}}
            <div @click.away="open = false" class="ml-3 relative" x-data="{ open: false }">
              <div>
                <button @click="open = !open" class="max-w-xs flex items-center text-sm rounded-full text-white focus:outline-none focus:shadow-solid">
                  <img class="h-8 w-8 rounded-full" src="https://res.cloudinary.com/joram/image/upload/w_60,h_60/v1583533718/20180425_133816.jpg" alt="" />
                </button>
              </div>
              <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg">
                <div class="py-1 rounded-md bg-white shadow-xs">
                
                  <a href="#" class="block border-gray-400 border-b px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                      <div class="flex items-center">
                        <img class="w-10 h-10 rounded-full mr-4" src="https://res.cloudinary.com/joram/image/upload/w_60,h_60/v1583533718/20180425_133816.jpg" alt="Admin">
                        <div class="text-sm">
                            <p class="text-gray-900 leading-none">{{ auth()->user()->party->name }}</p>
                            <small class="text-gray-600">View profile</small>
                        </div>
                    </div>
                  </a>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="-mr-2 flex md:hidden">
          <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>
    <div :class="{'block': open, 'hidden': !open}" class="hidden md:hidden">
      <div class="px-2 pt-2 pb-3 sm:px-3">
        <a href="{{ route('dashboard') }}"  class="{{ (request()->is('dashboard*')) ? 'bg-gray-900 text-white' : 'text-gray-300' }} block px-3 py-2 rounded-md text-base font-medium focus:outline-none focus:text-white focus:bg-gray-700">Dashboard</a>
        <a href="{{ route('handymen') }}"  class="{{ (request()->is('handymen*')) ? 'bg-gray-900 text-white' : 'text-gray-300' }} mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Handymen</a>
        <a href="{{ route('clients') }}"  class="{{ (request()->is('clients*')) ? 'bg-gray-900 text-white' : 'text-gray-300' }} mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Clients</a>
        <a href="{{ route('jobs') }}"  class="{{ (request()->is('jobs*')) ? 'bg-gray-900 text-white' : 'text-gray-300' }} mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Jobs</a>
      </div>
      <div class="pt-4 pb-3 border-t border-gray-700">
        <div class="flex items-center px-5">
          <div class="flex-shrink-0">
            <img class="h-10 w-10 rounded-full" src="https://res.cloudinary.com/joram/image/upload/w_60,h_60/v1583533718/20180425_133816.jpg" alt="" />
          </div>
          <div class="ml-3">
            <div class="text-base font-medium leading-none text-white">{{ auth()->user()->party->name }} </div>
            <div class="mt-1 text-sm font-medium leading-none text-gray-400">View profile</div>
          </div>
        </div>
        <div class="mt-3 px-2">
          <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Settings</a>
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Sign out</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
      </div>
    </div>
  </nav>