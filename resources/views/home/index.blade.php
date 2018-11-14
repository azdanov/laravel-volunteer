@extends('layouts.app')

@section('content')
    <div class="flex flex-col lg:flex-row">
        <div class="lg:w-3/4">
            @include('partials.featured_list')
            @include('partials.regions_list', compact('regions'))
            @include('partials.category_list', compact('category'))
            @include('partials.latest_list')
        </div>
        <div class="flex flex-wrap self-start justify-around w-full lg:w-1/4 mt-3 md:mt-0 mb-4 rounded shadow bg-grey-lightest">
            @include('partials.ad')
            @include('partials.ad')
        </div>
    </div>
@endsection
