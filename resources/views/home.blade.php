@extends('layouts.app')

@section('content')
    <div class="flex flex-col md:flex-row">
        <div class="md:w-3/4">
            @include('common.featured')
            @include('common.menu_location')
            @include('common.menu_category')
            @include('common.latest')
        </div>
        <div class="md:w-1/4 mt-3 md:mt-0 md:ml-3">
            @include('common.ad')
            @include('common.ad')
        </div>
    </div>
@endsection
