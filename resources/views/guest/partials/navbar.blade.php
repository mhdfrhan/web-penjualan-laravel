<nav class="bg-white border-gray-200 px-4 lg:px-20 py-2.5 sticky top-0 left-0 ring-0 border-b z-[999]">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a href="/" class="flex items-center">
            <img src="/img/logo-2.png" class="mr-3 w-9 md:w-8" alt="{{ config('app.name', 'Laravel') }} Logo" />
            <span class="self-center text-xl font-semibold whitespace-nowrap hidden md:block">Gadget<span
                    class="text-violet-600">Com</span></span>
        </a>

        <div class="flex lg:order-2">
            <div class="flex flex-wrap items-center gap-x-3.5">
							<button class="icon searchIcon">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
										stroke="currentColor" class="w-6 h-6 duration-500">
										<path stroke-linecap="round" stroke-linejoin="round"
												d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
								</svg>
						</button>

						{{-- search --}}

						<div class="fixed inset-0 bg-black bg-opacity-80 flex flex-wrap items-center px-4 lg:px-20 invisible opacity-0"
								id="searchForm">
								<div class="absolute top-10 right-0 px-4 lg:px-20 cursor-pointer closeForm">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
												stroke="currentColor" class="w-10 h-10 text-white">
												<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
										</svg>
								</div>
								<form class="w-full" action="/products" method="GET">
										<div class="relative">
												<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
														<svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
																fill="none" stroke="currentColor" viewBox="0 0 24 24"
																xmlns="http://www.w3.org/2000/svg">
																<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
																		d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
														</svg>
												</div>
												<input type="search" id="search" name="search"
														class="block w-full p-5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-violet-500 focus:border-violet-500"
														placeholder="Search..." autocomplete="off" value="{{ request('search') }}">
												<button type="submit"
														class="text-white absolute right-2.5 bottom-2.5 bg-violet-700 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-4 py-3">Search</button>
										</div>
								</form>
						</div>

						{{-- end search --}}
                <a href="/cart" class="relative icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 duration-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                    <span class="badge"> {{ session()->get('cart') ? session()->get('cart') : '0' }}</span>
                </a>
                <a href="/favorit" class="relative icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>
                    <span class="badge"> {{ session()->get('favorit') ? session()->get('favorit') : '0' }}</span>
                </a>
                <button class="icon" id="akunDropdownButton" data-dropdown-toggle="akunDropdown">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 duration-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="akunDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="akunDropdownButton">
                        @if (auth()->check())
                            <li>
                                <span
                                    class="block truncate text-sm text-gray-800 px-4 pt-2">{{ Auth::user()->name }}</span>
                            </li>
                            <li><span
                                    class="block truncate text-[13px] text-gray-400 px-4 pb-2">{{ Auth::user()->email }}</span>
                            </li>
                            <li>
                                <a href="/profile"
                                    class="flex items-center px-4 py-2 {{ request()->is('profile') ? 'bg-violet-600 text-white' : 'bg-white hover:bg-gray-100' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Profile</a>
                            </li>
                            <li>
                                <a href="/pesanan"
                                    class="flex items-center px-4 py-2 {{ request()->is('pesanan') ? 'bg-violet-600 text-white' : 'bg-white hover:bg-gray-100' }}"><svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                    </svg>

                                    Pesanan Anda</a>
                            </li>
                        @endif
                        @if (auth()->guest())
                            <li>
                                <a href="/login" class="flex items-center px-4 py-2 hover:bg-gray-100"><svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                                    </svg>
                                    Login</a>
                            </li>
                            <li>
                                <a href="/register" class="flex items-center px-4 py-2 hover:bg-gray-100"><svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Register</a>
                            </li>
                        @elseif(auth()->user()->role === 'admin')
                            <li>
                                <a href="/dashboard"
                                    class="flex items-center px-4 py-2 {{ request()->is('dashboard') ? 'bg-violet-600 text-white' : 'bg-white hover:bg-gray-100' }}"><svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0112 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                                    </svg>

                                    Dashboard</a>
                            </li>
                            <li>
                                <form action="{{ route('page.logout') }}" method="POST">
                                    @csrf
                                    <div>
                                        <button
                                            class="flex items-center w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"><svg
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                            </svg>
                                            Logout</button>
                                    </div>
                                </form>
                            </li>
                        @else
                            <form action="{{ route('page.logout') }}" method="POST">
                                @csrf
                                <div class="py-2">
                                    <button
                                        class="flex items-center w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                        </svg>
                                        Logout</button>
                                </div>
                            </form>
                        @endif
                    </ul>
                </div>

            </div>

            <button data-collapse-toggle="navbar-cta" type="button"
                class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-cta" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="navbar-cta">
            <ul
                class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 lg:flex-row lg:space-x-8 lg:mt-0 lg:text-sm lg:font-medium lg:border-0 lg:bg-white">
                <li>
                    <a href="/" class="navbarLink {{ request()->is('/') ? 'active' : '' }}"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="/products"
                        class="navbarLink {{ request()->is('products') ? 'active' : '' }}">Products</a>
                </li>
                <li>
                    <a href="{{ route('feedback') }}" class="navbarLink {{ request()->is('feedback') ? 'active' : '' }}">Feedback</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
