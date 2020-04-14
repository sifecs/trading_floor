@extends('layout')

@section('content')

   <div class="container">
       <div class="text-center py-3 text-uppercase">Рубрики</div>
       <div class="">
               @foreach($categories as $category)

                   @if ($category-> isRoot())
                        <div class="text-uppercase my-2">
                            <img src="/{{$category->getImage()}}"  style="width: 65px; height:55px; object-fit: cover;">
                            <a data-toggle="collapse" href="#d_{{$category->id}}"> {{$category->title}}</a>
                        </div>
                        <ul class="collapse ml-5" id="d_{{$category->id}}">
                           @foreach($category->getSubcategory($category->id) as $subcategory)
                                <li class="my-3"><a class="" style="color: black" href="{{route('category.list', $subcategory->id)}}">{{ $subcategory-> title}} </a> </li>
                           @endforeach
                        </ul>
                   @endif
               @endforeach

       </div>
   </div>
@endsection

{{--@endsection  <div class="text-uppercase ">--}}
{{--    <img src="https://avatars.mds.yandex.net/get-pdb/2856205/6375d61f-bc2a-43d2-9de1-458f1c01479f/s1200"--}}
{{--         class="" style="width: 55px; height:55px; object-fit: cover;">--}}
{{--    <a data-toggle="collapse" href="#{{$category->title}}"> {{$category->title}}</a>--}}
{{--</div>--}}
{{--<ul class="collapse ml-5" id="{{$category->title}}">--}}
{{--    @foreach($category->getSubcategory($category->id) as $subcategory)--}}
{{--        <li class="my-3"><a class="" style="color: black" href="{{route('category.list', $subcategory->id)}}">{{ $subcategory-> title}} </a> </li>--}}
{{--    @endforeach--}}
{{--</ul>--}}

