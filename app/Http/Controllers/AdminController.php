<?php

namespace App\Http\Controllers;

use App\AcceptedProductRequest;
use App\AdminPrivateKey;
use App\CustomerInfo;
use App\FarmerRequest;
use App\OrderDetails;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function pendingRequest()
    {
    	
    	$farmerRequestInstance = new FarmerRequest;

    	$pendingRequestData = $farmerRequestInstance::all();

    	// return $pendingRequestData;

    	$distinctCatagory = $farmerRequestInstance::select('product_catagory')->distinct()->get();

    	$catagoryNumber = count($distinctCatagory);



    	return view('pages.adminPendingRequest', compact(['pendingRequestData', 'catagoryNumber', 'distinctCatagory']));
    }


    public function acceptRequest(Request $request)
    {
    	
    	// return $request->all();

    	$adminPrivateKeyInstanse = new AdminPrivateKey;

    	$requestTableInstance = new FarmerRequest;

    	$acceptedTableInastance = new AcceptedProductRequest;



    	$privateKey = $adminPrivateKeyInstanse::find(1);

    	$privateKey = $privateKey["private_key"];

    	if($privateKey == $request->private_key){

    		$requestData = $requestTableInstance::find($request->id);

    		$tempRequestData = $requestData;

    		// return $tempRequestData;

    		$requestData->delete();

    		$acceptedTableInastance->user_id = $request->user_id;
    		$acceptedTableInastance->product_catagory = $tempRequestData["product_catagory"];
    		$acceptedTableInastance->product_name = $tempRequestData["product_name"];
    		$acceptedTableInastance->unit = $tempRequestData["unit"];
    		$acceptedTableInastance->product_quantity = $tempRequestData["product_quantity"];
    		$acceptedTableInastance->product_price = $tempRequestData["product_price"];
    		$acceptedTableInastance->product_image = $tempRequestData["product_image"];
    		$acceptedTableInastance->product_available_from = $tempRequestData["product_available_from"];
    		$acceptedTableInastance->product_available_to = $tempRequestData["product_available_to"];

    		$acceptedTableInastance->save();



    	}

    	return redirect()->route('admin.pendingRequest');
    }


    public function pendingCustomerOrder()
    {
        // OrderDetails
        $customerInfoInstance = new CustomerInfo;

        $customerInfo = $customerInfoInstance::where('order_status', 'pending')->get();

        // return $customerInfo;

        $customerOrderDetails = [];


        foreach ($customerInfo as $customerOrder) {
            
            $temp = $customerOrder->orderInfo;

            $productNameWithQuantity = [];

            foreach ($temp as $singleOrder) {
                
                

                $productInstance = AcceptedProductRequest::find($singleOrder->product_info_id);

                



                $tempProductName = $productInstance["product_name"];
                $tempProductQuantity = $singleOrder->product_quantity;

                $tempArray = array($tempProductName => $tempProductQuantity);


                array_push($productNameWithQuantity, $tempArray);



                
            }

            $customerOrderDetails[$customerOrder->id]["products"] = $productNameWithQuantity;
            
        }

        // return $customerOrderDetails;

        // foreach ($customerOrderDetails as $singleOrders) {
            

        //     // return $singleOrders;

        //     foreach ($singleOrders as $single => $value) {
                
        //         // return $value;

        //         foreach ($value as $val) {
                    
        //             // return $val;

        //             // return $val->first();

        //             foreach ($val as $key => $va) {
                        

        //                 return $va;
        //             }
        //         }
        //     }
        // }

        
        // return $customerInfo->orderInfo()->product_quantity;

        return view('pages.adminPendingOrderRequest', compact('customerInfo', 'customerOrderDetails'));



    }


    public function acceptCustomerRequest(Request $request)
    {
        
        // return $request->all();

        $customerInfoInstance = CustomerInfo::find($request->id);

        $customerInfoInstance->order_status = "accepted";

        $customerInfoInstance->save();

        return redirect()->route('admin.customer_request_pending');
    }
}
