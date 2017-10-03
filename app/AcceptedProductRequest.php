<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcceptedProductRequest extends Model
{
    public function getAcceptedProductFarmer()
    {
    	return $this->belongsTo(User::class, 'id');
    }
}
