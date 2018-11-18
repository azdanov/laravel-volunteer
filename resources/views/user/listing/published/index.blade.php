<?php

declare(strict_types=1);

use App\Models\Listing;

/** @var Listing[] $listings */
/** @var Category $category */
?>

@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('published') }}

    <div class="bg-transparent text-left sm:mb-1 lg:px-5 mt-3">
        <div class="bg-grey-lighter shadow border border-t-0 text-white leading-none sm:rounded">
            <div class="bg-grey-light border border-r-0 border-l-0 px-4 py-2 sm:rounded-t">
                <h2 class="font-bold mr-6 text-2xl text-green-darker">Published</h2>
            </div>
            <div class="flex flex-wrap justify-between lg:flex-no-wrap px-4 pt-4">
                @if ($listings->isNotEmpty())
                    @each('partials.listings.own_listing', $listings, 'listing'))
                @else
                    <p class="text-green-darker pb-4">
                        Currently no listings are published. Why not create one?
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
