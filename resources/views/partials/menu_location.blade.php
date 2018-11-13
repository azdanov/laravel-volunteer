<?php

declare(strict_types=1);

use App\Region;

/** @var Region[] $regions */
?>

<div class="bg-transparent text-left sm:mb-1 sm:pt-2 lg:px-5">
    <div class="bg-grey-lighter shadow border border-t-0 text-white leading-none sm:rounded">
        <div class="bg-grey-light border border-r-0 border-l-0 px-4 py-2 sm:rounded-t">
            <a class="font-bold mr-6 text-green-darker no-underline"
               href="#">By Location</a>
        </div>
        <div class="flex px-4 py-4">
            <div class="w-3/4">
                @foreach($regions as $country)
                    <a class="block font-semibold text-left text-green-darker no-underline"
                       href="{{ route('user.region.store', $country) }}">{{ $country->name }}</a>
                    <hr class="border-b mr-12">
                    @foreach($country->children as $stateIndex => $state)
                        @if ($stateIndex === 4)
                            @break
                        @endif

                        <div class="inline-flex mr-6">
                            <div>
                                <a class="font-semibold text-left text-green-darker no-underline"
                                   href="{{ route('user.region.store', $state) }}">
                                    {{ $state->name }}
                                </a>

                                @foreach ($state->children as $cityIndex => $city)
                                    @if ($cityIndex === 3)
                                        @break
                                    @endif
                                    <p class="flex items-center mt-2">
                                        <span class="mr-2 text-green-darker select-none">&middot;</span>
                                        <a class="font-semibold text-left text-green-darker no-underline"
                                           href="{{ route('user.region.store', $city) }}">
                                            {{ $city->name }}
                                        </a>
                                    </p>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @endforeach;
            </div>
            <div class="w-1/4 mt-2 lg:mt-0 flex items-center border-l pl-5">
                <svg class="opacity-75 h-4 w-4 mr-1"
                     xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 24 24">
                    <path
                        d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                </svg>
                <a class="font-semibold text-left text-green-darker no-underline"
                   href="{{ route('regions') }}">
                    More Regions
                </a>
            </div>
        </div>
    </div>
</div>
