<?php

declare(strict_types=1);

use App\Models\Listing;
use App\Models\Region;

/** @var Region[] $regions */
/** @var Listing $listing */

?>
<label class="form-label" for="region_id">
    Region
</label>
<div class="relative">
    <select
        class="form-input{{$errors->has('region_id') ? ' border-red' : ''}}"
        name="region_id" id="region_id">
        @foreach ($regions as $country)
            <optgroup disabled label="{{ $country->name }}"></optgroup>
            @foreach ($country->children as $state)
                <optgroup label="{{ $state->name }}">
                    @foreach ($state->children as $city)
                        @if ((isset($listing) && $listing->region->id === $city->id) || (int) old('region_id') === $city->id)
                            <option selected value="{{$city->id}}">{{ $city->name }}</option>
                        @else
                            <option value="{{$city->id}}">{{ $city->name }}</option>
                        @endif
                    @endforeach
                </optgroup>
            @endforeach
        @endforeach
    </select>
    @include('partials.form.select-chevron')
</div>

@if ($errors->has('region_id'))
    <p role="alert" class="form-error-text my-2">{{ $errors->first('region_id') }}</p>
@endif
