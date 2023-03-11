@include('layouts.head')



@include('guest.partials.navbar')

<div class="fixed bottom-[74px] sm:bottom-14 right-4 sm:right-8 lg:right-18 2xl:right-20 cursor-pointer hover:-translate-y-1.5 duration-300 z-[9999] invisible opacity-0" id="back2Top">
	<div class="w-12 sm:w-14 h-12 sm:h-14 bg-violet-600 p-1 rounded-full flex justify-center items-center text-white">
		<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
			<path stroke-linecap="round" stroke-linejoin="round" d="M12 19.5v-15m0 0l-6.75 6.75M12 4.5l6.75 6.75" />
		</svg>		
	</div>
</div>

<main class="min-h-screen pb-16">



    @yield('container')



</main>



@include('guest.partials.footer')



@include('layouts.footer')

