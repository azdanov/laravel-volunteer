<?php

declare(strict_types=1);

use App\Models\Listing;

/** @var Listing $listing */

?>
@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('share_listing', $listing) }}

    <div class="form-outer">
        <form class="form-inner max-w-sm"
              method="post" action="{{ route('share_listing.store', $listing) }}">
            @csrf
            <h2 class="form-title">
                Share {{ $listing->title }}
            </h2>
            <div class="mb-2">
                <small>Share this listing with up to {{ $max_email }} friends. (Leave extra fields
                    blank to skip).
                </small>
            </div>
            <div class="mb-2">
                <p class="form-label">
                    Email Addresses
                </p>
            </div>
            @foreach(range(0, $max_email - 1) as $i)
                <div class="mb-2">
                    <input
                        class="form-input{{$errors->has('emails.' . $i) ? ' form-input--error' : ''}}"
                        type="email" name="emails[]"
                        placeholder="user@example.com" aria-label="Email {{ $i + 1 }}"
                        value="{{ old('emails.' . $i) }}">
                    @if ($errors->has('emails.' . $i))
                        <p role="alert"
                           class="form-error-text">{{ $errors->first('emails.' . $i) }}</p>
                    @endif
                </div>
            @endforeach
            <div class="mb-2">
                <label class="form-label"
                       for="message">
                    Message (Optional)
                </label>
                <textarea
                    class="form-input{{$errors->has('message') ? ' form-input--error' : ''}}"
                    id="message" type="text" name="message">{{ old('message') }}</textarea>
                @if ($errors->has('message'))
                    <p role="alert"
                       class="form-error-text">{{ $errors->first('message') }}</p>
                @endif
            </div>
            <button
                class="form-button"
                type="submit">
                Share
            </button>
        </form>
    </div>
@endsection
