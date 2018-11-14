@extends('layouts.app')

@section('content')
    <div class="flex flex-col md:flex-row">
        <div class="md:w-3/4">
            @include('partials.featured_list')
            @include('partials.regions_list', compact('regions'))
            @include('partials.category_list', compact('category'))
            @include('partials.latest_list')
        </div>
        <div class="md:w-1/4 mt-3 md:mt-0 md:ml-3">
            @include('partials.ad')
            @include('partials.ad')
        </div>
    </div>
@endsection
