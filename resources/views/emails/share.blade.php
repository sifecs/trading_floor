<h1>Здравствуйте {{$share['request']['name_friend']}} Вам порекоминдовали этот продукт</h1>
{{$share['product']->title}}
<div>Подробнее по ссылке <a href="http://hardproject/product/{{$share['product']->id}}"> {{$share['product']->title}} </a> </div>
<div>Рекоминдовал {{$share['request']['email']}}</div>
