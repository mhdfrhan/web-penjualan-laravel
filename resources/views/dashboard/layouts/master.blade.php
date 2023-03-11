@include('layouts.head')



@include('dashboard.partials.navbar')

@include('dashboard.partials.sidebar')

<!-- Modal -->
<div id="offline-modal" tabindex="-1" aria-hidden="true"
    class="fixed z-[999] hidden items-center justify-center w-full overflow-x-hidden overflow-y-auto inset-0 h-screen bg-black bg-opacity-60 px-4">
    <div class="relative w-full h-full flex items-center max-w-md animate__animated animate__zoomIn animate__faster">
        <div class="relative bg-white rounded-lg shadow">
            <div class="p-4 sm:p-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div class="mb-5">
                    <h3 class="text-lg mb-1 text-gray-800 font-semibold">Tidak Ada Koneksi Internet!</h3>
                    <p class="text-sm text-gray-400">Silakan cek koneksi internet Anda dan coba lagi nanti.</p>
                </div>
                <button type="button" onclick="location.reload();"
                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-8 py-2.5 mr-2">
                    Reload
                </button>
            </div>
        </div>
    </div>
</div>


@section('offline-modal')
    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
    </svg>
    <div class="mb-5">
        <h3 class="text-lg mb-1 text-gray-800 font-semibold">Tidak Ada Koneksi Internet!</h3>
        <p class="text-sm text-gray-400">Silakan cek koneksi internet Anda dan coba lagi nanti.</p>
    </div>
    <button type="button" onclick="location.reload();"
        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-8 py-2.5 mr-2">
        Reload
    </button>
@endsection

<div class="fixed bottom-[74px] sm:bottom-14 right-4 sm:right-8 lg:right-18 2xl:right-20 cursor-pointer hover:-translate-y-1.5 duration-300 z-[9999] invisible opacity-0"
    id="back2Top">
    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-violet-600 p-1 rounded-full flex justify-center items-center text-white">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 19.5v-15m0 0l-6.75 6.75M12 4.5l6.75 6.75" />
        </svg>
    </div>
</div>


<main class="lg:ml-64 duration-500 relative" id="main-content">

    <div class="px-4 pt-6 w-full">

        <nav class="flex mb-4" aria-label="Breadcrumb">

            <ol class="inline-flex items-center space-x-1 md:space-x-3">

                <li class="inline-flex items-center">

                    <a href="/dashboard"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-violet-600">

                        <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">

                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">

                            </path>

                        </svg>

                        Home

                    </a>

                </li>

                <li>

                    <div class="flex items-center">

                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">

                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>

                        </svg>

                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">{{ $title }}</span>

                    </div>

                </li>

            </ol>

        </nav>

        <div class="mb-4">

            <h3 class="text-gray-800 text-2xl font-semibold">{{ $title }}</h3>

        </div>

        @yield('container')

    </div>

</main>



@include('layouts.footer')
