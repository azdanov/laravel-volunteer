@if (session('status'))
    <div
        class="flex items-center justify-center bg-blue-lighter text-grey-darkest text-sm font-bold px-4 py-2"
        role="alert">
        <p>{{ session('status') }}</p>
        @include('partials.flash.close')
    </div>
@endif

@if (session('success'))
    <div
        class="flex items-center justify-center bg-green-lighter text-grey-darkest text-sm font-bold px-4 py-2"
        role="alert">
        <p>{{ session('success') }}</p>
        @include('partials.flash.close')
    </div>
@endif

@if (session('error'))
    <div
        class="flex items-center justify-center bg-red-lighter text-grey-darkest text-sm font-bold px-4 py-2"
        role="alert">
        <p>{{ session('error') }}</p>
        @include('partials.flash.close')
    </div>
@endif
