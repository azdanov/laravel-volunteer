<?php

declare(strict_types=1);

use App\Models\Region;

/** @var Region[] $regions */
?>

<div class="panel-outer">
    <div class="panel-inner">
        <div class="panel-heading">
            <a class="panel-heading-text"
               href="{{ route('region.index') }}">Regions</a>
        </div>
        <div class="flex flex-wrap px-4 py-3 text-center md:text-left">
            <div class="w-full md:w-4/5">
                @foreach($regions as $country)
                    <a class="inline-block font-semibold text-green-darker no-underline mb-3 pb-1 border-b"
                       href="{{ route('region.store', $country) }}">{{ $country->name }}</a>
                    <div class="flex flex-wrap justify-between">
                        @foreach($country->children as $stateIndex => $state)
                            @if ($stateIndex === 4)
                                @break
                            @endif

                            <div class="w-1/2 md:w-auto md:mr-6 mb-4 md:mb-2">
                                <div>
                                    <a class="font-semibold border-b lg:border-b-0 text-green-darker no-underline mb-4"
                                       href="{{ route('region.store', $state) }}">
                                        {{ $state->name }}
                                    </a>

                                    @foreach ($state->children as $cityIndex => $city)
                                        @if ($cityIndex === 3)
                                            @break
                                        @endif
                                        <p class="flex items-center justify-center md:justify-start mt-3">
                                            <span class="mr-2 text-green-darker select-none ">&middot;</span>
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
                <svg class="opacity-75 h-4 w-4 mr-1 invisible lg:visible"
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
