@foreach($product->getComments() as $comment)
    <li class="my-4">
        <div class="my-2">{{$comment->date}}</div>
        <div class="">{{$comment->text}}</div>
    </li>
@endforeach
{{$product->getComments()->links()}}
