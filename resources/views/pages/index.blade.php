@extends('layout')

@section('content')

   <div class="container">
       <div class="text-center py-3 text-uppercase">Рубрики</div>
       <div class="">
               @foreach($categories as $category)
                   @if ($category-> isRoot())
                        <div class="text-uppercase ">
                            <i class="mx-3 pb-4 fa fa-shopping-bag fa-3x"></i>
                            <a data-toggle="collapse" href="#{{$category->title}}"> {{$category->title}}</a>
                        </div>
                        <ul class="collapse ml-5" id="{{$category->title}}">
                           @foreach($category->getSubcategory($category->id) as $subcategory)
                                <li class="my-3"><a class="" style="color: black" href="{{route('category.list', $subcategory->id)}}">{{ $subcategory-> title}} </a> </li>
                           @endforeach
                        </ul>
                   @endif
               @endforeach

       </div>
   </div>
@endsection
