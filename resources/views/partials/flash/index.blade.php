@if (session('status'))
    <div
        class="flash flash--status"
        role="alert">
        <p>{{ session('status') }}</p>
        @include('partials.flash.close')
    </div>
@endif

@if (session('success'))
    <div
        class="flash flash--success"
        role="alert">
        <p>{{ session('success') }}</p>
        @include('partials.flash.close')
    </div>
@endif

@if (session('error'))
    <div
        class="flash flash--error"
        role="alert">
        <p>{{ session('error') }}</p>
        @include('partials.flash.close')
    </div>
@endif
