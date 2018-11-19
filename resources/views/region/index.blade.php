<?php

declare(strict_types=1);

use App\Models\Region;

/** @var Region[] $regions */
?>

@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('generic', 'Regions') }}

    <div class="panel-outer">
        <div class="panel-inner">
            @foreach($regions as $country)
                <div class="panel-heading">
                    <a class="panel-heading-text"
                       href="{{ route('region.store', $country) }}">{{ $country->name }}</a>
                </div>
                <div class="flex flex-wrap lg:flex-no-wrap px-4 my-2">
                    @foreach($country->children as $state)
                        <div class="w-1/2 md:w-1/3 lg:w-full lg:ml-6 mt-3 mb-3 lg:mb-0">
                            <div>
                                <a class="font-semibold text-left text-xl text-green-darker no-underline whitespace-no-wrap"
                                   href="{{ route('region.store', $state) }}">
                                    {{ $state->name }}
                                </a>

                                <hr class="border-b mr-12 md:mr-0">

                                @foreach ($state->children as $cityIndex => $city)
                                    <p class="flex items-center mt-2">
                                        <span class="mr-2 text-green-darker select-none">&middot;</span>
                                        <a class="font-semibold text-left text-green-darker no-underline"
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
    </div>
@endsection
