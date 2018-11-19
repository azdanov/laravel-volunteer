<!DOCTYPE html>
<html lang="en" class="bg-grey-lightest subpixel-antialiased">
<head>
    @include('partials.head')
</head>
<body class="font-sans font-normal leading-normal flex flex-col min-h-screen">

@include('partials.navigation')
@include('partials.flash.index')

<main class="container mx-auto flex-grow my-6">
    @yield('content')
</main>

@include('partials.footer')
</body>
</html>
