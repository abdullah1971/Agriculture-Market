<?php

namespace App;

use App\OrderDetails;
use Illuminate\Database\Eloquent\Model;

class CustomerInfo extends Model
{
    public function orderInfo()
    {
    	
    	return $this->hasMany(OrderDetails::class, 'customer_time_stamp', 'created_at');
    }
}
