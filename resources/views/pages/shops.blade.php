@extends('layout')

@section('content')

    <div class="wrapper my-4">
        <div class="container">
            <div class="text-center text-uppercase" style="font-size: 20px;">Магизины</div>
            <ul class="mp-0">
                @foreach($shops as $shop)

                    <li class="my-3">
                        <a href="{{route('shop', $shop->id)}}" class="row {{$shop->privilege->class}}" style="text-decoration: none; color: black;">
                            <div class="col-sm-3 col-md-2 p-1">
                                <img class="mine-img" src="{{$shop->getImage()}}">
                            </div>
                            <div class="col-sm-9 col-md-10 my-md-0" >
                                <div class="text-uppercase " style="font-size: 16px; font-weight: 600;">{{$shop->name}} </div>
                                <div class="text-muted"> {{$shop->description}}</div>
                            </div>
                        </a>
                    </li>

                @endforeach
                {{$shops->links()}}
            </ul>

        </div>
    </div>

@endsection
