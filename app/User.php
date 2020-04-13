<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'patronymic', 'surname', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function favorites() {
        return $this->belongsToMany(
            Product::class,
            'favorites',
            'user_id',
            'product_id'
        );
    }

    public function shop()
    {
        return $this->hasOne(Shops::class);
    }

    public static function add ($fields) {
        $user = new static;
        $user->fill($fields);
        $user->save();

        return $user;
    }

    public  function edit ($fields) {
        $this->fill($fields);
        $this->save();
    }

    public function generatePassword ($password) {
        if ($password != null) {
            $this->password = bcrypt($password);
            $this->save();
        }
    }

     public function getfullname () {
       return $this->surname.' '. $this->name.' '.$this->patronymic;
     }

     public function checkDuplReservation ($productId) {
       return Reservation::where([
             ['user_id', '=', Auth::user()->id],
             ['product_id', '=', $productId]
         ])->exists();
     }

    public function checkDuplFavorites ($productId) {
        return Favorite::where([
            ['user_id', '=', Auth::user()->id],
            ['product_id', '=', $productId]
        ])->exists();
    }

}
