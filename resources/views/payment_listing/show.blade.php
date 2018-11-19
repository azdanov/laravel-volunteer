<?php

declare(strict_types=1);

use App\Models\Listing;

/** @var Listing $listing */

?>
@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('payment_listing', $listing) }}

    <div class="form-outer">
        @unless ($listing->featured)
            <form
                class="form-inner text-center"
                method="post"
                action="{{ route('payment_listing.update', $listing) }}">
                @csrf
                @method('patch')
                <h2 class="mb-3 text-grey-darker">Payment for Listing</h2>
                <div class="mb-5 w-full">
                    <p>No payment is required.</p>
                </div>
                <div class="flex items-center justify-center">
                    <button
                        class="form-button"
                        type="submit">
                        Save
                    </button>
                </div>
            </form>
        @else
            <form
                class="form-inner text-center"
                method="post" id="pay-listing-form"
                action="{{ route('payment_listing.store', $listing) }}">
                @csrf
                <h2 class="mb-3 text-grey-darker">Payment for Listing</h2>
                <p class="w-full">Total cost:
                    ${{ number_format(config('volunteer.default.featured_price'), 2) }}</p>
                <div id="dropin-container" class="-mt-3 w-full"></div>
                <p class="hidden w-full -mt-1 text-xs text-grey-dark" id="card_number">
                    <span class="select-none">Demo Card Number:</span>
                    4005 5192 0000 0004
                </p>
                <input type="hidden" name="payment_nonce" value="">
                <div class="flex items-center justify-center mt-6">
                    <button
                        class="form-button"
                        type="button" id="fetch-braintree-form-button">
                        Continue
                    </button>
                    <button
                        class="hidden form-button"
                        type="button" id="process-braintree-form-button">
                        Process
                    </button>
                    <button
                        class="hidden form-button"
                        type="submit" id="pay-listing-form-pay-button">
                        Pay
                    </button>
                </div>
            </form>
        @endunless
    </div>
@endsection
