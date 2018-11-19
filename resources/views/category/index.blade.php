<?php

declare(strict_types=1);

use App\Models\Category;

/** @var Category[] $categories */
?>

@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('generic', 'Categories') }}

    <div class="panel-outer">
        <div class="panel-inner">
            <div class="panel-heading">
                <h2 class="panel-heading-text">Categories</h2>
            </div>
            <div class="flex flex-wrap lg:flex-no-wrap px-4 py-4">
                @foreach($categories as $category)
                    <div class="w-1/2 md:w-1/3 lg:w-full lg:ml-6 mt-3 mb-3 lg:mb-0">
                        <div>
                            <h3 class="font-semibold text-left text-green-darker text-xl whitespace-no-wrap">
                                <a class="text-green-darker no-underline"
                                   href="{{ route('listing.show', $category) }}">
                                    {{ $category->name }}
                                </a>
                                <small class="font-normal ml-1 select-none">
                                    ({{ $category->listingsCount() }})
                                </small>
                            </h3>
                            <hr class="border-b mr-12 md:mr-0">
                            @foreach ($category->children as $subCategory)
                                <p class="flex items-center text-green-darker mt-2">
                                    <span class="mr-2 select-none">&middot;</span>
                                    <a class="font-semibold text-left text-green-darker no-underline"
                                       href="{{ route('listing.show', $subCategory) }}">
                                        {{ $subCategory->name }}
                                    </a>
                                    <small class="ml-1 select-none">
                                        ({{ $subCategory->listingsCount() }})
                                    </small>
                                </p>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

