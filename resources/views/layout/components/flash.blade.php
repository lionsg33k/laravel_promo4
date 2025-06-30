@foreach (['success', 'warning', 'error'] as $flash)
    @if ($msg = Session::get($flash))
        <div id="flash_msg"
            class="bg-white border-l-4 {{ $flash == 'success' ? 'border-green-500' : 
                    ($flash == 'error' ? 'border-red-500' : 'border-yellow-500') }}
            rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 
            fixed top-6 right-6 w-80 z-50 border border-gray-200
            animate-slide-in"
            role="alert">
            
            <div class="p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center
                            {{ $flash == 'success' ? 'bg-green-100' : 
                                ($flash == 'error' ? 'bg-red-100' : 'bg-yellow-100') }}">
                            @if ($flash == 'success')
                                <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            @elseif ($flash == 'error')
                                <svg class="w-5 h-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                            @elseif ($flash == 'warning')
                                <svg class="w-5 h-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            @endif
                        </div>
                    </div>
                    
                    <div class="ml-3 flex-1">
                        <h3 class="text-sm font-medium text-gray-900">
                            {{ ucfirst($flash) }}
                        </h3>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $msg }}
                        </p>
                    </div>
                    
                    <div class="ml-4">
                        <button id="flash_close" 
                            class="text-gray-400 hover:text-gray-600 hover:bg-gray-100 
                            rounded p-1 transition-colors duration-200"
                            aria-label="Close">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach



@if ($errors->any())
    
   <div id="flash_msg"
        class="bg-white border-l-4 border-red-500
        rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 
        fixed top-6 right-6 w-80 z-50 border border-gray-200
        animate-slide-in"
        role="alert">

        <div class="p-4">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center bg-red-100">
                        <svg class="w-5 h-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                </div>

                <div class="ml-3 flex-1">
                    <h3 class="text-sm font-medium text-gray-900">
                        Validation Error{{ $errors->count() > 1 ? 's' : '' }}
                    </h3>
                    <ul class="mt-1 text-sm text-gray-600 list-disc list-inside space-y-1">
                            <li>{{ $errors->first() }}</li>
                    </ul>
                </div>

                <div class="ml-4">
                    <button id="flash_close" 
                        class="text-gray-400 hover:text-gray-600 hover:bg-gray-100 
                        rounded p-1 transition-colors duration-200"
                        aria-label="Close">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

@endif