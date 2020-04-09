@extends('layout')

@section('content')

<div class="wrapper my-4">
    <div class="container">
        <div class="">

            <div class="text-uppercase text-center" style="font-size: 20px;">Личный кибинет</div>

            @if($user->shop_id)
                <div class="">
                    <div class="text-uppercase text-center my-4" style="font-size: 20px;">Ваш магазин </div>

                    <div class="row justify-content-center"  >
                        <div  style="max-width: 700px; position: relative">

                            <img class="img-fluid" src="{{$user->shop->img}}">
                            <div class="upload_form p-2 row justify-content-between ">
                                <label class="">
                                    <input name="file" multiple type="file" class="main_input_file" />
                                    <div class="btn uplode-file">Загрузить фото</div>
                                    <input class="f_name" type="text" id="f_name" value="Файл не выбран." disabled />
                                </label>
                                <div class="btn delete-file" style="">Удалить фото</div>
                            </div>

                            <div class="">
                                Новопавловка бла бла бла2
                            </div>

                            <div class="">
                                <div> Описание  <span class="" id="description">{{$user->shop->description}}</span> </div>
                                <div class="my-3" data-toggle="modal" data-target="#redact-description"> <span class="btn-styles px-2">Редактировать описание</span></div>
                            </div>

                        </div>
                    </div>

                    <div class="" >

                    </div>

                </div>
            @else
                <div class="text-uppercase text-center my-4" style="font-size: 20px;">Создать магазин? </div>
            @endif




            <div class=""><a href="{{route('loguot')}}" class="text-danger">Выйти</a></div>

            </div>

    </div>
</div>




<div class="modal fade" id="redact-description" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ваш друг пролучит письмо со ссылкой на это объявление</h5>
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



@endsection
