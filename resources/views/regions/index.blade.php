<?php

declare(strict_types=1);

use App\Region;

/** @var Region[] $regions */
?>

@extends('layouts.app')

@section('content')
    <h2 class="text-3xl">Regions</h2>
    <div class="bg-transparent text-left sm:mb-1 sm:pt-3 lg:px-5">
        <div class="bg-grey-lighter shadow border border-t-0 text-white leading-none sm:rounded">
            @foreach($regions as $country)
                <div class="bg-grey-light border border-r-0 border-l-0 px-4 py-2 sm:rounded-t">
                    <a class="font-bold mr-6 text-2xl text-green-darker no-underline"
                       href="{{ route('user.region.store', $country) }}">{{ $country->name }}</a>
                </div>
                <div class="flex px-4 py-4">
                    @foreach($country->children as $stateIndex => $state)
                        <div class="w-full ml-6 mt-3">
                            <div>
                                <a class="font-semibold text-left text-xl text-green-darker no-underline"
                                   href="{{ route('user.region.store', $state) }}">
                                    {{ $state->name }}
                                </a>

                                <hr class="border-b">

                                @foreach ($state->children as $cityIndex => $city)
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
                </div>
            @endforeach;
        </div>
    </div>
@endsection
