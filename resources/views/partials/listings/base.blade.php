<?php

declare(strict_types=1);

use App\Models\Listing;

/** @var Listing $listing */
?>

<div class="mb-4 w-auto md:w-1/2">
    <div class="text-green-darker flex flex-col mb-2">
        <h5 class="font-normal mb-1">
            <a class="font-semibold text-left text-xl text-green-darker no-underline"
               href="{{ route('region_category_listing.show', ['region' => $listing->region, 'category' => $listing->category, 'listing' => $listing]) }}">
                {{ $listing->title }}
            </a>
            @if($region->children->count())
                in
                <a class="font-semibold text-green-darker no-underline"
                   href="{{ route('region.store', $listing->region) }}">
                    {{ $listing->region->name }}
                </a>
            @endif
        </h5>
        <p class="mt-2 text-xs">
            Created
            <time>{{ $listing->created_at->diffForHumans() }}</time>
            by {{ $listing->user->name }}
        </p>
    </div>
    {{ $links }}
</div>


