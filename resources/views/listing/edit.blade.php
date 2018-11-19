<?php

declare(strict_types=1);

use App\Models\Listing;

/** @var Listing $listing */

?>

@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('listing_edit', $listing) }}

    <div class="form-outer">
        <form class="form-inner max-w-sm"
              method="post" action="{{ route('listing.update', [$listing]) }}">
            @csrf
            @method('put')
            <h2 class="form-title">
                Editing Listing
                @if($listing->live())
                    <span class="select-none text-grey-dark">&middot;</span>
                    <a class="no-underline text-green-dark text-lg"
                       href="{{ route('region_category_listing.show', ['region' => $listing->region, 'category' => $listing->category, 'listing' => $listing]) }}">
                        {{ $listing->title }}
                    </a>
                @endif
            </h2>
            <div class="mb-2">
                <label class="form-label" for="title">
                    Title
                </label>
                <input
                    class="form-input{{$errors->has('title') ? ' form-input--error' : ''}}"
                    id="title" type="text" placeholder="Title" name="title"
                    value="{{ old('title', $listing->title) }}" required>
                @if ($errors->has('title'))
                    <p role="alert" class="form-error-text">{{ $errors->first('title') }}</p>
                @endif
            </div>
            <div class="mb-2">
                @include('partials.form.regions')
            </div>
            <div class="mb-2">
                @include('partials.form.categories')
            </div>
            <div class="mb-2">
                <label class="form-label" for="body">
                    Body
                </label>
                <textarea
                    class="form-input{{$errors->has('body') ? ' form-input--error' : ''}}"
                    id="body" type="body" name="body"
                    required>{{ old('body', $listing->body) }}</textarea>
                @if ($errors->has('body'))
                    <p role="alert"
                       class="form-error-text">{{ $errors->first('body') }}</p>
                @endif
            </div>
            <div class="my-5">
                <label
                    class="border rounded shadow p-2 text-grey-darker font-bold inline-flex items-center select-none cursor-pointer">
                    <input type="checkbox" name="featured" class="mr-2 leading-tight"
                           id="featured" {{ old('featured', $listing->featured) ? 'checked' : '' }}>
                    <span class="text-sm">
                        Featured
                        @if (!$listing->paid)
                            (${{ number_format(config('volunteer.default.featured_price'), 2) }})
                        @endif
                    </span>
                </label>
            </div>
            <div class="flex items-center justify-between mt-4">
                <button class="form-button" type="submit">
                    Save Edit
                </button>
                @if((!$listing->paid && $listing->featured) || !$listing->live )
                    <button type="submit" name="payment" value="true" class="form-button-outline">
                        Continue to {{ $listing->featured ? 'Payment' : 'Publish' }}
                    </button>
                @endunless
            </div>
        </form>
    </div>
@endsection
