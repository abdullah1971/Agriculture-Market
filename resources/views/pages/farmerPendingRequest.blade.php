@extends('layouts.farmerLayout')

@section('side_nav')
	
	<li><a href="{{ route('farmer.myProduct') }}"><i class="fa fa-product-hunt"></i> My Product </a></li>
  {{-- <li><a href="index.html"><i class="fa fa-check"></i> Accepted Request </a></li> --}}
  <li><a href="{{ route('farmer.pendingRequest') }}"><i class="fa fa-clock-o"></i> Pending Request </a></li>
  <li><a href="{{ route('farmer.newRequest') }}"><i class="fa fa-plus"></i> Add New Request </a></li>
  {{-- <li><a href="index.html"><i class="fa fa-home"></i> </a></li> --}}

@endsection

@section('page_type')

	Pending Request

@endsection

@section('page_content')

  @for ($i = 0; $i < $catagoryNumber; $i++)
    
     {{-- $catagory = $distinctCatagory[$i]["product_catagory"] ; --}}

     <h3 class="catagoryName">{{ $distinctCatagory[$i]["product_catagory"] }}</h3>
     <hr class="catagorySeparator">

     <div class="row">
       

     

       @foreach ($pendingRequestData as $data)
         
          @if ($data->product_catagory == $distinctCatagory[$i]["product_catagory"])
            

            <div class="col-sm-4 thumbnail" style="height: 690px;">
              
              <img src="{{ asset($data->product_image) }}" style="width: 325px; height: 300px;padding: 10px 0 10px 25px;">

              <h4 style="display: inline-block;padding-left: 60px;">Catagory : </h4> <strong>{{ $data->product_catagory }}</strong> <br>


              <h4 style="display: inline-block;padding-left: 60px;">Name : </h4> <strong>{{ $data->product_name }}</strong> <br>


              <h4 style="display: inline-block;padding-left: 60px;">Unit : </h4> <strong>{{ $data->unit }}</strong> <br>


              <h4 style="display: inline-block;padding-left: 60px;">Quantity : </h4> <strong>{{ $data->product_quantity }}</strong> <br>


               <h4 style="display: inline-block;padding-left: 60px;">Price Per Unit: </h4> <strong>{{ $data->product_price }}</strong>  <br>


              <h5 style="padding-left: 5px;">Availablity</h5>

              <h4 style="display: inline-block;padding-left: 60px;">From : </h4> <strong>{{ $data->product_available_from }}</strong> <br>


              <h4 style="display: inline-block;padding-left: 60px;">To : </h4> <strong>{{ $data->product_available_to }}</strong> <br>

              {{-- <a href=""><button type="submit" class="btn btn-info pull-right">Edit Product Info</button></a> --}}

            </div>
            
          @endif


       @endforeach

     </div>

    {{-- {{ $distinctCatagory }} --}}

  @endfor

@endsection

