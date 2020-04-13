@foreach($favorites as $favorite)
    <li class=" mb-3" id="favorite_id_{{$favorite->id}}" style="position: relative">
        <div class="row" >
            <a href="{{route('product.show',  $favorite->id )}}" class="col-sm-4">
                <img class="img-fluid" src="  {{$favorite->getImages()[0]}}" >
            </a>
            <div class="col-sm-8">
                <a href="{{route('product.show',  $favorite->id )}}">
                    <div class="mine-title text-uppercase"  style="color: black">{{$favorite->title}}</div>
                </a>
                <div class="text-muted mb-1">{{$favorite->getPrice($favorite->price, $favorite->discounts).'.руб'}}</div>

                <span class="btn-styles hover px-2 remove-favorite" data="{{$favorite->id}}">Удалить из изобранных</span>
            </div>
        </div>
    </li>
@endforeach
{{$favorites->links()}}
