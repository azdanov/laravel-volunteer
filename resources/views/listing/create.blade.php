@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('listing_create') }}

    <div class="w-full flex justify-center mt-6 mb-2">
        <form class="bg-white shadow-md rounded px-8 py-6 mb-4 flex-grow max-w-sm"
              method="post" action="{{ route('listing.store') }}">
            @csrf
            <h2 class="mb-2 text-grey-darker">Create Listing</h2>
            <div class="mb-2">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="title">
                    Title
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline{{$errors->has('title') ? ' border-red mb-2' : ''}}"
                    id="title" type="text" name="title" placeholder="Title"
                    value="{{ old('title') }}" required>
                @if ($errors->has('title'))
                    <p role="alert"
                       class="text-red text-xs italic">{{ $errors->first('title') }}</p>
                @endif
            </div>
            <div class="mb-2">
                @include('partials.form.regions')
            </div>
            <div class="mb-2">
                @include('partials.form.categories')
            </div>
            <div class="mb-2">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="body">
                    Body
                </label>
                <textarea
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline{{$errors->has('body') ? ' border-red mb-2' : ''}}"
                    id="body" type="body" name="body" required>{{ old('body') }}</textarea>
                @if ($errors->has('body'))
                    <p role="alert"
                       class="text-red text-xs italic">{{ $errors->first('body') }}</p>
                @endif
            </div>
            <div class="my-5">
                <label class="border rounded shadow p-2 text-grey-darker font-bold inline-flex items-center cursor-pointer select-none{{$errors->has('featured') ? ' border-red mb-2' : ''}}">
                    <input type="checkbox" name="featured" class="mr-2 leading-tight"
                           id="featured" {{ old('featured') ? 'checked' : '' }}>
                    <span class="text-sm">
                        Featured (${{ number_format(config('volunteer.default.featured_price'), 2) }})
                    </span>
                </label>
                @if ($errors->has('featured'))
                    <p role="alert"
                       class="text-red text-xs italic">{{ $errors->first('featured') }}</p>
                @endif
            </div>
            <div class="flex items-center justify-between mt-4">
                <button
                    class="bg-green hover:bg-green-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Create
                </button>
            </div>
        </form>
    </div>
@endsection
