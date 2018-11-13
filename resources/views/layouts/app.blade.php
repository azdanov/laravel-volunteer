<!DOCTYPE html>
<html lang="en" class="bg-grey-lightest subpixel-antialiased">
<head>
    @include('partials.head')
</head>
<body class="font-sans font-normal text-green-darker leading-normal flex flex-col min-h-screen">

@include('partials.navigation')
@include('partials.flash')

<div class="container mx-auto flex-grow">
    <main>
        @yield('content')
    </main>
</div>

@include('partials.footer')
</body>
</html>
