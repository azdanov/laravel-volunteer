<?php

declare(strict_types=1);

use App\Models\Listing;
use App\Models\Region;

/** @var Region[] $regions */
/** @var Listing $listing */

?>
<label class="block text-grey-darker text-sm font-bold mb-2" for="region_id">
    Region
</label>
<div class="relative">
    <select
        class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline{{$errors->has('region_id') ? ' border-red' : ''}}"
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
    <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path
                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
        </svg>
    </div>
</div>

@if ($errors->has('region_id'))
    <p role="alert"
       class="text-red text-xs italic my-2">{{ $errors->first('region_id') }}</p>
@endif
