@extends('layouts.farmerLayout')

@section('side_nav')
	
	
	<li><a href="{{ route('admin.pendingRequest') }}"><i class="fa fa-clock-o"></i> Pending Product Request </a></li>

	<li><a href="{{ route('admin.customer_request_pending') }}"><i class="fa fa-clock-o"></i> Pending Order Request </a></li>
	

@endsection

@section('page_type')

	Pending Order Request

@endsection

@section('page_content')

	{{-- {{ $pendingRequestData }} <br> --}}
	{{-- {{ $catagoryNumber }} <br> --}}
	{{-- {{ $distinctCatagory }} --}}

	@php
		$i = 1;
	@endphp

	<h3>Pending Customer Orders</h3>

	@foreach ($customerInfo as $singleCustomer)
		

	


		<div class="col-sm-4 thumbnail" style="height: auto; float: left;">
	            
	            {{-- {{ $singleCustomer->id }} --}}

	            <h4 style="display: inline-block;padding-left: 60px;">Name : </h4> <strong>{{ $singleCustomer->name }}</strong> <br>


	            <h4 style="display: inline-block;padding-left: 60px;">Division : </h4> <strong>{{ $singleCustomer->division }}</strong> <br>


	            <h4 style="display: inline-block;padding-left: 60px;">District : </h4> <strong>{{ $singleCustomer->district }}</strong> <br>

	            <h4 style="display: inline-block;padding-left: 60px;">Thana : </h4> <strong>{{ $singleCustomer->thana }}</strong> <br>


	            <h4 style="display: inline-block;padding-left: 60px;">Village : </h4> <strong>{{ $singleCustomer->village }}</strong> <br>


	             <h4 style="display: inline-block;padding-left: 60px;">Contact No : </h4> <strong>{{ $singleCustomer->contact_no }}</strong>  <br>


	            <h5 style="padding-left: 5px;">Products</h5>

	            	@php
	            		$j = 1;
	            	@endphp

	            @foreach ($customerOrderDetails as $singleOrder)


	            	{{-- {{ $i }} --}}

	            	@if ($i == $j)
	            		
		            	@foreach ($singleOrder as $element)
		            		
		            		@foreach ($element as $singleValue)
		            			
		            			@foreach ($singleValue as $key => $value)
		            				

					            	<h4 style="display: inline-block;padding-left: 60px;">Item Name : </h4> <strong>{{ $key }}</strong> <br>

					            	<h4 style="display: inline-block;padding-left: 60px;">Item Quantity : </h4> <strong>{{ $value }}</strong> <br>

		            			@endforeach

		            		@endforeach


		            	@endforeach

	            	@else

	            		
	            		@php
	            			$j++;
	            		@endphp

	            		@continue;

	            	@endif	
	            	

	            	{{-- {{ $singleOrder->products }} --}}

	            		

	            	{{-- {{ $singleOrder["products"] }} --}}



		            {{-- @break --}}
		            
	            	
	            @endforeach



	            <br>

	            

	            <button id="respondToRequest" type="submit" class="btn btn-info pull-right"  data-toggle="modal" data-target="#myModal"">Respond To Request

	            	<input type="hidden" id="id" name="id" value="{{ $singleCustomer->id }}">
	            	{{-- <input type="hidden" id="user_id" name="user_ider" value="{{ $data->user_id }}"> --}}

	            </button>

	            <a href="">
	            	
	            	<button class="btn btn-danger">
	            		Delete Request
	            	</button>

	            </a>

	          </div>

	    @php
	    	$i++;
	    @endphp

	@endforeach


	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    

		    <div class="modal-content">

		    <form method="post" action="{{ route('admin.customer_request_accept') }}">

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
		      		{{-- <input type="hidden" id="submit_user_id" name="user_id"> --}}
		      		
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
				// var user_id = $(this).find('#user_id').val();

				console.log(id);
				// console.log(user_id);

				$('#submit_id').val(id);
				// $('#submit_user_id').val(user_id);

				console.log($('#submit_id').val());
				// console.log($('#submit_user_id').val());
				

			});
		});

	</script>

@endsection

