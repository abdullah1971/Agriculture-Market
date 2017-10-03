<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class FarmerRequest extends Model
{
    public function getFarmer()
    {
    	return $this->belongsTo(User::class, 'id');
    }
}
