@foreach($shopReservation as $Reservation)
    <li class="" id="cancellation-reservation_{{$Reservation->id}}">
        <a href="{{route('product.show',  $Reservation->id )}}" class="row mp-0" style="color: black">
            <div class="col-sm-3 col-md-2 mp-0">
                <img class="mine-img" src="{{$Reservation->getImages()[0] }}">
            </div>

            <div class="col-sm-8 mx-2" style="max-width: 600px;">
                <div class="row h-100 pl-md-4 pl-sm-0 px-2">
                    <div class="text-uppercasecol-12" style="font-size: 16px; font-weight: 600;">{{$Reservation->title }}</div>
                    <div class="col-12 mp-0 mb-2 text-muted align-self-end">{{$Reservation->getPrice($Reservation->price, $Reservation->discounts).'.руб' }}</div>
                </div>
            </div>
        </a>

        <div class="my-2 row justify-content-between mp-0">
            <span class="btn-styles px-2 text-uppercase my-2">Подтвердить бронь</span>
            <span class="btn-styles px-2 text-uppercase my-2 cancellation-reservation" data="{{$Reservation->id}}-{{$Reservation->reservation()->first()->id}}">Отменить бронь</span>
        </div>

        <div>
            <div class="text-uppercase text-center my-4" style="font-size: 20px;">Информация о покупателе</div>
{{-- $Reservation->getReservationUser($Reservation->pivot->user_id)->getfullname() Реализация просто ужасная знаю но я просидел часов 8 не чего лучше не придумал   --}}
            <div class="text-muted "> {{$Reservation->getReservationUser($Reservation->pivot->user_id)->getfullname()}} </div>
            <div class="text-muted mb-2"> {{$Reservation->getReservationUser($Reservation->pivot->user_id)->phone}} </div>
        </div>
    </li>
@endforeach
<div class="mt-3">{{$shopReservation->links()}} </div>
