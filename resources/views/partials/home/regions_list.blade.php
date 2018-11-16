<?php

declare(strict_types=1);

use App\Models\Region;

/** @var Region[] $regions */
?>

<div class="bg-transparent text-left my-3 lg:px-5">
    <div class="bg-grey-lighter shadow border border-t-0 text-white text-center md:text-left leading-none sm:rounded">
        <div class="bg-grey-light border border-r-0 border-l-0 px-4 py-2 sm:rounded-t">
            <a class="font-bold md:mr-6 text-green-darker no-underline"
               href="{{ route('region.index') }}">Regions</a>
        </div>
        <div class="flex flex-wrap px-4 py-3">
            <div class="w-full md:w-4/5">
                @foreach($regions as $country)
                    <a class="block font-semibold text-green-darker no-underline"
                       href="{{ route('region.store', $country) }}">{{ $country->name }}</a>
                    <hr class="border-b mr-6">
                    <div class="flex flex-wrap justify-between">
                        @foreach($country->children as $stateIndex => $state)
                            @if ($stateIndex === 4)
                                @break
                            @endif

                            <div class="w-1/2 lg:w-auto lg:mr-6 mb-4 md:mb-6">
                                <div>
                                    <a class="font-semibold text-green-darker no-underline mb-2"
                                       href="{{ route('region.store', $state) }}">
                                        {{ $state->name }}
                                    </a>

                                    <hr class="border-b mx-8 sm:mx-12 md:hidden">

                                    @foreach ($state->children as $cityIndex => $city)
                                        @if ($cityIndex === 3)
                                            @break
                                        @endif
                                        <p class="flex items-center justify-center md:justify-start mt-2">
                                            <span class="mr-2 text-green-darker select-none invisible md:visible">&middot;</span>
                                            <a class="font-semibold text-green-darker no-underline"
                                               href="{{ route('region.store', $city) }}">
                                                {{ $city->name }}
                                            </a>
                                        </p>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach;
            </div>
            <div
                class="w-full md:w-1/5 -mt-2 pt-2 flex items-center justify-center border-t md:border-t-0 md:border-l md:pl-4">
                <svg class="opacity-75 h-4 w-4 mr-1 invisible md:visible"
                     xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 24 24">
                    <path
                        d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                </svg>
                <a class="font-semibold text-left text-green-darker no-underline whitespace-no-wrap"
                   href="{{ route('region.index') }}">
                    More Regions
                </a>
            </div>
        </div>
    </div>
</div>
