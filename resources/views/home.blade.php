@extends('layouts.app')

@section('content')
    <div class="flex flex-col md:flex-row">
        <div class="md:w-3/4">
            @include('layouts.partials.featured')
            @include('layouts.partials.menu_location')
            @include('layouts.partials.menu_category')
            @include('layouts.partials.latest')
        </div>
        <div class="md:w-1/4 mt-3 md:mt-0 md:ml-3">
            @include('layouts.partials.ad')
            @include('layouts.partials.ad')
        </div>
    </div>
@endsection
