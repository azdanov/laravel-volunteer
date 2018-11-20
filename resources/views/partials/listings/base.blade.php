<?php

declare(strict_types=1);

use App\Models\Listing;
use App\Models\Region;

/** @var Listing $listing */
/** @var Region $region */
?>

<div class="sm:pr-1 lg:pr-3 w-full md:w-1/2 lg:w-1/3 leading-tight">
    <div class="text-green-darker flex flex-col mb-2">
        <h5 class="font-normal mb-1">
            @if ($listing->live)
                <a class="font-semibold text-left text-xl text-green-darker no-underline"
                   href="{{ route('region_category_listing.show', ['region' => $listing->region, 'category' => $listing->category, 'listing' => $listing]) }}">
                    {{ $listing->title }}
                </a>
                @unless(preg_match('/(' . $listing->category->name . ')/i', url()->current()) === 1)
                    in
                    <a class="font-semibold text-green-darker no-underline"
                       href="{{ route('region_category_listing.index', [$listing->region, $listing->category]) }}">
                        {{ $listing->category->name }}
                    </a>
                @endunless
                @if(Route::is('listing.show') || ($global_region->children->isNotEmpty() && !$global_region->is($listing->region)))
                    for
                    <a class="font-semibold text-green-darker no-underline"
                       href="{{ route('region.store', $listing->region) }}">
                        {{ $listing->region->name }}
                    </a>
                @endif
            @else
                <p><span class="text-lg font-semibold">{{ $listing->title }}</span> in {{ $listing->category->name }} for {{ $listing->region->name }}</p>
            @endif
        </h5>
        <p class="mt-2 text-xs">
            Created
            <time>{{ $listing->created_at->diffForHumans() }}</time>
            by {{ $listing->user->name }}
        </p>
    </div>
    {{ $links ?? null }}
</div>
