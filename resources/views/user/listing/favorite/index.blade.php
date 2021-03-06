<?php

declare(strict_types=1);

use App\Models\Listing;

/** @var Listing[] $listings */
/** @var Category $category */
?>

@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('generic', 'Favorite') }}

    <div class="panel-outer">
        <div class="panel-inner">
            <div class="panel-heading">
                <h2 class="panel-heading-text">Favorite</h2>
            </div>
            <div class="flex flex-wrap justify-between lg:flex-no-wrap px-4 py-4">
                @if ($listings->isNotEmpty())
                    @each('partials.listings.favorite', $listings, 'listing'))
                @else
                    <p class="text-green-darker pb-4">
                        Currently no listings are favorited. Add some to this list!
                    </p>
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
