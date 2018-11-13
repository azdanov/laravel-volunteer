<div class="bg-green shadow mb-4">
    <nav class="flex items-center justify-between flex-wrap container mx-auto py-2 px-2 sm:px-0">
        <div class="flex items-center flex-no-shrink text-white ml-4 mr-6 mb-2 md:mb-0">
            @include('layouts.partials.logo')
            <a href="{{ url('/') }}"
               class="font-semibold text-2xl tracking-tight text-white no-underline ml-1">
                Volunteer
            </a>
        </div>

        <div class="block sm:hidden">
            <button
                class="flex items-center px-3 py-2 border rounded text-green-lighter border-green-light hover:text-white hover:border-white">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg"><title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </button>
        </div>

        <form class="w-full max-w-xs lg:ml-10 shadow rounded">
            @csrf
            <div class="flex items-center">
                <input
                    class="appearance-none bg-green-lightest w-full text-grey-darkest px-2 py-1 leading-tight focus:outline-none rounded-l"
                    type="text" placeholder="Find Volunteer Positions.." aria-label="Find Volunteer Positions">
                <button
                    class="flex-no-shrink bg-green-light hover:bg-green-dark text-lg text-white px-2 py-1 rounded-r"
                    type="submit">
                    Search
                </button>
            </div>
        </form>

        <div class="w-full flex-grow flex sm:items-center sm:w-auto">
            <div class="text-md sm:flex-grow sm:flex sm:justify-end">
                @guest
                    <a class="block mt-4 sm:inline-block sm:mt-0 text-white no-underline hover:underline mr-4"
                       href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a class="block mt-4 sm:inline-block sm:mt-0 text-white no-underline hover:underline mr-4"
                           href="{{ route('register') }}">Register</a>
                    @endif
                @else
                    <a class="block mt-4 sm:inline-block sm:mt-0 text-white no-underline hover:underline mr-4"
                       href="/cabinet">
                        {{ Auth::user()->name }}
                    </a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button
                            type="submit"
                            class="block mt-4 sm:inline-block sm:mt-0 text-white no-underline hover:underline mr-4">
                            Logout
                        </button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>
</div>
