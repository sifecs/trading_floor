<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <!-- jQuery 1.8 or later, 33 KB -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Fotorama from CDNJS, 19 KB -->
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
    <link  href="/css/pgwslider.min.css" rel="stylesheet">
    <link  href="/css/main.css" rel="stylesheet">
    <title>Hello, world!</title>
</head>

<body>
<nav class=" navbar-dark bg-dark">
    <ul class=" navbar-nav nav nav-pills nav-fill d-flex flex-row">
        <li class="nav-item">
            <a class="nav-link active" href="#">
                <i class="fa fa-shopping-bag fa-3x"></i>
                <div>Товары</div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#">
                <i class="fa fa-cart-arrow-down fa-3x" aria-hidden="true"></i>
                <div>Магазины </div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#">
                <i class="fa fa-star-o fa-3x" aria-hidden="true"></i>
                <div>Избранное </div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa fa-user-circle-o fa-3x" aria-hidden="true"></i>
                <div>Мой кабинет </div>
            </a>
        </li>

    </ul>
    <form class="form-inline mt-3 pb-3 d-flex justify-content-center flex-nowrap">
        <input class=" w-75 form-control mr-sm-4" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success px-5" type="submit">Search</button>
    </form>
</nav>



@yield('content')

<footer class="footer">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-2 col-sm-4 text-uppercase pb-3 w-100"><a class="w-100 text-warning" href="#"> О компании </a></div>
            <div class="col-md-3 col-sm-4 text-uppercase pb-3 w-100"><a class="w-100 text-warning" href="#"> Правила продажи </a></div>
            <div class="col-md-2 col-sm-4 text-uppercase pb-3 w-100"><a class="w-100 text-warning" href="#"> Платные услуги </a></div>
            <div class="col-md-2 col-sm-4 text-uppercase pb-3 w-100"><a class="w-100 text-warning" href="#"> Помощь </a></div>
            <div class="col-md-2 col-sm-4 text-uppercase pb-3 w-100"><a class="w-100 text-warning" href="#"> Реклама на сайте </a></div>
        </div>
        <hr>
        <div class="text-center">Пользовательское соглашение Оферта</div>

        <div class="container text-center mt-5 mb-5">
            <div class="row text-center">
                <div class=" col-12 text-uppercase">Присоединяйтесь</div>
                <ul class=" col-12 d-flex flex-row justify-content-center mt-4">
                    <li> <a href="#" class="text-muted"><i class=" fa-2x pl-4 fa fa-facebook"></i></a> </li>
                    <li> <a href="#" class="text-muted"><i class=" fa-2x pl-4 fa fa-vk"></i></a> </li>
                    <li> <a href="#" class="text-muted"><i class=" fa-2x pl-4 fa fa-odnoklassniki"></i></a> </li>
                </ul>
            </div>
        </div>

        <div class="text-center">2016</div>
    </div>

</footer>



<style type="text/css">
    .footer{
        overflow:auto;
        white-space:nowrap;
    }
    .col-sm-2{
        display:inline-block;
    }
    li {
        list-style-type: none; /* Убираем маркеры */
    }
</style>

<script type="text/javascript" src="/js/pgwslider.min.js"></script>
<script>
    $('.pgwSlider').pgwSlider();
</script>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="https://use.fontawesome.com/06e2747a57.js"></script>


</body>
</body>
</html>
