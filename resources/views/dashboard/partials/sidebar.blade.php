<!-- sidebar -->
<aside id="sidebar" class="fixed top-0 left-0 mt-16 bottom-0 z-20 hidden w-64 flex-shrink-0 flex-col bg-gray-50  duration-500 lg:flex lg:w-64 overflow-hidden">
  <div id="sidebarBackdrop" class="fixed inset-0 bg-gray-800 opacity-50 lg:hidden z-0"></div>
  <div class="relative flex min-h-0 h-full flex-1 flex-col bg-gray-50 pt-0 border-r border-gray-200">
    <div class="flex flex-1 flex-col overflow-y-auto pt-4 lg:pt-8 pb-4">
      <div class="flex-1 bg-gray-50 px-3">
        <div class="mb-8 flex items-center justify-between lg:hidden">
          <a class="flex items-center gap-x-3" href="/">
            <img src="/img/logo.png" alt="GadgetCom Logo" class="w-9">
            <span class="text-xl font-semibold text-gray-700">GadgetCom</span>
          </a>
        </div>
        <ul class="pt-1 pb-2">
          <li class="sideMenu">
            <a href="/dashboard" class="{{ Request::is('dashboard') ? 'active' : '' }}">
              <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0112 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                </svg>
              </div>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="sideMenu pt-2">
            <a href="/dashboard/frontpage" class="{{ Request::is('dashboard/frontpage') ? 'active' : '' }}">
              <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
              </div>
              <span>Halaman Depan</span>
            </a>
          </li>
          <li id="accordion-collapse" data-accordion="collapse">
            <div class="pt-2" id="barang-heading">
              <button type="button" id="barang-button" class="flex w-full items-center rounded-full px-4 py-2.5 transition-all duration-200 hover:bg-gray-200 {{ Request::is('dashboard/dataBarang/*') ? 'active' : '' }}" data-accordion-target="#barang-collapse" aria-expanded="{{ Request::is('dashboard/dataBarang/*') ? 'true' : 'false' }}" aria-controls="barang-collapse">
                <div class="mr-1 grid place-items-center rounded-full bg-white p-2.5 text-center shadow-lg shadow-gray-300 icon">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z" />
                    <path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z" />
                  </svg>
                </div>
                <span class="ml-2 text-sm font-medium text-gray-500">Data Barang</span>
                <svg data-accordion-icon class="ml-auto h-6 w-6 shrink-0 text-navy-700 nav-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
              </button>
              <div id="barang-collapse" class="hidden" aria-labelledby="barang-heading">
                <ul class="pt-3 space-y-2">
                  <li>
                    <a href="/dashboard/dataBarang/kategori" class="block w-full rounded-full py-2.5 px-4 pl-12 text-sm font-medium text-gray-500 {{ Request::is('dashboard/dataBarang/kategori') ? 'collapseActive' : '' }}">Kategori</a>
                  </li>
                  <li>
                    <a href="/dashboard/dataBarang/barang" class="block w-full rounded-full py-2.5 px-4 pl-12 text-sm font-medium text-gray-500 {{ Request::is('dashboard/dataBarang/barang') ? 'collapseActive' : '' }}">Barang / produk</a>
                  </li>
                </ul>
              </div>
            </div>
          </li>
          <li class="pt-2 sideMenu">
            <a href="/dashboard/dataPenjualan" class="{{ Request::is('dashboard/dataPenjualan') ? 'active' : '' }}">
              <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                </svg>
              </div>
              <span>Data Penjualan</span>
            </a>
          </li>
          <li id="accordion-collapse" data-accordion="collapse">
            <div class="pt-2" id="users-heading">
              <button type="button" id="users-button" class="flex w-full items-center rounded-full px-4 py-2.5 transition-all duration-200 hover:bg-gray-200 {{ Request::is('dashboard/users/*') ? 'active' : '' }}" data-accordion-target="#users-collapse" aria-expanded="{{ Request::is('dashboard/users/*') ? 'true' : 'false' }}" aria-controls="users-collapse">
                <div class="mr-1 grid place-items-center rounded-full bg-white p-2.5 text-center shadow-lg shadow-gray-300 icon">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                  </svg>
                </div>
                <span class="ml-2 text-sm font-medium text-gray-500">Data users</span>
                <svg data-accordion-icon class="ml-auto h-6 w-6 shrink-0 text-navy-700 nav-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
              </button>
              <div id="users-collapse" class="hidden" aria-labelledby="users-heading">
                <ul class="pt-3 space-y-2">
                  <li>
                    <a href="/dashboard/users/admin" class="block w-full rounded-full py-2.5 px-4 pl-12 text-sm font-medium text-gray-500 {{ Request::is('dashboard/users/admin') ? 'collapseActive' : '' }}">Admin</a>
                  </li>
                  <li>
                    <a href="/dashboard/users/pembeli" class="block w-full rounded-full py-2.5 px-4 pl-12 text-sm font-medium text-gray-500 {{ Request::is('dashboard/users/pembeli') ? 'collapseActive' : '' }}">Pembeli</a>
                  </li>
                </ul>
              </div>
            </div>
          </li>
          <li class="pt-2 sideMenu">
            <a href="{{ route('dashboard.transaksi') }}" class="{{ Request::is('dashboard/transaksi') ? 'active' : '' }}">
              <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
              </div>
              <span>Data Transaksi</span>
            </a>
          </li>
          <li class="pt-2 sideMenu">
            <a href="{{ route('dashboard.feedback') }}" class="{{ Request::is('dashboard/feedback') ? 'active' : '' }}">
              <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                  <path d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
                </svg>
              </div>
              <span>Feedback</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</aside>
<!-- end sidebar -->