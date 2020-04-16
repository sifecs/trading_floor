@extends('layout')

@section('content')

    <div class="wrapper my-4" style="overflow: hidden">
       <div class="container">
           @if(session('status'))
               <div class="alert alert-success">{{session('status')}}</div>
           @endif
           @include('admin.errors')
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
                       <div class="text-muted mp-0">
                           <p>
                               {!! nl2br(e($product->description))  !!}
                           </p>
                       </div>
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

                    @if( Auth::check() && !Auth::user()->checkDuplReservation($product->id) )
                   <div id="add-reservation-wrap" ><span data="{{$product->id}}" class="btn-styles px-2 text-uppercase hover add-reservation">Забронировать товар</span> </div>
                    @endif

                   <div class="my-4">
                       <div class="text-uppercase text-center mb-4" style="font-size: 20px;"> Информация о продавце </div>
                       <ul class="text-muted mp-0">
                           <li> {{$product->shop->address}} </li>
                           <li> {{$product->shop->user->getfullname()}} </li>
                           <li> {{$product->shop->user->phone}} </li>
                       </ul>
                       <div class="my-2"><span class="hover btn-styles px-2 text-uppercase" data-toggle="modal" data-target="#chat">Написать сообщение продавцу</span> </div>
                       <a href="{{route('shop', $product->shop_id)}}" class="my-2 hover"><span class="hover btn-styles px-2 text-uppercase">К магазину продавцу</span> </a>
                        @if( Auth::check() && !Auth::user()->checkDuplFavorites($product->id) )
                        <div class="my-2"><span class="hover btn-styles px-2 text-uppercase add-favorites {{$product->id}}" data="{{$product->id}}">Добавить в избранное</span> </div>
                        @endif
                       <div class="my-2"><span class="hover btn-styles px-2 text-uppercase" data-toggle="modal" data-target="#share">Поделиться</span> </div>
                       <div class="my-2"><span class="hover btn-styles px-2 text-uppercase"  data-toggle="modal" data-target="#comments">Коментарии</span> </div>
                   </div>

                   <div>
                       <ul class="mp-0 product-mine">
                           @include('ajax.AjaxProductsMine')
                       </ul>
                   </div>

               </div>
           </div>
       </div>
    </div>

    <!--Modal Chat -->
    <div class="modal fade" id="chat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Написать сообщение продвацу</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" action="/chat" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="product_id" value="{{$product->id}}">


<!--                        --><?php
//                        dd(boolval( Auth::user()->phone));
//                        ?>

                        @if(!boolval( Auth::user()->phone ?? false ) )
                        <div class="form-group">
                            <label class="col-form-label">Ваш телефон</label>
                            <input class="form-control" type="text" name="phone" value="{{Auth::user()->phone ?? ''}}">
                        </div>
                        @endif

                        <div class="form-group">
                            <label class="col-form-label">Текс</label>
                            <textarea type="text" name="text" class="form-control"> </textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary">Отправить</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal коментарии -->
    <div class="modal fade" id="comments" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Коментарии</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="coments" data = "{{$product->id}}">
                        @foreach($product->getComments() as $comment)
                            <li class="my-4">
                                <div class="my-2">{{$comment->date}}</div>
                                <div class="">{{$comment->text}}</div>
                            </li>
                        @endforeach
                            {{$product->getComments()->links()}}
                    </ul>
                    @if(Auth::check())
                    <div class="collapse" id="createComents">
                        <div class="card card-body">
                            <div class="error text-danger"></div>
                            <form class="coment-form" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <div class="form-group">
                                    <label class="col-form-label">Текст коментария:</label>
                                    <textarea id="text" type="text" name="text" class="form-control"> </textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="form-coments-ok form-control btn-success" id="add-coment">
                                </div>
                            </form>
                        </div>
                </div>
                    @endif
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    @if(Auth::check())
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#createComents" >Оставить коментарий</button>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal поделиться -->
    <div class="modal fade" id="share" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ваш друг пролучит письмо со ссылкой на это объявление</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" action="/share" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <div class="form-group">
                            <label class="col-form-label">Ваш email:</label>
                            <input type="text" name="email" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Имя друга:</label>
                            <input type="text" name="name_friend" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">email друга:</label>
                            <input type="text" name="email_friend" class="form-control" >
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary">Поделиться</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
