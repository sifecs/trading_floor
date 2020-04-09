@extends('layout')

@section('content')

<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <h3 class="text-uppercase my-4">Регистрация</h3>
                <form action="/register" class="" role="form" method="post">
                    @include('admin.errors')
                       {{csrf_field()}}

                    <div class="form-group">
                        <label for="name">Ваше имя </label>
                        <input type="text" name="name" class="form-control" id="name"  placeholder="Ваше имя ">
                    </div>

                    <div class="form-group">
                        <label for="email">Ваш email аддресс </label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Ваш email аддресс ">
                    </div>

                    <div class="form-group">
                        <label for="Password">Ваше пароль </label>
                        <input type="password" name="password" class="form-control" id="Password" placeholder="Ваше пароль">
                    </div>

                    <button type="submit" class="btn btn-primary my-1">Зарегестрироваться</button>
                    <div class="mb-3 my-2"><a class="text-muted" href="{{route('login')}}">Уже есть аккаунт?</a> </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
