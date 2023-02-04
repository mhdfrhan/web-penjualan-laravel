<!-- sidebar -->

<aside id="sidebar"
    class="fixed top-0 left-0 mt-16 bottom-0 z-20 hidden w-64 flex-shrink-0 flex-col bg-gray-50  duration-500 lg:flex lg:w-64 overflow-hidden">
    <div id="sidebarBackdrop" class="fixed inset-0 bg-gray-800 opacity-50 lg:hidden z-0"></div>
    <div class="relative flex min-h-0 h-full flex-1 flex-col bg-gray-50 pt-0 border-r border-gray-200">
        <div class="flex flex-1 flex-col overflow-y-auto pt-4 lg:pt-8 pb-4">
            <div class="flex-1 bg-gray-50 px-3">
                <div class="mb-8 flex items-center justify-between lg:hidden">
                    <a class="flex items-center gap-x-3" href="/">
                        <img src="/img/logo-2.png" alt="GadgetCom Logo" class="w-9">
                        <span class="text-xl font-semibold text-gray-700">GadgetCom</span>
                    </a>
                </div>
                <ul class="pt-1 pb-2">
                    <li class="mb-4 lg:hidden">
                        <div class="relative block w-full">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input id="searchInputMobile" type="text"
                                class="block w-full rounded-full border border-gray-300 bg-transparent p-2.5 pl-10 text-sm text-gray-900 focus:border-pink-500 focus:ring-2 focus:ring-violet-200 "
                                placeholder="Search" />
                        </div>
                    </li>
                    <li class="sideMenu">
                        <a href="/dashboard" class="{{ Request::is('dashboard') ? 'active' : '' }}">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                </svg>
                            </div>
                            <span>Dashboard</span>
                        </a>
                    </li>
										<li id="accordion-collapse" data-accordion="collapse">
											<div class="pt-2" id="barang-heading">
												<button type="button" id="barang-button"
													class="flex w-full items-center rounded-full px-4 py-2.5 transition-all duration-200 hover:bg-gray-200 {{ Request::is('dashboard/*') ? 'active' : '' }}"
													data-accordion-target="#barang-collapse" aria-expanded="{{ Request::is('dashboard/*') ? 'true' : 'false' }}"
													aria-controls="barang-collapse">
													<div
														class="mr-1 grid place-items-center rounded-full bg-white p-2.5 text-center shadow-lg shadow-gray-300 icon">
														<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z" />
                                    <path
                                        d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z" />
                                </svg>
													</div>
													<span class="ml-2 text-sm font-medium text-gray-500">Data Barang</span>
													<svg data-accordion-icon class="ml-auto h-6 w-6 shrink-0 text-navy-700 nav-icon"
														fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd"
															d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
															clip-rule="evenodd"></path>
													</svg>
												</button>
												<div id="barang-collapse" class="hidden" aria-labelledby="barang-heading">
													<ul class="pt-3 space-y-2">
														<li>
															<a href="/dashboard/kategori"
																class="block w-full rounded-full py-2.5 px-4 pl-12 text-sm font-medium text-gray-500 {{ Request::is('dashboard/kategori') ? 'collapseActive' : '' }}">Kategori</a>
														</li>
														<li>
															<a href="/dashboard/dataBarang"
																class="block w-full rounded-full py-2.5 px-4 pl-12 text-sm font-medium text-gray-500 {{ Request::is('dashboard/dataBarang') ? 'collapseActive' : '' }}">Barang / produk</a>
														</li>
													</ul>
												</div>
											</div>
										</li>
                    <li class="pt-2 sideMenu">
                        <a href="#" class="{{ Request::is('dataPenjualan') ? 'active' : '' }}">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                </svg>
                            </div>
                            <span>Data
                                Penjualan</span>
                        </a>
                    </li>
                    <li class="pt-2 sideMenu">
                        <a href="#" class="{{ Request::is('users') ? 'active' : '' }}">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                                </svg>
                            </div>
                            <span>Users</span>
                        </a>
                    </li>
                    <li class="pt-2 sideMenu">
                        <a href="#" class="{{ Request::is('transaksi') ? 'active' : '' }}">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                </svg>
                            </div>
                            <span>Data
                                Transaksi</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</aside>

<!-- end sidebar -->
