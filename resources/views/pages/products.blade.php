@extends('layout')

@section('content')

    <div class="wrapper my-4">
        <div class="container">
            <div class="row">
                @foreach($products as $product)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 my-3">
                    <div class="card">
                        <a  href="{{route('product.show',  $product->id )}}" class=" card-link">
                            <img class="card-img-top" src="{{$product->getImages()[0]}}">
                            <div class="card-body">
                                <h5 class="card-title" style="color: black">{{$product->title}}</h5>
                                <p class="card-text text-muted">цена  <span> {{$product->getPrice($product->price, $product->discounts).'.руб'}} </span> </p>
                            </div>
                        </a>
                        <div class="card-body">
                            <a href="#" class="card-link">Купить</a>
                            <a href="#" class="card-link">В избранное</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{$products->links()}}
        </div>
    </div>

@endsection
