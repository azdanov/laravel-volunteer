<?php

declare(strict_types=1);

use App\Models\Listing;

/** @var Listing $listing */

?>

@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('listing_edit', $listing) }}

    <div class="w-full flex justify-center mt-6 mb-2">
        <form class="bg-white shadow-md rounded px-8 py-6 mb-4 flex-grow max-w-sm"
              method="post" action="{{ route('listing.update', [$listing]) }}">
            @csrf
            @method('put')
            <h2 class="mb-2 text-grey-darker">
                Editing Listing
                @if($listing->live())
                    <a class="no-underline text-green-dark text-lg ml-3"
                       href="{{ route('region_category_listing.show', ['region' => $listing->region, 'category' => $listing->category, 'listing' => $listing]) }}">
                        {{ $listing->title }}
                    </a>
                @endif
            </h2>
            <div class="mb-2">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="title">
                    Title
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline{{$errors->has('title') ? ' border-red mb-2' : ''}}"
                    id="title" type="text" placeholder="Title" name="title"
                    value="{{ old('title', $listing->title) }}" required>
                @if ($errors->has('title'))
                    <p role="alert"
                       class="text-red text-xs italic">{{ $errors->first('title') }}</p>
                @endif
            </div>
            <div class="mb-2">
                @include('partials.form.regions')
            </div>
            <div class="mb-2">
                @include('partials.form.categories')
            </div>
            <div class="mb-2">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="body">
                    Body
                </label>
                <textarea
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline{{$errors->has('body') ? ' border-red mb-2' : ''}}"
                    id="body" type="body" name="body"
                    required>{{ old('body', $listing->body) }}</textarea>
                @if ($errors->has('body'))
                    <p role="alert"
                       class="text-red text-xs italic">{{ $errors->first('body') }}</p>
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
                <button
                    class="bg-green hover:bg-green-dark text-white font-bold md:my-2 py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Save Edit
                </button>
                @if((!$listing->paid || ($listing->live && !$listing->featured)))
                    <button type="submit" name="payment" value="true"
                            class="bg-transparent hover:bg-green text-green-dark font-semibold hover:text-white md:my-2 py-2 px-4 border border-green hover:border-transparent rounded">
                        Continue to {{ $listing->featured ? 'Payment' : 'Save' }}
                    </button>
                @endunless
            </div>
        </form>
    </div>
@endsection
