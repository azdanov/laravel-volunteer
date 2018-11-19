@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('generic', 'Create') }}

    <div class="form-outer">
        <form class="bg-white shadow-md rounded px-8 py-6 mb-4 flex-grow max-w-sm"
              method="post" action="{{ route('listing.store') }}">
            @csrf
            <h2 class="form-title">Create Listing</h2>
            <div class="mb-2">
                <label class="form-label" for="title">
                    Title
                </label>
                <input class="form-input{{$errors->has('title') ? ' form-input--error' : ''}}"
                       id="title" type="text" name="title" placeholder="Title"
                       value="{{ old('title') }}" required>
                @if ($errors->has('title'))
                    <p role="alert" class="form-error-text">{{ $errors->first('title') }}</p>
                @endif
            </div>
            <div class="mb-2">
                @include('partials.form.regions')
            </div>
            <div class="mb-2">
                @include('partials.form.categories')
            </div>
            <div class="mb-2">
                <label class="form-label" for="body">
                    Body
                </label>
                <textarea class="form-input{{$errors->has('body') ? ' form-input--error' : ''}}"
                          id="body" type="body" name="body" required>{{ old('body') }}</textarea>
                @if ($errors->has('body'))
                    <p role="alert" class="form-error-text">{{ $errors->first('body') }}</p>
                @endif
            </div>
            <div class="my-5">
                <label class="inline-flex items-center w-auto form-input{{$errors->has('featured') ? ' form-input--error' : ''}}">
                    <input type="checkbox" name="featured" class="mr-2 leading-tight"
                           id="featured" {{ old('featured') ? 'checked' : '' }}>
                    <span class="text-sm">
                        Featured (${{ number_format(config('volunteer.default.featured_price'), 2) }})
                    </span>
                </label>
                @if ($errors->has('featured'))
                    <p role="alert" class="form-error-text">{{ $errors->first('featured') }}</p>
                @endif
            </div>
            <button
                class="form-button"
                type="submit">
                Create
            </button>
        </form>
    </div>
@endsection
