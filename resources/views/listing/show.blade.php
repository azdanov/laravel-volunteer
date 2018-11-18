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
        <div class="bg-grey-lightest shadow border border-grey-light text-white leading-none sm:rounded">
            <div class="bg-grey-lighter border-b border-grey-light px-4 py-2 sm:rounded-t">
                <h2 class="font-bold mr-6 text-2xl text-green-darker">{{ $category->name }}</h2>
            </div>
            <div class="flex flex-wrap px-4 pt-4">
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
