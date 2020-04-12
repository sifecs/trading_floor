@foreach($products as $product)
    <li class="my-3 highlight p-1" id="{{$product->id}}">
        <a class="row "  href="{{route('product.show',  $product->id )}}" style="position: relative; color: black ">
            <div class="col-sm-3 col-md-2">
                <img class="mine-img" src="{{$product->getImages()[0]}}">
            </div>
            <div class="col-sm-8 mx-2" style="max-width: 600px;">
                <div class="row h-100 pl-md-4 pl-sm-0 px-2">
                    <div class="text-uppercasecol-12" style="font-size: 16px; font-weight: 600;">{{$product->title}} </div>
                    <div class="col-12 mp-0 mb-2 text-muted align-self-end">{{$product->getPrice($product->price, $product->percent).'.руб'}}</div>
                </div>
            </div>
        </a>
        <div class="my-2">
            <span class="btn-styles px-2 text-uppercase my-2">Сделать VIP</span>
            <span class="btn-styles px-2 text-uppercase my-2" >Выделить</span>
{{--            <span class="btn-styles px-2 text-uppercase my-2" data="{{$product->id}}" id="redact-product-btn">Редактировать</span>--}}
            <span class="btn-styles px-2 text-uppercase my-2 delete-product" >Удалить товар</span>
        </div>
    </li>
@endforeach
{{--<div id="profile-products-paginate"> {{$products->links()}} </div>--}}
