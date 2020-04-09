@extends('layout')

@section('content')

<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <div class="my-4">
                    <h3 class="text-uppercase">Вход в личный кабинет</h3>

                    <form class="my-3" role="form" method="post" action="/login">
                        @include('admin.errors')
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="email">Ваш email аддресс </label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Ваш email аддресс " value="{{old('email')}}">
                        </div>

                        <div class="form-group">
                            <label for="Password">Ваше пароль </label>
                            <input type="password" name="password" class="form-control" id="Password" placeholder="Ваше пароль">
                        </div>

                        <button type="submit" class="btn btn-primary my-1">Войти в личный кабитне</button>
                        <div class=" my-2"><a class="text-muted" href="{{route('register')}}">Нет аккаунта? зарегистрируй!! </a> </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- end main content-->
@endsection
