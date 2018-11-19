<?php

declare(strict_types=1);

use App\Models\Listing;

/** @var Listing[] $listings */

?>
<div class="panel-outer">
    <p class="ml-2 mb-1 text-grey-dark text-sm">Latest</p>
    <div class="panel-inner">
        <div class="panel-heading">
            <div class="flex text-green-darker">
                <div class="w-1/3 md:w-3/5">
                    <p class="panel-heading-text">Job Title</p>
                </div>
                <div class="w-2/3 md:w-2/5 pl-4 lg:pl-6 flex justify-between">
                    <p class="panel-heading-text">Category</p>
                    <p class="panel-heading-text">Location</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col justify-center text-green-darker flex-wrap lg:flex-no-wrap px-4 pt-3 pb-1">
            @foreach($listings as $listing)
                <div class="flex justify-between items-center mb-3">
                    <div class="w-1/3 md:w-3/5">
                        <a class="font-semibold text-left text-green-darker no-underline"
                           href="{{ route('region_category_listing.show', ['region' => $listing->region, 'category' => $listing->category, 'listing' => $listing]) }}">
                            {{ $listing->title }}
                        </a>
                        <small
                            class="md:my-2 hidden md:block lg:inline-block">{{ str_limit($listing->body, 60) }}</small>
                    </div>
                    <div class="w-2/3 md:w-2/5 pl-4 lg:pl-6 flex justify-between items-center">
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
