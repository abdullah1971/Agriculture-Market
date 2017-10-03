<?php

namespace App\Http\Controllers;

use App\AcceptedProductRequest;
use App\Cart;
use App\CustomerInfo;
use App\OrderDetails;
use App\User;
use Illuminate\Http\Request;
use Session;
// use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function productShow($catagory)
    {
    	// return $catagory;

    	$acceptedRequestInstance = new AcceptedProductRequest;


    	$acceptedRequestData = $acceptedRequestInstance::all();

        // $farmarData = AcceptedProductRequest::with('getAcceptedProductFarmer')->get();

        $farmarData = [];

        foreach ($acceptedRequestData as $singleData) {
            
            // return $singleData->user_id;

            $temp = User::find($singleData->user_id);

            $farmarData[$singleData->user_id] = $temp;

            // return $farmarData[$singleData->user_id]["division"];
        }


    	

    	$distinctCatagory = $acceptedRequestInstance::select('product_catagory')->distinct()->get();

    	$catagoryNumber = count($distinctCatagory);

    	




    	if($catagory == "all"){

    		$catagoryStatus = "all";


	    	return view('pages.customerProductDisplay', compact(['acceptedRequestData', 'catagoryNumber', 'distinctCatagory', 'catagoryStatus', 'farmarData']));
    	}
    	else{

    		$catagoryStatus = "single";

    		$catagoryName = $catagory;

    		$singleCatagoryData = $acceptedRequestInstance::where('product_catagory', $catagory)->get();

    		// return $sin

    		return view('pages.customerProductDisplay', compact(['acceptedRequestData', 'catagoryNumber', 'distinctCatagory', 'singleCatagoryData', 'catagoryStatus', 'catagoryName', 'farmarData']));
    	}

    }



    public function addToCart(Request $request)    
    {
        // return $request->all();

        $id = $request->product_id;

        $product = AcceptedProductRequest::find($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));

        return redirect()->route('customer.productShow',['catagory' => "all"]);
    }


    public function myCart(Request $request)
    {

        // $request->session()->flush();
        // dd($request->session()->get('cart'));
        $cartData = $request->session()->get('cart');

        // $cartData = $cartData->toArray();

        if($cartData){

            $singleItem = $cartData->items;
        }
        else{

            $singleItem = null;
        }


        // $itemNumber = $singleItem["0"];

        // return $itemNumber;

        // return $singleItem[1];

        // foreach ($singleItem as $singleItemValue) {
            
        //     return $singleItemValue;
        // }

        // dd($cartData);

        // return $cartData->totalPrice;

        return view('pages.customerMyCart', compact('cartData', 'singleItem'));
    }




    public function sendMessage()
    {
        
        return view('pages.customerContactWithAdmin');
    }


    public function checkOut(Request $request)      
    {
        // return $request->all();

        $jsonData = json_decode($request->table_info, true);

        // return $jsonData;

        $request->session()->flush();

        $rowCount = count($jsonData);


        for ($i=0; $i < $rowCount; $i++) { 
            

            if($i == 0 || $i == $rowCount - 1)
                continue;

            
            $id = $jsonData[$i][1];

            for ($j=0; $j < $jsonData[$i][2]; $j++) { 
                

                $product = AcceptedProductRequest::find($id);

                $oldCart = Session::has('cart') ? Session::get('cart') : null;
                $cart = new Cart($oldCart);
                $cart->add($product, $product->id);

                $request->session()->put('cart', $cart);
                
            }


        }

        return redirect()->route('customer.confirmAddress');
    }




    public function confirmAddress()
    {
        
        return view('pages.customerAddress');
    }


    public function confirmOrder(Request $request)
    {
        

        // return $request->all();

        $this->validate($request, [
            
            'name' => 'required|string|max:255',
            'division' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'thana' => 'required|string|max:255',
            'village' => 'required|string|max:255',
            'contact_no' => 'required|digits:11',
            
            
        ]);


        $customerInfoInstance = new CustomerInfo;

        $customerInfoInstance->name = $request->name;
        $customerInfoInstance->division = $request->division;
        $customerInfoInstance->district = $request->district;
        $customerInfoInstance->thana = $request->thana;
        $customerInfoInstance->village = $request->village;
        $customerInfoInstance->contact_no = $request->contact_no;
        $customerInfoInstance->order_status = "pending";

        $customerInfoInstance->save();

        $customerId = $customerInfoInstance->id;


        $cart_data = Session::get('cart');

        // dd($cart_data);

        $singleItem = $cart_data->items;

        // dd($singleItem);

        foreach ($singleItem as $singleItemValue) {

            $orderInfoInstance = new OrderDetails;

            $orderInfoInstance->customer_info_id = $customerId;
            $orderInfoInstance->product_info_id = $singleItemValue["item"]["id"];
            $orderInfoInstance->product_quantity = $singleItemValue["quantity"];
            $orderInfoInstance->product_unit_price = $singleItemValue["item"]["product_price"];
            $orderInfoInstance->customer_time_stamp = $customerInfoInstance->created_at;


            $orderInfoInstance->save();
            
            // dd($singleItemValue["item"]["id"]);
        }

        $request->session()->flush();

        return redirect()->route('customer.orderSuccess');
    }


    public function orderSuccess()
    {
        
        return view('pages.customerThanksGiving');
    }


    public function searchProduct(Request $request)
    {
        
        // return $request->all();

        $search = $request->search_text;

        $searchResult = AcceptedProductRequest::where('product_catagory', 'LIKE', "%$search%")->orWhere('product_name', 'LIKE', "%$search%")->get();

        // Food::where('name', 'LIKE', "%$search%")->orWhere('category', 'LIKE', "%$search%")->get();

        // return $searchResult;



        $acceptedRequestInstance = new AcceptedProductRequest;


        $acceptedRequestData = $acceptedRequestInstance::all();

        // $farmarData = AcceptedProductRequest::with('getAcceptedProductFarmer')->get();

        $farmarData = [];

        foreach ($acceptedRequestData as $singleData) {
            
            // return $singleData->user_id;

            $temp = User::find($singleData->user_id);

            $farmarData[$singleData->user_id] = $temp;

            // return $farmarData[$singleData->user_id]["division"];
        }


        

        $distinctCatagory = $acceptedRequestInstance::select('product_catagory')->distinct()->get();

        $catagoryNumber = count($distinctCatagory);



        $catagoryStatus = "single";

            // $catagoryName = $catagory;

            // $singleCatagoryData = $acceptedRequestInstance::where('product_catagory', $catagory)->get();

            $singleCatagoryData = $searchResult;

            // return $sin

            return view('pages.customerSearchResult', compact(['acceptedRequestData', 'catagoryNumber', 'distinctCatagory', 'singleCatagoryData', 'catagoryStatus', 'farmarData']));
    }
}
