@foreach($products as $product)
    <li class=" mb-3" id="favorite_id_{{$product->id}}" style="position: relative">
        <div class="row" >
            <a href="{{route('product.show',  $product->id )}}" class="col-sm-4">
                <img class="img-fluid" src="  {{$product->getImages()[0]}}" >
            </a>
            <div class="col-sm-8">
                <a href="{{route('product.show',  $product->id )}}">
                    <div class="mine-title text-uppercase"  style="color: black">{{$product->title}}</div>
                </a>
                <div class="text-muted mb-1">{{$product->getPrice($product->price, $product->discounts).'.руб'}}</div>
            </div>
        </div>
    </li>
@endforeach
{{$products->links()}}
