<?php

namespace App;

use App\CustomerInfo;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    public function customerDetails()
    {
    	return $this->belongsTo(CustomerInfo::class, 'created_at');
    }
}
