<?php

namespace App\Http\Controllers;

use App\AcceptedProductRequest;
use App\FarmerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FarmerController extends Controller
{
    public function myProduct()
    {

    	$userId = Auth::user()->id;

    	// return $userId;

    	$farmaracceptedRequestInstance = new AcceptedProductRequest;

    	$pendingRequestData = $farmaracceptedRequestInstance::where('user_id', $userId)->get();

    	// return $pendingRequest;

    	$distinctCatagory = $farmaracceptedRequestInstance::select('product_catagory')->where('user_id', $userId)->distinct()->get();

    	$catagoryNumber = count($distinctCatagory);

    	// return $catagoryNumber;

    	// return $distinctCatagory;

    	return view('pages.farmerMyProduct', compact(['pendingRequestData', 'catagoryNumber', 'distinctCatagory']));

    	// return view('pages.farmerMyProduct');
    }


    public function newRequest()
    {
    	return view('pages.farmerAddNewRequest');
    }


    public function storeRequest(Request $request)
    {
    	
    	$this->validate($request, [
        	'product_catagory' => 'required',
        	'product_name' => 'required',
        	'unit' => 'required',
        	'product_quantity' => 'required|digits_between:0,1000000000000',
        	'product_quantity' => 'required',
        	'product_image' => 'required|image',
        	'product_available_from' => 'required',
        	'product_available_to' => 'required',
        	
        	
    	]);

    	// return $request->all();

    	if ($request->file('product_image')->isValid()) {
    	    
    		$filename = $request->file('product_image')->getClientOriginalName();



    	    $path = $request->product_image->storeAs('public/images', $filename);

    	    // echo $filename;

    	    $filePath = 'storage/images/'.$filename;

    	    // echo '<img src="'.$filePath.'">';
    	}

    	$farmerRequestInstance = new FarmerRequest;

    	$farmerRequestInstance->user_id = Auth::user()->id;
    	$farmerRequestInstance->product_catagory = $request->product_catagory;
    	$farmerRequestInstance->product_name = $request->product_name;
    	$farmerRequestInstance->unit = $request->unit;
    	$farmerRequestInstance->product_quantity = $request->product_quantity;
    	$farmerRequestInstance->product_price = $request->product_price;
    	$farmerRequestInstance->product_image = $filePath;
    	$farmerRequestInstance->product_available_from = $request->product_available_from;
    	$farmerRequestInstance->product_available_to = $request->product_available_to;

    	$farmerRequestInstance->save();

        return redirect()->route('farmer.myProduct');
    }


    public function pendingRequest()
    {    	
    	$userId = Auth::user()->id;

    	// return $userId;

    	$farmerRequestInstance = new FarmerRequest;

    	$pendingRequestData = $farmerRequestInstance::where('user_id', $userId)->get();

    	// return $pendingRequest;

    	$distinctCatagory = $farmerRequestInstance::select('product_catagory')->where('user_id', $userId)->distinct()->get();

    	$catagoryNumber = count($distinctCatagory);

    	// return $catagoryNumber;

    	// return $distinctCatagory;

    	return view('pages.farmerPendingRequest', compact(['pendingRequestData', 'catagoryNumber', 'distinctCatagory']));
    }



    public function updateProduct($id)
    {
        

        $product_data = AcceptedProductRequest::find($id);

        return view('pages.farmerEditProduct', compact('product_data', 'id'));

    }





    public function updateProductRequest(Request $request)
    {

        // return $request->all();
        

            $this->validate($request, [
                'product_catagory' => 'required',
                'product_name' => 'required',
                'unit' => 'required',
                'product_quantity' => 'required|digits_between:0,1000000000000',
                'product_quantity' => 'required',
                'product_image' => 'required|image',
                'product_available_from' => 'required',
                'product_available_to' => 'required',
                
                
            ]);

            // return $request->all();

            if ($request->file('product_image')->isValid()) {
                
                $filename = $request->file('product_image')->getClientOriginalName();



                $path = $request->product_image->storeAs('public/images', $filename);

                // echo $filename;

                $filePath = 'storage/images/'.$filename;

                // echo '<img src="'.$filePath.'">';
            }

            $farmerRequestInstance = new FarmerRequest;

            $farmerRequestInstance->user_id = Auth::user()->id;
            $farmerRequestInstance->product_catagory = $request->product_catagory;
            $farmerRequestInstance->product_name = $request->product_name;
            $farmerRequestInstance->unit = $request->unit;
            $farmerRequestInstance->product_quantity = $request->product_quantity;
            $farmerRequestInstance->product_price = $request->product_price;
            $farmerRequestInstance->product_image = $filePath;
            $farmerRequestInstance->product_available_from = $request->product_available_from;
            $farmerRequestInstance->product_available_to = $request->product_available_to;

            $farmerRequestInstance->save();


            $acceptedProduct = AcceptedProductRequest::find($request->updataProductId);
            $acceptedProduct->delete();



            return redirect()->route('farmer.myProduct');
    }



    public function deleteProduct($id)
    {
        // return $id;
        $acceptedProductRequestInstance = AcceptedProductRequest::find($id);

        $acceptedProductRequestInstance->delete();

        return redirect()->route('farmer.myProduct');
    }
}
