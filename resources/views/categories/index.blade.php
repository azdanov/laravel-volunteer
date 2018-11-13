<?php

declare(strict_types=1);

use App\Models\Category;

/** @var Category[] $categories */
?>

@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('categories', $region) }}

    <div class="bg-transparent text-left sm:mb-1 sm:pt-3 lg:px-5">
        <div class="bg-grey-lighter shadow border border-t-0 text-white leading-none sm:rounded">
            <div class="bg-grey-light border border-r-0 border-l-0 px-4 py-2 sm:rounded-t">
                <h2 class="font-bold mr-6 text-2xl text-green-darker no-underline">Categories</h2>
            </div>
            <div class="flex flex-wrap lg:flex-no-wrap px-4 py-4">
                @foreach($categories as $category)
                    <div class="w-1/2 md:w-1/3 lg:w-full lg:ml-6 mt-3 mb-3 lg:mb-0">
                        <div>
                            <a class="font-semibold text-left text-xl text-green-darker no-underline whitespace-no-wrap"
                               href="#">
                                {{ $category->name }} (x)
                            </a>

                            <hr class="border-b mr-12 md:mr-0">

                            @foreach ($category->children as $subCategory)
                                <p class="flex items-center mt-2">
                                    <span class="mr-2 text-green-darker select-none">&middot;</span>
                                    <a class="font-semibold text-left text-green-darker no-underline"
                                       href="#">
                                        {{ $subCategory->name }} (x)
                                    </a>
                                </p>
                            @endforeach

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
