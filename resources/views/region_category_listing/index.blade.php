<?php

declare(strict_types=1);

use App\Models\Listing;

/** @var Listing[] $listings */
/** @var Category $category */
?>

@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('region_category', $region, $category) }}

    <div class="panel-outer">
        <div class="panel-inner">
            <div class="panel-heading">
                <h2 class="panel-heading-text">{{ $category->name }}</h2>
            </div>
            <div class="flex flex-wrap lg:flex-no-wrap px-4 pt-4">
                @if ($listings->isNotEmpty())
                    @foreach($listings as $listing)
                        @include('partials.listings.listing', compact('listing'))
                    @endforeach
                @else
                    <p class="text-green-darker">Currently no volunteer opportunities are available.
                        Check again soon!</p>
                @endif
            </div>
        </div>
        @if ($listings->isNotEmpty())
            <div class="mt-4">
                {{ $listings->links() }}
            </div>
        @endif
    </div>
@endsection
