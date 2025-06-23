@foreach (['success', 'warning', 'error'] as $flash)
    @if ($msg = Session::get($flash))
        <div id="flash_msg"
            class="{{ $flash == 'success' ? 'bg-green-200' : ($flash == 'error' ? 'bg-red-300' : 'bg-orange-300') }} flex items-center justify-between px-5 py-2">
            <h1>{{ $msg }}</h1>
            <button id="flash_close">X</button>
        </div>
    @endif
@endforeach
