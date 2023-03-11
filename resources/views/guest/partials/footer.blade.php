<footer class="bg-gray-200 py-5 hidden sm:block">
    <div class="container mx-auto px-5 lg:px-20 border-b pb-6 mb-6 border-gray-300">
        <div class="sm:flex flex-wrap justify-between items-center">
            <div class="flex items-center justify-center sm:justify-start">
                <img src="{{ asset('img/logo.png') }}" class="w-10" alt="{{ config('app.name', 'Laravel') }}">
                <h2 class="ml-2 text-xl font-semibold">Gadget<span class="text-violet-600">Com</span></h2>
            </div>
            <div class="text-center mt-4 sm:text-left sm:mt-0">
							<p class="font-medium text-gray-500 text-sm">Build by <a href="https://inifarhan.my.id" class="text-violet-600">Muhammad Farhan</a></p>
						</div>
        </div>
    </div>
		<div class="text-center">
			<p class="text-gray-500 text-sm">© {{ date('Y') }} <a href="{{ env('APP_URL') }}" class="text-violet-600 font-medium">GadgetCom</a>, All Rights Reserved</p>
		</div>
</footer>
