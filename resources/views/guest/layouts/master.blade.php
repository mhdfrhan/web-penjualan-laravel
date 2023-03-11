@include('layouts.head')



@include('guest.partials.navbar')

<!-- Modal -->
<div id="offline-modal"
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



<div class="fixed bottom-[74px] sm:bottom-14 right-4 sm:right-8 lg:right-18 2xl:right-20 cursor-pointer hover:-translate-y-1.5 duration-300 z-[9999] invisible opacity-0"
    id="back2Top">
    <div class="w-12 sm:w-14 h-12 sm:h-14 bg-violet-600 p-1 rounded-full flex justify-center items-center text-white">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 19.5v-15m0 0l-6.75 6.75M12 4.5l6.75 6.75" />
        </svg>
    </div>
</div>

<main class="min-h-screen pb-16">



    @yield('container')



</main>



@include('guest.partials.footer')



@include('layouts.footer')
