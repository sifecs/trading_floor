@extends('layout')

@section('content')
    <div class="wrapper my-4">
        <div class="container" style="max-width: 800px">
            <ul class="mp-0 product_favorite">
               @include('ajax.productsFavorites')
            </ul>
        </div>
    </div>

@endsection

