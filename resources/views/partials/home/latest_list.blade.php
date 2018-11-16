<?php

declare(strict_types=1);

use App\Models\Listing;

/** @var Listing[] $listings */

?>
<div class="bg-transparent text-left my-3 lg:px-5">
    <p class="ml-2 mb-1 text-grey-dark text-sm">Latest</p>
    <div class="bg-grey-lighter shadow border border-t-0 leading-none sm:rounded">
        <div
            class="bg-grey-light border border-r-0 text-green-darker border-l-0 px-4 py-2 sm:rounded-t">
            <div class="flex">
                <div class="w-1/3 md:w-3/5">
                    <p class="font-bold no-underline">Job Title</p>
                </div>
                <div class="w-2/3 md:w-2/5 flex justify-between">
                    <p class="font-bold no-underline">Category</p>
                    <p class="font-bold no-underline">Location</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col justify-center flex-wrap lg:flex-no-wrap px-4 pt-3 pb-1">
            @foreach($listings as $listing)
                <div class="flex justify-between items-center mb-3 md:whitespace-no-wrap">
                    <div class="w-1/3 md:w-3/5">
                        <a class="font-semibold text-left text-green-darker no-underline"
                           href="{{ route('region_category_listing.show', ['region' => $listing->region, 'category' => $listing->category, 'listing' => $listing]) }}">
                            {{ $listing->title }}
                        </a>
                        <small
                            class="md:my-2 hidden md:block lg:inline-block">{{ str_limit($listing->body, 40) }}</small>
                    </div>
                    <div class="w-2/3 md:w-2/5 flex justify-between items-center">
                        <a class="text-sm text-green-darker"
                           href="{{ route('region_category_listing.index', ['region' => $listing->region, 'category' => $listing->category]) }}">{{ $listing->category->name }}</a>
                        <a class="text-sm text-green-darker"
                           href="{{ route('region_category.show', ['region' => $listing->region]) }}">{{ $listing->region->name }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
