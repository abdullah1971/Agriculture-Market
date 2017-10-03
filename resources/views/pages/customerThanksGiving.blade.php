@extends('layouts.customerLayout')

@section('additionalcss')

	

@endsection


@section('side_nav')

	<li><a href="{{ route('customer.productShow', ['catagory' => "all"]) }}">{{ "Product" }} </a></li>
	
	

@endsection

@section('page_type')

	Thank You

@endsection

@section('page_content')

	<div style="padding-top: 150px;"></div>

	<div class="alert alert-success" style="text-align: center;">
	  <strong>Success!</strong> Your order has been placed for approved.<br>
	  <strong>Thank you</strong> for using Agri-Market site.
	</div>

@endsection



@section('additionaljs')



@endsection

