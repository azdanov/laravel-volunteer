<?php

declare(strict_types=1);

use App\Models\Listing;

/** @var Listing[] $listings */
/** @var Category $category */
?>

@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('favorite') }}

    <div class="bg-transparent text-left sm:mb-1 lg:px-5 mt-3">
        <div class="bg-grey-lighter shadow border border-t-0 text-white leading-none sm:rounded">
            <div class="bg-grey-light border border-r-0 border-l-0 px-4 py-2 sm:rounded-t text-green-darker">
                <h2 class="font-bold text-2xl">Recently Viewed</h2>
                <small class="mt-1 text-grey-darker">Showing {{ $limit }} latest</small>
            </div>
            <div class="flex flex-wrap justify-between lg:flex-no-wrap px-4 pt-4">
                @if ($listings->isNotEmpty())
                    @each('partials.listings.listing', $listings, 'listing')
                @else
                    <p class="text-green-darker pb-4">
                        At this moment no listings were viewed. Check some of them out!
                    </p>
                @endif
            </div>
        </div>
    </div>
@endsection
