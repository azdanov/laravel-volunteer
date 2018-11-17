<?php

declare(strict_types=1);

use App\Models\Listing;

/** @var Listing $listing */

?>
@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('payment_listing', $listing) }}
    <div class="w-full flex justify-center mt-6">
        @unless ($listing->featured)
            <form
                class="flex justify-center flex-wrap text-center bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4 flex-grow max-w-xs"
                method="post"
                action="{{ route('payment_listing.update', $listing) }}">
                @csrf
                @method('patch')
                <h2 class="mb-3 text-grey-darker">Payment for Listing</h2>
                <div class="mb-5 w-full">
                    <p>No payment is required.</p>
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-green hover:bg-green-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Save
                    </button>
                </div>
            </form>
        @else
            <form
                class="flex justify-center flex-wrap bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4 flex-grow max-w-xs text-center"
                method="post" id="pay-listing-form"
                action="{{ route('payment_listing.store', $listing) }}">
                @csrf
                <h2 class="mb-3 text-grey-darker">Payment for Listing</h2>
                <p class="w-full text-center">Total cost:
                    ${{ number_format(config('volunteer.default.featured_price'), 2) }}</p>
                <div id="dropin-container" class="-mt-3 w-full"></div>
                <p class="hidden w-full -mt-1 text-center text-xs text-grey-dark" id="card_number">
                    <span class="select-none">Demo Card Number:</span>
                    4005 5192 0000 0004
                </p>
                <input type="hidden" name="payment_nonce" value="">
                <div class="flex items-center justify-between mt-4">
                    <button
                        class="bg-green hover:bg-green-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="button" id="fetch-braintree-form-button">
                        Continue
                    </button>
                    <button
                        class="hidden bg-green hover:bg-green-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="button" id="process-braintree-form-button">
                        Process
                    </button>
                    <button
                        class="hidden bg-green hover:bg-green-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit" id="pay-listing-form-pay-button">
                        Pay
                    </button>
                </div>
            </form>
        @endunless
    </div>
@endsection
