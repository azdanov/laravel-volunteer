<?php

declare(strict_types=1);

use App\Models\Category;
use App\Models\Listing;

/** @var Category[] $categories */
/** @var Listing $listing */

?>
<label class="form-label" for="category_id">
    Category
</label>
<div class="relative">
    <select
        class="form-input{{$errors->has('category_id') ? ' border-red' : ''}}"
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
    @include('partials.form.select-chevron')
</div>

@if ($errors->has('category_id'))
    <p role="alert" class="form-error-text my-2">{{ $errors->first('category_id') }}</p>
@endif
