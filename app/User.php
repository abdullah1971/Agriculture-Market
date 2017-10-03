<?php

namespace App;

use App\AcceptedProductRequest;
use App\FarmerRequest;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'division', 'district', 'thana', 'village', 'contact_no', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function productReqest()
    {
        return $this->hasMany(FarmerRequest::class , 'user_id', 'id');
    }

    public function acceptedProductRequest()
    {
        return $this->hasMany(AcceptedProductRequest::class , 'user_id', 'id');
    }
}
