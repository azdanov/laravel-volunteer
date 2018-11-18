<div class="border-b-4 border-green shadow">
    <nav
        class="flex items-center justify-center md:justify-end lg:justify-between flex-wrap container mx-auto py-3 lg:py-2 px-2 lg:px-0">
        <div
            class="flex items-center flex-no-shrink text-green-dark -mt-1 ml-2 lg:ml-4 mb-2 md:mb-0">
            @include('partials.logo')
            <div class="ml-1 w-32 flex flex-wrap">
                <a href="{{ route('home') }}"
                   class="font-semibold text-2xl tracking-tight text-green-dark no-underline">
                    Volunteer
                </a>
                @if ($global_region)
                    <a class="-mt-2 select-none ml-1 text-sm no-underline text-green-dark hover:underline"
                       href="{{ route('region_category.show', [$global_region]) }}">{{ $global_region->name }}</a>
                @endif
            </div>
        </div>

        {{--Burger Menu--}}
        {{--<label--}}
            {{--class="block sm:hidden flex items-center px-3 py-2 border rounded cursor-pointer text-green border-green hover:text-green-light hover:border-green-light"--}}
            {{--for="menu-toggle">--}}
            {{--<svg class="fill-current h-3 w-3" viewBox="0 0 20 20"--}}
                 {{--xmlns="http://www.w3.org/2000/svg"><title>Toggle Menu</title>--}}
                {{--<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>--}}
            {{--</svg>--}}
        {{--</label>--}}
        {{--<input type="checkbox" id="menu-toggle" class="hidden">--}}

        @include('partials.search')

        <div class="w-full md:w-auto sm:block mr-0 md:mr-16 lg:mr-0" id="menu">
            <div
                class="text-md sm:mt-2 lg:mt-0 flex flex-wrap items-center justify-center lg:justify-end">
                @guest
                    <a class="block mt-4 sm:mt-0 text-green-dark no-underline hover:underline mr-4"
                       href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a class="block mt-4 sm:mt-0 text-green-dark no-underline hover:underline mr-4"
                           href="{{ route('register') }}">Register</a>
                    @endif
                @else
                    <div class="relative px-4 mt-2 md:mt-0">
                        <label
                            class="bg-transparent flex items-center rounded text-green-dark cursor-pointer select-none"
                            for="user-toggle">
                            {{ auth()->user()->name }}
                            <svg class="h-4 fill-current ml-2" version="1.1"
                                 xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 129 129">
                                <path
                                    d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"></path>
                            </svg>
                        </label>
                        <input type="checkbox" id="user-toggle" checked class="hidden">
                        <div id="user-menu"
                             class="rounded border border-grey-light bg-white px-3 pb-3 whitespace-no-wrap shadow-md absolute mt-8 pin-t pin-l min-w-full">
                            <ul class="list-reset">
                                <li class="border-b">
                                    <h3 class="mt-1">Listings</h3>
                                </li>
                                <li>
                                    <a class="inline-block mt-1 text-green-darker no-underline hover:underline"
                                       href="{{ route('listing.create') }}">
                                        Create
                                    </a>
                                </li>
                                <li>
                                    <a class="inline-block mt-1 text-green-darker no-underline hover:underline"
                                       href="{{ route('unpublished_listing.index') }}">
                                        Unpublished ({{ $unpublishedListingCount ?? 0 }})
                                    </a>
                                </li>
                                <li>
                                    <a class="inline-block mt-1 text-green-darker no-underline hover:underline"
                                       href="{{ route('published_listing.index') }}">
                                        Published ({{ $publishedListingCount ?? 0 }})
                                    </a>
                                </li>
                                <li>
                                    <a class="inline-block mt-1 text-green-darker no-underline hover:underline"
                                       href="{{ route('viewed_listing.index') }}">
                                        Viewed
                                    </a>
                                </li>
                                <li>
                                    <a class="inline-block mt-1 text-green-darker no-underline hover:underline"
                                       href="{{ route('listing.index') }}">
                                        Favorited
                                    </a>
                                </li>
                                <li>
                                    <hr class="border-t border-grey-light">
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST"
                                          class="inline-flex items-center">
                                        @csrf
                                        <button
                                            type="submit"
                                            class="text-green-darker no-underline hover:underline">
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </nav>
</div>
