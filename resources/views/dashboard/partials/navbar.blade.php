<!-- navbar -->

<nav class="sticky top-0 left-0 z-40 w-full border-gray-200 bg-gray-50 py-4" id="navbar">
    <div class="flex items-center justify-between px-4">
        <div class="flex items-center gap-x-3 sm:gap-x-4">
            <button id="toggleSidebar" type="button" class="hidden lg:block">
                <svg id="toggleSidebarHamburger" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
                <svg id="toggleSidebarClose" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <button id="toggleSidebarMobile" type="button" class="lg:hidden">
                <svg id="toggleSidebarMobileHamburger" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
                <svg id="toggleSidebarMobileClose" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <a href="#" class="flex items-center gap-x-3">
                <img src="/img/logo-2.png" class="w-7" alt="">
                <span class="self-center whitespace-nowrap text-xl font-bold text-gray-800">GadgetCom</span>
            </a>
        </div>

        <div class="flex items-center gap-x-6">
            <button class="lg:hidden" type="button" id="searchNavBtnMobile">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>

            <button type="button"
                class="mr-3 flex rounded-full bg-gray-900 text-sm focus:ring-4 focus:ring-gray-300 md:mr-0"
                id="user-menu-button" aria-expanded="false" type="button" data-dropdown-toggle="user-dropdown">
                <span class="sr-only">Open user menu</span>
                <img class="h-8 w-8 rounded-full object-cover object-top" src="/img/farhan.png" alt="user photo" />
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 my-4 hidden list-none divide-y divide-gray-100 rounded bg-gray-50 text-base shadow"
                id="user-dropdown">
                <div class="py-3 px-4">
                    <span class="block text-sm text-gray-900">{{ auth()->user()->name }}</span>
                    <span class="block truncate text-sm font-medium text-gray-500">{{ auth()->user()->email }}</span>
                </div>
                <ul class="py-1" aria-labelledby="dropdown">
                    <li>
                        <a href="/" class="block py-2 px-4 text-sm text-gray-800 hover:bg-gray-100 ">Dashboard</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-4 text-sm text-gray-800 hover:bg-gray-100 ">Settings</a>
                    </li>
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit"
                                class="block w-full py-2 px-4 text-sm text-gray-800 hover:bg-gray-100 text-left">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>

        </div>


    </div>
</nav>

<!-- end navbar -->
