@extends('layouts.app')

@section('content')
    <div class="flex flex-col md:flex-row">
        <div class="md:w-3/4">
            @include('partials.featured')
            @include('partials.menu_location', ['regions' => $regions])
            @include('partials.menu_category')
            @include('partials.latest')
        </div>
        <div class="md:w-1/4 mt-3 md:mt-0 md:ml-3">
            @include('partials.ad')
            @include('partials.ad')
        </div>
    </div>
@endsection
