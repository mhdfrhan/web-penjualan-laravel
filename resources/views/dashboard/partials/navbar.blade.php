<nav class="sticky top-0 left-0 z-40 w-full border-gray-200 bg-gray-50 py-4" id="navbar">
    <div class="flex items-center justify-between px-4">
        <div class="flex items-center gap-x-3 sm:gap-x-4"> <button id="toggleSidebar" type="button"
                class="hidden lg:block"> <svg id="toggleSidebarHamburger" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h8m-8 6h16" />
                </svg> <svg id="toggleSidebarClose" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg> </button> <button id="toggleSidebarMobile" type="button" class="lg:hidden"> <svg
                    id="toggleSidebarMobileHamburger" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h8m-8 6h16" />
                </svg> <svg id="toggleSidebarMobileClose" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg> </button> <a href="/" class="flex items-center gap-x-2"><img src="/img/logo.png"
                    class="w-7" alt="{{ config('app.name', 'Laravel') }}Logo" /><span
                    class="self-center text-xl font-semibold whitespace-nowrap hidden md:block">Gadget<span class="text-violet-600">Com</span></span></a> </div>
        <div class="flex items-center gap-x-6"> <button type="button"
                class="mr-3 flex rounded-fulltext-sm focus:ring-4 focus:ring-gray-300 md:mr-0 items-center rounded-lg"
                id="user-menu-button" aria-expanded="false" type="button" data-dropdown-toggle="user-dropdown"> <span
                    class="sr-only">Open user menu</span><span
                    class="text-sm mr-2 font-medium text-gray-500">{{ Auth::user()->name }}</span>
                @if (Auth::user()->image)
                    <img src="{{ asset('img/user/' . Auth::user()->image) }}"
                        class="h-8 w-8 rounded-full object-cover object-top" alt="gambar{{ Auth::user()->name }}">
                @else
                    <img src="/img/no-photo.png" class="h-8 w-8 rounded-full object-cover object-top"
                        alt="gambar{{ Auth::user()->name }}">
                @endif
            </button>
            <div class="z-50 my-4 hidden list-none divide-y divide-gray-100 rounded bg-gray-50 text-base shadow"
                id="user-dropdown">
                <div class="py-3 px-4"> <span class="block text-sm text-gray-900">{{ auth()->user()->name }}</span>
                    <span class="block truncate text-sm font-medium text-gray-500">{{ auth()->user()->email }}</span>
                </div>
                <ul class="py-1" aria-labelledby="dropdown">
                    <li> <a href="/dashboard"
                            class="block py-2 px-4 text-sm text-gray-800 {{ Request::is('dashboard') ? 'bg-violet-600 text-white' : 'hover:bg-gray-200' }}">Dashboard</a>
                    </li>
                    <li> <a href="/dashboard/profile"
                            class="block py-2 px-4 text-sm text-gray-800 {{ Request::is('dashboard/profile') ? 'bg-violet-600 text-white' : 'hover:bg-gray-200' }}">Settings</a>
                    </li>
                    <li>
                        <form action="/logout" method="POST"> @csrf <button type="submit"
                                class="block w-full py-2 px-4 text-sm text-gray-800 text-left">Logout</button> </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
