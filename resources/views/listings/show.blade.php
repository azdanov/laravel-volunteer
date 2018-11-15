<?php

declare(strict_types=1);

use App\Models\Listing;

/** @var Listing[] $listings */
/** @var Category $category */
?>

@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('category', $category) }}

    <div class="bg-transparent text-left my-3 lg:px-5">
        <div class="bg-grey-lighter shadow border border-t-0 text-white leading-none sm:rounded">
            <div class="bg-grey-light border border-r-0 border-l-0 px-4 py-2 sm:rounded-t">
                <h2 class="font-bold mr-6 text-2xl text-green-darker">{{ $category->name }}</h2>
            </div>
            <div class="flex flex-wrap px-4 py-4">
                @if ($listings->count())
                    @foreach($listings as $listing)
                        @include('partials.listings.listing', compact('listing'))
                    @endforeach
                @else
                    <p class="text-green-darker">Currently no volunteer opportunities are available.
                        Check again soon!</p>
                @endif
            </div>
        </div>
        @if ($listings->count())
            <div class="mt-4">
                {{ $listings->links() }}
            </div>
        @endif
    </div>
@endsection
