@extends('layout')

@section('content')

<div class="wrapper my-4 px-2">
    <div class=" row justify-content-center mp-0">
        <div class="" style="max-width: 700px; position: relative">

            <div class="text-uppercase text-center" style="font-size: 20px;">Личный кибинет</div>
            @include('admin.errors')
            @if(session('status'))
                <div class="alert alert-success">{{session('status')}}</div>
            @endif
            @if($user->shop)
                <div class="">
                    <div class="text-uppercase text-center my-4" style="font-size: 20px;">Ваш магазин {{$user->shop->name}}</div>

                    <img class="img-fluid" name="" id="shop-img" src="uploads/{{$user->shop->getImage()}}">

                    <div class="upload_form row justify-content-between mp-0">
                        <form action="/updataImg" id="update-img" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <label class="">
                                <input name="img" id="updata-img" type="file" class="main_input_file" />
                                <div class="btn uplode-file" id="">Загрузить фото</div>
                                <input class="f_name" type="text" id="f_name" value="Файл не выбран." disabled />
                            </label>
                        </form>
                            <div class="btn delete-file" id="delete-img-file" style="">Удалить фото</div>
                        </div>

                    <div>{{$user->shop->address}} </div>
                    <div> Описание  <span class="" id="description">{{$user->shop->description}}</span> </div>
                    <div class="my-3"> <span class="btn-styles px-2 text-uppercase" data-toggle="modal" data-target="#redact-description">Редактировать Описание</span></div>

                    <div class="my-2"> <span class="btn-styles px-2 text-uppercase" data-toggle="modal" data-target="#redact-user-data">Выделить магазин</span></div>
                    <div class="my-2"> <span class="btn-styles px-2 text-uppercase" data-toggle="modal" data-target="#redact-user-data">Сделать vip</span></div>
                    <div class="my-2"> <span class="btn-styles px-2 text-uppercase" data-toggle="modal" data-target="#redact-user-data">Удалить магазин</span></div>

                </div>

            @endif

            <div>
                <div class="text-uppercase text-center my-4" style="font-size: 20px;">Личные данные</div>
                <div id="user-full-name"> {{$user->getfullname()}} </div>
                <div id="user-email"> {{$user->email}} </div>
                <div id="user-phone"> {{$user->phone}} </div>
                <div class="my-2"> <span class="btn-styles px-2 text-uppercase" data-toggle="modal" data-target="#redact-user-data">Редактировать личные данные</span></div>


                @if(!$user->shop)
                <div class="my-2"> <span class="btn-styles px-2 text-uppercase" data-toggle="modal" data-target="#add-shop">Создать магазин?</span></div>
                @endif

            </div>


            <div class=""><a href="{{route('loguot')}}" class="text-danger">Выйти</a></div>

         </div>

    </div>
</div>


<div class="modal fade" id="redact-user-data" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Редактирование личных данных</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="mp-0" id="errors">
                </ul>
                <form class="" id="redact-user-form">
                    <div class="form-group">
                        <input type="text" placeholder="Ваше фамилия" class="form-control" name="surname" value="{{$user->surname}}">
                    </div>

                    <div class="form-group">
                        <input type="text" placeholder="Ваше имя" class="form-control" name="name" value="{{$user->name}}">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Ваше отчество" name="patronymic" value="{{$user->patronymic}}" >
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Ваш телефон" name="phone" value="{{$user->phone}}" >
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Ваш email" name="email" value="{{$user->email}}" >
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Ваш password" name="password" value="" >
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button  class="btn btn-primary" id="save-user-data">Сохранить</button>
            </div>
        </div>
    </div>
</div>

@if($user->shop->id)
    <div class="modal fade" id="redact-description" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Редактирование описаниея</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div contenteditable="true" id="data-redact-description" class=""> {{$user->shop->description}}</div>
            </div>
            <div class="modal-footer">
                <button  class="btn btn-primary" id="save-redact-description">Сохранить</button>
            </div>
        </div>
    </div>
</div>
@else
    <div class="modal fade" id="add-shop" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Создание магазина</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="mp-0" id="errors-add-shop">  </ul>
                    <form name="test" class="" method="post" action="/addShop" id="add-shop-form" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="">
                                <input name="img" type="file" class="main_input_file" />
                                <div class="btn uplode-file">Загрузить фото</div>
                                <input class="f_name" type="text" id="f_name" value="Файл не выбран." disabled />
                            </label>
                        </div>

                        <div class="form-group">
                            <input type="text" placeholder="Название магазина" class="form-control" name="name" value="">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" placeholder="Описание" name="description" > </textarea>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Аддросс магазина" name="address" value="" >
                        </div>

                        <div class="modal-footer">
                            <button type="submit"  class="btn btn-primary" id="add-shop">Сохранить</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endif



@endsection
