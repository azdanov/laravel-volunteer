<?php

declare(strict_types=1);

use App\Models\Category;

/** @var Category[] $categories */

?>
<div class="bg-transparent text-left my-3 lg:px-5">
    <div
        class="bg-grey-lighter shadow border border-t-0 text-white leading-none sm:rounded text-center md:text-left">
        <div class="bg-grey-light border border-r-0 border-l-0 px-4 py-2 sm:rounded-t">
            <a class="font-bold mr-0 md:mr-6 text-green-darker no-underline"
               href="{{ route('category.index') }}">Categories</a>
        </div>
        <div class="flex justify-between flex-wrap px-4 py-3">
            @foreach ($categories as $category)
                <div class="w-1/2 my-2 md:w-1/5">
                    <a class="font-semibold text-left text-green-darker no-underline"
                       href="{{ route('listing.show', compact('category')) }}">
                        {{ $category->name }}
                    </a>
                </div>
            @endforeach
            <div
                class="flex-1 mt-3 pt-2 border-t whitespace-no-wrap">
                <div class="flex items-center justify-center mt-1">
                    <svg class="opacity-75 h-4 w-4 mr-1 hidden lg:block"
                         xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 24 24">
                        <path
                            d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                    </svg>
                    <a class="font-semibold text-left text-green-darker no-underline"
                       href="#">
                        More Categories
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
