<!DOCTYPE html>
<html lang="en" class="bg-grey-lightest subpixel-antialiased">
<head>
    @include('layouts.partials.head')
</head>
<body class="font-sans font-normal text-green-darker leading-normal flex flex-col min-h-screen">

@include('layouts.partials.navigation')
@include('layouts.partials.flash')

<div class="container mx-auto flex-grow">
    <main>
        @yield('content')
    </main>
</div>

@include('layouts.partials.footer')
</body>
</html>
