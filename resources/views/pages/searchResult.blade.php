@extends('layout')

@section('content')
    <div class="wrapper my-4">
        <div class="container" style="max-width: 800px">
            <ul class="mp-0 search">
                @include('ajax.searchResult')
            </ul>
        </div>
    </div>
@endsection
