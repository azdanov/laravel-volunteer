@extends('layouts.app')

@section('content')
    <div class="flex flex-col lg:flex-row">
        <div class="lg:w-3/4">
            @if($featured->isNotEmpty())
                @include('partials.home.featured_list', $featured)
            @endif
            @include('partials.home.regions_list', $regions)
            @include('partials.home.category_list', $categories)
            @include('partials.home.latest_list', $listings)
        </div>
        <div class="panel-ads">
            @include('partials.ad')
            @include('partials.ad')
        </div>
    </div>
@endsection
