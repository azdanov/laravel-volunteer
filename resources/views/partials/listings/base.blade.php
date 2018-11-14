<?php

declare(strict_types=1);

use App\Models\Listing;

/** @var Listing $listing */
?>

<div class="w-1/2 md:w-1/3 lg:w-full mb-3 lg:mb-0">
    <div class="text-green-darker flex flex-col">
        <h5 class="font-normal">
            <a class="font-semibold text-left text-xl text-green-darker no-underline"
               href="#">
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
        <p class="mt-2 text-xs">Created
            <time>{{ $listing->created_at->diffForHumans() }}</time>
            by {{ $listing->user->name }} </p>
    </div>
</div>

@yield('links')

