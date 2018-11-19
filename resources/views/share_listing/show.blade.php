<?php

declare(strict_types=1);

use App\Models\Listing;

/** @var Listing $listing */

?>
@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('share_listing', $listing) }}

    <div class="w-full flex justify-center mt-6 mb-2">
        <form class="bg-white shadow-md rounded px-8 py-6 mb-4 flex-grow max-w-sm"
              method="post" action="{{ route('share_listing.store', $listing) }}">
            @csrf
            <h2 class="mb-2 text-grey-darker">
                Share {{ $listing->title }}
            </h2>
            <div class="mb-2">
                <small>Share this listing with up to {{ $max_email }} friends. (Leave extra fields
                    blank to skip).
                </small>
            </div>
            <div class="mb-2">
                <p class="block text-grey-darker text-sm font-bold mb-2">
                    Email Addresses
                </p>
            </div>
            @foreach(range(0, $max_email - 1) as $i)
                <div class="mb-2">
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline{{$errors->has('emails.' . $i) ? ' border-red mb-2' : ''}}"
                        type="email" name="emails[]"
                        placeholder="user@example.com" aria-label="Email {{ $i + 1 }}"
                        value="{{ old('emails.' . $i) }}">
                    @if ($errors->has('emails.' . $i))
                        <p role="alert"
                           class="text-red text-xs italic">{{ $errors->first('emails.' . $i) }}</p>
                    @endif
                </div>
            @endforeach
            <div class="mb-2">
                <label class="block text-grey-darker text-sm font-bold mb-2"
                       for="message">
                    Message (Optional)
                </label>
                <textarea
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline{{$errors->has('message') ? ' border-red mb-2' : ''}}"
                    id="message" type="text" name="message">{{ old('message') }}</textarea>
                @if ($errors->has('message'))
                    <p role="alert"
                       class="text-red text-xs italic">{{ $errors->first('message') }}</p>
                @endif
            </div>
            <div class="flex items-center justify-between mt-4">
                <button
                    class="bg-green hover:bg-green-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Share
                </button>
            </div>
        </form>
    </div>
@endsection
