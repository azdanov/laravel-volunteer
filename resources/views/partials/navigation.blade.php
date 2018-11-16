<div class="bg-green shadow">
    <nav
        class="flex items-center justify-between flex-wrap container mx-auto py-3 lg:py-2 px-2 lg:px-0">
        <div
            class="flex items-center flex-no-shrink text-white -mt-1 ml-2 lg:ml-4 mr-6 mb-2 md:mb-0">
            @include('partials.logo')
            <div class="ml-1 w-24 flex flex-wrap">
                <a href="{{ route('home') }}"
                   class="font-semibold text-2xl tracking-tight text-white no-underline">
                    Volunteer
                </a>
                @if ($region)
                    <a class="-mt-2 select-none ml-1 text-sm no-underline text-white hover:underline"
                       href="{{ route('region_category.show', [$region]) }}">{{ $region->name }}</a>
                @endif
            </div>
        </div>

        <label
            class="block sm:hidden flex items-center px-3 py-2 border rounded cursor-pointer text-green-lighter border-green-lighter hover:text-white hover:border-white"
            type="button" for="menu-toggle">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg"><title>Toggle Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </label>
        <input type="checkbox" id="menu-toggle" class="hidden">

        <form class="mx-auto shadow rounded" id="search">
            @csrf
            <div class="flex items-center">
                <input
                    class="appearance-none min-w-0 w-100 bg-green-lightest text-grey-darkest px-2 py-1 leading-tight focus:outline-none rounded-l"
                    type="text" placeholder="Find Volunteer Positions.."
                    style="min-width:0; width:100%"
                    aria-label="Find Volunteer Positions">
                <button
                    class="bg-green-light hover:bg-green-dark text-lg text-white px-2 py-1 rounded-r"
                    type="submit">
                    Search
                </button>
            </div>
        </form>

        <div class="w-full lg:w-auto sm:block" id="menu">
            <div
                class="text-md sm:mt-2 lg:mt-0 flex flex-wrap items-center justify-between md:justify-center lg:justify-end">
                @guest
                    <a class="block mt-4 sm:mt-0 text-white no-underline hover:underline mr-4"
                       href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a class="block mt-4 sm:mt-0 text-white no-underline hover:underline mr-4"
                           href="{{ route('register') }}">Register</a>
                    @endif
                @else
                    <a class="inline-block mt-4 sm:mt-0 text-white no-underline hover:underline mr-4"
                       href="{{ route('listing.index') }}">
                        Favorite
                    </a>

                    <a class="inline-block mt-4 sm:mt-0 text-white no-underline hover:underline mr-4"
                       href="{{ route('viewed_listing.index') }}">
                        Viewed
                    </a>

                    <a class="inline-block mt-4 sm:mt-0 text-white no-underline hover:underline mr-4"
                       href="/cabinet">
                        {{ auth()->user()->name }}
                    </a>

                    <form action="{{ route('logout') }}" method="POST"
                          class="inline-flex items-center">
                        @csrf
                        <button
                            type="submit"
                            class="mt-4 sm:mt-0 text-white no-underline hover:underline mr-4">
                            Logout
                        </button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>
</div>
