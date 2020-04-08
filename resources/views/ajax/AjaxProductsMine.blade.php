@foreach($products as $product_mine)
<li class=" mb-3" style="position: relative">
    <a class="row" href="{{route('product.show',  $product_mine->id )}}">
        <div class="col-sm-4">
            <img class="img-fluid" src="  {{$product_mine->getImages()[1]}}" >
        </div>
        <div class="col-sm-8">
            <div class="mine-title text-uppercase"  style="color: black">{{$product_mine->title}}</div>
            <div class="text-muted">{{$product_mine->getPrice($product_mine->price, $product_mine->discounts).'.руб'}}</div>
        </div>
    </a>
    <a class="mine-star" >
        <i class="fa fa-star-o fa-2x" aria-hidden="true" style="position: absolute; left: 5px; top: 10px;  color: white;"></i>
    </a>
</li>
@endforeach
{{$products->links()}}
