<?php

declare(strict_types=1);

use App\Models\Listing;

/** @var Listing $listing */

?>

@component('partials.listings.base', compact('listing'))
    @slot('links')
        <ul class="text-xs list-reset text-green-darker flex items-center">
            <li class="mr-2">Favorited {{ $listing->favoritedTime() }}</li>
            <li>
                <form method="post" id="delete-favorite-listing-form"
                      action="#">
                    @csrf
                    <button type="submit"
                            class="text-green-dark hover:underline">
                        Delete
                    </button>
                </form>
            </li>
        </ul>
    @endslot
@endcomponent
