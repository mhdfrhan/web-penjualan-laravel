@if (session()->has('success'))
    <div class="alert flex p-4 mb-4 text-green-800 rounded-lg bg-green-50"role="alert"><span
            class="sr-only">Info</span>
        <div class="text-sm font-medium">{{ session('success') }}</div><button
            type="button"class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8"data-dismiss-target="#alert"
            aria-label="Close"><span class="sr-only">Close</span><svg aria-hidden="true" class="w-5 h-5"
                fill="currentColor" viewBox="0 0 20 20"xmlns="http://www.w3.org/2000/svg">
                <path
                    fill-rule="evenodd"d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"clip-rule="evenodd">
                </path>
            </svg></button>
    </div>
@endif
@if (session()->has('error'))
    <div class="alert flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50"role="alert"><span
            class="sr-only">Info</span>
        <div class="text-sm font-medium">{{ session('error') }}</div><button
            type="button"class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-2	00 inline-flex h-8 w-8"data-dismiss-target="#alert"
            aria-label="Close"><span class="sr-only">Close</span><svg aria-hidden="true" class="w-5 h-5"
                fill="currentColor" viewBox="0 0 20 20"xmlns="http://www.w3.org/2000/svg">
                <path
                    fill-rule="evenodd"d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"clip-rule="evenodd">
                </path>
            </svg></button>
    </div>
@endif