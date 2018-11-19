<?php

declare(strict_types=1);

use App\Models\Category;
use App\Models\Listing;
use App\Models\Region;
use App\Models\User;

/** @var Listing $listing */
/** @var Category $category */
/** @var Region $region */
/** @var User $user */
?>

@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('region_category_listing', $region, $category, $listing) }}

    <div class="flex flex-wrap lg:flex-no-wrap">
        <div class="lg:w-3/4">
            <div
                class="text-green-darker md:mb-1 md:pt-3 mt-2 lg:mt-0 lg:px-5">
                <div
                    class="self-start bg-grey-lightest shadow border border-grey-light leading-none md:rounded">
                    <div class="bg-grey-lighter border-b border-grey-light px-4 py-2 md:rounded-t">
                        <h2 class="font-bold mr-6 text-2xl">
                            {{ e($listing->title) }} in {{ $region->name }}
                        </h2>
                    </div>
                    <div class="flex flex-wrap px-4 py-4">
                        <p class="leading-normal">
                            {!! nl2br(e($listing->body)) !!}
                        </p>
                        <small class="w-full mt-4 pt-3 border-t">Viewed {{ $listing->views() }} times</small>
                    </div>
                </div>
            </div>
            <div
                class="flex flex-wrap lg:flex-no-wrap bg-transparent text-green-darker my-4 lg:pt-3 lg:px-5">
                <div
                    class="w-full bg-grey-lightest shadow border border-grey-light leading-none md:rounded">
                    <div class="bg-grey-lighter border-b border-grey-light px-4 py-2 md:rounded-t">
                        <h3 class="font-bold mr-6 text-xl">
                            Contact {{ $listing->user->name }}
                        </h3>
                    </div>
                    @unless ($user)
                        <p class="m-4">
                            <a href="{{ route('register') }}" class="text-green-dark">Register</a>
                            or
                            <a href="{{ route('login') }}" class="text-green-dark">Login</a>
                            to contact the listing owner.
                        </p>
                    @else
                        <form class="m-4" method="post" action="{{ route('contact_listing.store', [$region, $category, $listing]) }}">
                            @csrf
                            <div class="mb-2">
                                <label class="block text-grey-darker text-sm font-bold mb-2"
                                       for="message">
                                    Message
                                </label>
                                <textarea
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline{{$errors->has('message') ? ' border-red mb-2' : ''}}"
                                    id="message" type="text" name="message" placeholder=""
                                    required>{{ old('message') }}</textarea>
                                @if ($errors->has('message'))
                                    <p role="alert"
                                       class="text-red text-xs italic">{{ $errors->first('message') }}</p>
                                @endif
                            </div>
                            <div class="flex items-center">
                                <button
                                    class="bg-green hover:bg-green-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                    type="submit">
                                    Contact
                                </button>
                                <small class="ml-4 text-grey-darker text-xs italic leading-tight">
                                    The message is sent to {{ $listing->user->name }} and they'll be
                                    able to reply directly to your email.
                                </small>
                            </div>
                        </form>
                    @endunless
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/4 lg:ml-4">
            @if ($user)
                <div class="w-full mb-4 lg:my-0 text-green-darker leading-none md:rounded">
                    <div class="flex justify-around lg:flex-col lg:justify-start mt-1">
                        <a href="{{ route('share_listing.index', $listing) }}"
                           class="bg-transparent text-center hover:bg-green text-green-dark font-semibold hover:text-white md:my-2 py-2 px-4 border border-green hover:border-transparent rounded no-underline shadow hover:shadow-inner">
                            Email to a friend
                        </a>
                        @unless ($listing->favoritedBy($user))
                            <form method="post" id="favorite-listing-form"
                                  action="{{ route('region_listing.store', compact('region', 'listing')) }}">
                                @csrf
                                <button type="submit"
                                        class="w-full bg-transparent hover:bg-green text-green-dark font-semibold hover:text-white md:my-2 py-2 px-4 border border-green hover:border-transparent rounded shadow hover:shadow-inner">
                                    Add to favorites
                                </button>
                            </form>
                        @endunless
                    </div>
                </div>
            @endif
            <div
                class="flex flex-wrap self-start my-3 justify-around lg:justify-center rounded shadow border border-grey-light bg-grey-lightest">
                @include('partials.ad')
                @include('partials.ad')
            </div>
        </div>
    </div>

@endsection
