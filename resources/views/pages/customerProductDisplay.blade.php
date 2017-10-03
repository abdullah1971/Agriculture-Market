@extends('layouts.customerLayout')


@section('side_nav')

	<li><a href="{{ route('customer.productShow', ['catagory' => "all"]) }}">{{ "All" }} </a></li> 
	
	@foreach ($distinctCatagory as $catagory)
		

		<li><a href="{{ route('customer.productShow', ['catagory' => $catagory["product_catagory"]]) }}">{{ $catagory["product_catagory"] }} </a></li>


	@endforeach

@endsection

@section('page_type')

	@if ($catagoryStatus == "all")
		All Catagory
	@else 
		{{ $catagoryName }}
	@endif

@endsection

@section('page_content')

	<div class="row" style="margin-top: 80px;">
	  <div class="col-sm-offset-8 col-sm-4">
	    
	  <form method="post" action="{{ route('customer.search') }}">

	  {{ csrf_field() }}

	    <div id="custom-search-input">
	        <div class="input-group col-md-12">
	            <input type="text" class="form-control input-lg" placeholder="Search Product" name="search_text" />
	            <span class="input-group-btn">
	                <button class="btn btn-info btn-lg" type="submit">
	                    <i class="fa fa-search" aria-hidden="true"></i>
	                </button>
	            </span>
	        </div>
	    </div>

	  </form>

	  </div>
	</div>

	@if ($catagoryStatus == "all")
		@for ($i = 0; $i < $catagoryNumber; $i++)
		  
		   {{-- $catagory = $distinctCatagory[$i]["product_catagory"] ; --}}

		   <h3 class="catagoryName" style="padding-top: 57px;">{{ $distinctCatagory[$i]["product_catagory"] }}</h3>
		   <hr class="catagorySeparator">

		   <div class="row">
		     

		   

		     @foreach ($acceptedRequestData as $data)
		       
		        @if ($data->product_catagory == $distinctCatagory[$i]["product_catagory"])
		          

		          <div class="col-sm-4 thumbnail" style="height: 850px;">
		            
		            <img src="{{ asset($data->product_image) }}" style="width: 325px; height: 300px;padding: 10px 0 10px 25px;">

		            <h4 style="display: inline-block;padding-left: 60px;">Catagory : </h4> <strong>{{ $data->product_catagory }}</strong> <br>


		            <h4 style="display: inline-block;padding-left: 60px;">Name : </h4> <strong>{{ $data->product_name }}</strong> <br>


		            <h4 style="display: inline-block;padding-left: 60px;">Unit : </h4> <strong>{{ $data->unit }}</strong> <br>


		            {{-- <h4 style="display: inline-block;padding-left: 60px;">Quantity : </h4> <strong>{{ $data->product_quantity }}</strong> <br> --}}


		             <h4 style="display: inline-block;padding-left: 60px;">Price Per Unit: </h4> <strong>{{ $data->product_price }}</strong>  <br>


		            <h5 style="padding-left: 5px;">Availablity</h5>

		            <h4 style="display: inline-block;padding-left: 60px;">From : </h4> <strong>{{ $data->product_available_from }}</strong> <br>


		            <h4 style="display: inline-block;padding-left: 60px;">To : </h4> <strong>{{ $data->product_available_to }}</strong> <br>

		            

		            <h5 style="padding-left: 5px;">Location</h5>

		            <h4 style="display: inline-block;padding-left: 60px;">Division : </h4> <strong>{{ $farmarData[$data->user_id]->division }}</strong> <br>

		            <h4 style="display: inline-block;padding-left: 60px;">District : </h4> <strong>{{ $farmarData[$data->user_id]->district }}</strong> <br>

		            <h4 style="display: inline-block;padding-left: 60px;">Thana : </h4> <strong>{{ $farmarData[$data->user_id]->thana }}</strong> <br>

		            <h4 style="display: inline-block;padding-left: 60px;">Village : </h4> <strong>{{ $farmarData[$data->user_id]->village }}</strong> <br>

		            {{-- <h4 style="display: inline-block;padding-left: 60px;">To : </h4> <strong>{{ $data->product_available_to }}</strong> <br> --}}


		            <form method="POST" action="{{ route('customer.addToCart') }}">
			            
			            {{ csrf_field() }}


		            	<input type="hidden" name="product_id" id="product_id" value="{{ $data->id }}">

		            	<input type="hidden" name="product_related_user_id" id="product_related_user_id" value="{{ $data->user_id }}">


		            	<button type="submit" class="btn btn-info pull-right">Add To Cart</button>

			            
			        </form>

		          </div>
		          
		        @endif


		     @endforeach

		   </div>

		  {{-- {{ $distinctCatagory }} --}}

		@endfor
	@else 
		
		  
		 
			<div  style="padding-top: 57px;></div>
		   

		   <div class="row">
		     

		   

		     @foreach ($singleCatagoryData as $data)
		       
		        
		          

		          <div class="col-sm-4 thumbnail" style="height: 850px;">
		            
		            <img src="{{ asset($data->product_image) }}" style="width: 325px; height: 300px;padding: 10px 0 10px 25px;">

		            <h4 style="display: inline-block;padding-left: 60px;">Catagory : </h4> <strong>{{ $data->product_catagory }}</strong> <br>


		            <h4 style="display: inline-block;padding-left: 60px;">Name : </h4> <strong>{{ $data->product_name }}</strong> <br>


		            <h4 style="display: inline-block;padding-left: 60px;">Unit : </h4> <strong>{{ $data->unit }}</strong> <br>


		            {{-- <h4 style="display: inline-block;padding-left: 60px;">Quantity : </h4> <strong>{{ $data->product_quantity }}</strong> <br> --}}


		             <h4 style="display: inline-block;padding-left: 60px;">Price Per Unit: </h4> <strong>{{ $data->product_price }}</strong>  <br>


		            <h5 style="padding-left: 5px;">Availablity</h5>

		            <h4 style="display: inline-block;padding-left: 60px;">From : </h4> <strong>{{ $data->product_available_from }}</strong> <br>


		            <h4 style="display: inline-block;padding-left: 60px;">To : </h4> <strong>{{ $data->product_available_to }}</strong> <br>


		            <h5 style="padding-left: 5px;">Location</h5>

		            <h4 style="display: inline-block;padding-left: 60px;">Division : </h4> <strong>{{ $farmarData[$data->user_id]->division }}</strong> <br>

		            <h4 style="display: inline-block;padding-left: 60px;">District : </h4> <strong>{{ $farmarData[$data->user_id]->district }}</strong> <br>

		            <h4 style="display: inline-block;padding-left: 60px;">Thana : </h4> <strong>{{ $farmarData[$data->user_id]->thana }}</strong> <br>

		            <h4 style="display: inline-block;padding-left: 60px;">Village : </h4> <strong>{{ $farmarData[$data->user_id]->village }}</strong> <br>



		            {{-- <a href=""><button type="submit" class="btn btn-info pull-right">Add To Cart</button></a> --}}

		            <form method="post" action="{{ route('customer.addToCart') }}">

		            	{{ csrf_field() }}
			            
		            	<input type="hidden" name="product_id" id="product_id" value="{{ $data->id }}">

		            	<input type="hidden" name="product_related_user_id" id="product_related_user_id" value="{{ $data->user_id }}">

		            	
		            	<button type="submit" class="btn btn-info pull-right">Add To Cart</button>

			            
			        </form>

		          </div>
		          
		       


		     @endforeach

		   </div>

		  	
	@endif


	


@endsection

