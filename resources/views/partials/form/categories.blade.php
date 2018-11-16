<?php

declare(strict_types=1);

use App\Models\Category;
use App\Models\Listing;

/** @var Category[] $categories */
/** @var Listing $listing */

?>
<label class="block text-grey-darker text-sm font-bold mb-2" for="category_id">
    Category
</label>
<div class="relative">
    <select
        class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline{{$errors->has('category_id') ? ' border-red' : ''}}"
        name="category_id" id="category_id">
        @foreach ($categories as $category)
            <optgroup label="{{ $category->name }}">
                @foreach ($category->children as $subCategory)
                    @if ((isset($listing) && $listing->category_id === $subCategory->id) || (int) old('category_id') === $subCategory->id)
                        <option selected value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                    @else
                        <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                    @endif
                @endforeach
            </optgroup>
        @endforeach
    </select>
    <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path
                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
        </svg>
    </div>
</div>

@if ($errors->has('category_id'))
    <p role="alert"
       class="text-red text-xs italic my-2">{{ $errors->first('category_id') }}</p>
@endif
