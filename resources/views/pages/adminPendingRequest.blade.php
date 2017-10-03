@extends('layouts.farmerLayout')

@section('side_nav')
	
	
	<li><a href="{{ route('admin.pendingRequest') }}"><i class="fa fa-clock-o"></i> Pending Product Request </a></li>

	<li><a href="{{ route('admin.customer_request_pending') }}"><i class="fa fa-clock-o"></i> Pending Order Request </a></li>


	

@endsection

@section('page_type')

	Pending Product Request

@endsection

@section('page_content')

	{{-- {{ $pendingRequestData }} <br> --}}
	{{-- {{ $catagoryNumber }} <br> --}}
	{{-- {{ $distinctCatagory }} --}}

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


	            {{-- <h5 style="padding-left: 5px;">Location</h5>

	            <h4 style="display: inline-block;padding-left: 60px;">Division : </h4> <strong>{{ $data->getFarmer->division }}</strong> <br>


	            <h4 style="display: inline-block;padding-left: 60px;">District : </h4> <strong>{{ $data->getFarmer()->district }}</strong> <br>

	            <h4 style="display: inline-block;padding-left: 60px;">Thana : </h4> <strong>{{ $data->getFarmer()->thana }}</strong> <br>


	            <h4 style="display: inline-block;padding-left: 60px;">Village : </h4> <strong>{{ $data->getFarmer()->village }}</strong> <br>
 --}}
	            

	            <button id="respondToRequest" type="submit" class="btn btn-info pull-right"  data-toggle="modal" data-target="#myModal"">Respond To Request

	            	<input type="hidden" id="id" name="id" value="{{ $data->id }}">
	            	<input type="hidden" id="user_id" name="user_ider" value="{{ $data->user_id }}">

	            </button>

	          </div>
	          
	        @endif


	     @endforeach

	     {{-- <br><br><br> --}}

	   </div>

	  {{-- {{ $distinctCatagory }} --}}

	@endfor

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    

		    <div class="modal-content">

		    <form method="post" action="{{ route('admin.acceptRequest') }}">

		    	{{ csrf_field() }}


		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Use your private key to validate</h4>
		      </div>
		      <div class="modal-body">
		        <input type="password" name="private_key" class="form-control">
		      </div>
		      <div class="modal-footer">
		      	

		      		<input type="hidden" id="submit_id" name="id">
		      		<input type="hidden" id="submit_user_id" name="user_id">
		      		
		        	{{-- <a href="{{ route('admin.acceptRequest',['id' => ]) }}"> --}}
		        	<button type="submit" class="btn btn-info">Validate</button>
		        	{{-- </ a> --}}
		      		
		      	{{-- </form> --}}
		      </div>
		      </form>
		    </div>

		{{-- </form> --}}

	  </div>
	</div>

	
@endsection

@section('additionaljs')

	<script>
		
		$(document).ready(function() {
			

			// $('#respondToRequest').on('click', function() {
				
			// 	var id = $(this).find('#id').val();

			// 	console.log(id);
			// });

			$(document).on('click', '#respondToRequest', function(event) {
				
				var id = $(this).find('#id').val();
				var user_id = $(this).find('#user_id').val();

				console.log(id);
				console.log(user_id);

				$('#submit_id').val(id);
				$('#submit_user_id').val(user_id);

				console.log($('#submit_id').val());
				console.log($('#submit_user_id').val());
				

			});
		});

	</script>

@endsection

