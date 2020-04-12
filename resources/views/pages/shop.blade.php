@extends('layout')

@section('content')

    <div class="wrapper my-4">
        <div class="container">
            <div class="text-center text-uppercase" style="font-size: 20px;">{{$shop->name}}</div>
            <div class="text-uppercase my-4"  data-toggle="modal" data-target="#info-shop" style="font-size: 20px;"><span class="hover btn-styles px-2"> Информазия о магазине </span> </div>
            <ul class="mp-0">
                @foreach($products as $product)
                <li class="my-3">
                    <a href="{{route('product.show',  $product->id )}}" class="row highlight"  style="position: relative; color: black ">
                        <div class="col-sm-3 col-md-2 p-1">
                            <img class="mine-img" src="{{$product->getImages()[0]}}">
                        </div>
                        <div class="col-sm-9 my-md-0" style="max-width: 600px;">
                            <div class="text-uppercase " style="font-size: 16px; font-weight: 600;">{{$product->title}} </div>
                        </div>
                        <div class="text-muted mine-price ml-4">{{$product->getPrice($product->price, $product->percent).'.руб'}}</div>
                    </a>
                </li>
                @endforeach
                {{$products->links()}}
            </ul>

        </div>
    </div>


    <div class="modal fade" id="info-shop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Информация о магазине</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li><span class="font-weight-bold">Название:</span> {{$shop->name}}</li>
                        <li><span class="font-weight-bold">Аддресс:</span>  {{$shop->address}}</li>
                        <li><span class="font-weight-bold">Описанин:</span>  {{$shop->description}}</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>






{{--align-self-end coll    --}}
@endsection
