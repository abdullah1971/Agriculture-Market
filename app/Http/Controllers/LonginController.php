<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LonginController extends Controller
{
    public function directUserProperPage(Request $request)
    {

    	

    	if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

    		$user = Auth::user()->user_type;

    		if($user == "farmer")
    			return redirect()->route('farmer.myProduct');
    		else if($user == "admin"){

    			return redirect()->route('admin.pendingRequest');
    		}

    		return redirect()->route('home');
    	}
    }
}
