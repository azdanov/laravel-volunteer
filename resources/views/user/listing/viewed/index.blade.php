<?php

declare(strict_types=1);

use App\Models\Listing;

/** @var Listing[] $listings */
/** @var Category $category */
?>

@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('generic', 'Viewed') }}

    <div class="panel-outer">
        <div class="panel-inner">
            <div class="panel-heading">
                <h2 class="panel-heading-text">Recently Viewed</h2>
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
