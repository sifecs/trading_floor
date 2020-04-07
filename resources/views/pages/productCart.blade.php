@extends('layout')

@section('content')

    <div class="wrapper my-4" style="overflow: hidden">
       <div class="container">
           <div class="row">
               <div class="col-md-8" style="position: static">
                    <div class="text-uppercase my-2" style="width: 300px; margin: 0 auto; font-size: 20px;">
                       <span >{{$product->title}}</span>
                        <a class="" style="width: 90px; height: 50px; background-color: #e79523; position: absolute; z-index: 2; left: -15px; top: 10px;">
                            <i class="fa fa-star-o fa-2x" aria-hidden="true" style="position: absolute; right: 5px; top: 5px;  color: white;"></i>
                        </a>
                    </div>
                   <ul class="pgwSlider">
                       @foreach($product->getImages() as $img)
                           <li>
                               <img src="{{$img}}">
                           </li>
                       @endforeach
                   </ul>

                    <div class="">
                        <span class="text-uppercase px-2 btn-styles">Характеристики</span>
                    </div>

                   <div class="mt-3" >
                       <div class="text-uppercase text-center" style="font-size: 20px;"> Описание </div>
                       <ul class="text-muted mp-0">
                           <li>-Станционарная игровая приставка</li>
                           <li>-Беспроводной контроллер в комплекте</li>
                           <li>-Станционарная игровая приставка</li>
                           <li>-Беспроводной контроллер в комплекте</li>
                           <li>-Станционарная игровая приставка</li>
                           <li>-Беспроводной контроллер в комплекте</li>
                       </ul>
                   </div>

                   <div class="row my-4">
                       <div class="col-8 text-uppercase">
                           <div>Цена</div>
                           <div>Скидка</div>
                           <div>Итоговая Стоимость</div>
                       </div>
                       <div class="col-4">
                           <div>{{$product->price.'.руб'}}</div>
                           <div>{{$product->discounts.'%'}}</div>
                           <div>{{$product->getPrice($product->price, $product->discounts).'.руб'}}</div>
                       </div>
                   </div>

                   <div><span class="btn-styles px-2 text-uppercase">Забронировать товар</span> </div>

                   <div class="my-4">
                       <div class="text-uppercase text-center mb-4" style="font-size: 20px;"> Информация о продавце </div>
                       <ul class="text-muted mp-0">
                           <li> Внутренний рынок, Джунхай, Полход2, контейнер7</li>
                           <li> Иванов Иван Иванович</li>
                           <li>+7554556454563</li>
                       </ul>
                       <div class="my-2"><span class="btn-styles px-2 text-uppercase">Написать сообщение продавцу</span> </div>
                       <div class="my-2"><span class="btn-styles px-2 text-uppercase">К магазину продавцу</span> </div>
                       <div class="my-2"><span class="btn-styles px-2 text-uppercase">Добавить в избранное</span> </div>
                       <div class="my-2"><span class="btn-styles px-2 text-uppercase">Поделиться</span> </div>
                   </div>

                   <div>
                       <ul class="mp-0">
                           @foreach($products as $product)

                               <li class="row mb-3" style="position: relative">
                                   <div class="col-sm-4">
                                       <img class="img-fluid" src="  {{$product->getImages()[1]}}" >
                                   </div>
                                   <div class="col-sm-8">
                                       <div class="mine-title text-uppercase" >{{$product->title}}</div>
                                       <div class="">{{$product->getPrice($product->price, $product->discounts).'.руб'}}</div>
                                   </div>
                                   <a class="mine-star" >
                                       <i class="fa fa-star-o fa-2x" aria-hidden="true" style="position: absolute; left: 5px; top: 10px;  color: white;"></i>
                                   </a>
                               </li>
                           @endforeach
                       </ul>
                   </div>

               </div>
           </div>
       </div>
    </div>
@endsection
