<?php

declare(strict_types=1);

use App\Models\Listing;

/** @var Listing $listing */

?>

@component('partials.listings.base', compact('listing'))
    @slot('links')
        <ul class="text-xs list-reset text-green-darker flex items-center">
            <li>Last updated
                <time>{{ $listing->updated_at->diffForHumans() }}</time>
            </li>
            <li class="mx-2 text-grey-dark select-none">&middot;</li>
            <li class="flex justify-between items-center w-16">
                <form method="post" id="delete-favorite-listing-form"
                      action="{{ route('listing.destroy', ['listing' => $listing]) }}">
                    @method('delete')
                    @csrf
                    <button type="submit" class="text-red-dark hover:underline">
                        Delete
                    </button>
                </form>
                <a href="{{ route('listing.edit', $listing) }}"
                   class="no-underline text-green-dark hover:underline">Edit</a>
            </li>
        </ul>
    @endslot
@endcomponent
