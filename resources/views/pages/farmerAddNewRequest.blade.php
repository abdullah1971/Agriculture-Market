@extends('layouts.farmerLayout')

@section('side_nav')
	
	<li><a href="{{ route('farmer.myProduct') }}"><i class="fa fa-product-hunt"></i> My Product </a></li>
  {{-- <li><a href="index.html"><i class="fa fa-check"></i> Accepted Request </a></li> --}}
  <li><a href="{{ route('farmer.pendingRequest') }}"><i class="fa fa-clock-o"></i> Pending Request </a></li>
  <li><a href="{{ route('farmer.newRequest') }}"><i class="fa fa-plus"></i> Add New Request </a></li>
  {{-- <li><a href="index.html"><i class="fa fa-home"></i> </a></li> --}}

@endsection

@section('page_type')

	Add New Request

@endsection

@section('page_content')

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>New Request</small></h2>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{ route('farmer.storeRequest') }}" enctype="multipart/form-data">

              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('product_catagory') ? ' has-error' : '' }}">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_catagory">Product Catagory <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  {{-- <input type="text" id="product_catagory" required="required" class="form-control col-md-7 col-xs-12"> --}}

                  <select  id="product_catagory" required="required" class="form-control col-md-7 col-xs-12" name="product_catagory">
                    <option value="Vegetables">Vegetables</option>
                    <option value="Fruits">Fruits</option>
                    <option value="Cereals">Cereals</option>
                    <option value="Spices">Spices</option>
                    <option value="Flowers">Flowers</option>
                    <option value="Poultry">Poultry</option>
                    <option value="Cattle">Cattle&amp;sheep</option>
                    <option value="Fishery">Fishery</option>
                    <option value="Manure">Manure</option>
                    <option value="Implements">Agri Implements</option>
                    <option value="Seeds">Seeds</option>
                    <option value="Irrigation">Irrigation</option>
                    <option value="Fertilizers">Fertilizers</option>
                    <option value="Organics">Organics</option>
                    <option value="Nursery">Nursery Plantation</option>
                    <option value="Coffee">Coffee&amp;Tea</option>
                    <option value="Wood">Wood&amp;Timber</option>
                    <option value="Solar">Solar Products</option>
                    <option value="Ayurvedic">Ayurvedic Plants</option>
                    <option value="Cotton">Cotton</option>
                    <option value="Estate">Agri Real Estate</option>
                  </select>

                  @if ($errors->has('product_catagory'))
                      <span class="help-block">
                          <strong>{{ $errors->first('product_catagory') }}</strong>
                      </span>
                  @endif
                </div>
              </div>


              <div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_name">Product Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="product_name" name="product_name" required="required" class="form-control col-md-7 col-xs-12" list="suggestions">

                  {{-- <select id="product_name" name="last-name" required="required" class="form-control col-md-7 col-xs-12"  onchange="javascript:setTimeout(&#39;__doPostBack(\&#39;product_name\&#39;,\&#39;\&#39;)&#39;, 0)"> --}}
                  	
                  	{{-- <option selected="selected" value="">Select Category</option> --}}

                  <datalist id="suggestions">

                  	<option value="Vegetables">
                  	<option value="Fruits">
                  	<option value="Cereals">
                  	<option value="Spices">
                  	<option value="Flowers">
                  	<option value="Poultry">
                  	<option value="Cattle&amp;sheep">
                  	<option value="Fishery">
                  	<option value="Manure">
                  	<option value="Agri Implements">
                  	<option value="Seeds">
                  	<option value="Irrigation">
                  	<option value="Fertilizers">
                  	<option value="Organics">
                  	<option value="Nursery Plantation">
                  	<option value="Coffee&amp;Tea">
                  	<option value="Wood&amp;Timber">
                  	<option value="Solar Products">
                  	<option value="Ayurvedic Plants">
                  	<option value="Cotton">
                  	<option value="Agri Real Estate">

                  {{-- </select> --}}
                  </datalist>

                  @if ($errors->has('product_name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('product_name') }}</strong>
                      </span>
                  @endif
                </div>
              </div>


              <div class="form-group{{ $errors->has('unit') ? ' has-error' : '' }}">
                <label for="unit" class="control-label col-md-3 col-sm-3 col-xs-12">Unit</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  {{-- <input id="unit" class="form-control col-md-7 col-xs-12" type="text" name="middle-name"> --}}

                  <select id="unit" name="unit" class="form-control col-md-7 col-xs-12>
                  	
                  		<option value="Pieces">Pieces</option>
                  		<option value="Acres">Acres</option>
                  		<option value="Tons">Tons</option>
                  		<option value="Units">Units</option>
                  		<option value="Kilogram">Kilogram</option>
                  		<option value="Sets">Sets</option>
                  		<option value="Meter">Meter</option>
                  		<option value="Boxes">Boxes</option>
                  		<option value="Metric Tons">Metric Tons</option>
                  		<option value="Square Feet">Square Feet</option>
                  		<option value="Pairs">Pairs</option>
                  		<option value="Bags">Bags</option>
                  		<option value="Rolls">Rolls</option>
                  		<option value="Bottles">Bottles</option>
                  		<option value="Litres">Litres</option>
                  		<option value="Packets">Packets</option>
                  		<option value="Sheets">Sheets</option>
                  		<option value="Foot">Foot</option>
                  		<option value="Dozens">Dozens</option>
                  		<option value="Cartons">Cartons</option>
                  		<option value="Packs">Packs</option>
                  		<option value="Reams">Reams</option>
                  		<option value="Grams">Grams</option>
                  		<option value="Ounce">Ounce</option>
                  		<option value="Pound">Pound</option>
                  		<option value="20&#39; Container">20&#39; Container</option>
                  		<option value="40&#39; Container">40&#39; Container</option>
                  		<option value="Gallon">Gallon</option>
                  		<option value="Barrel">Barrel</option>
                  		<option value="Bushel">Bushel</option>
                  		<option value="Kilometer">Kilometer</option>
                  		<option value="Square Meters">Square Meters</option>
                  		<option value="Hectare">Hectare</option>
                  		<option value="Short Ton">Short Ton</option>
                  		<option value="Long Ton">Long Ton</option>
                  		<option value="Others">Others</option>


                  </select>
                  @if ($errors->has('unit'))
                      <span class="help-block">
                          <strong>{{ $errors->first('unit') }}</strong>
                      </span>
                  @endif
                </div>
              </div>


              <div class="form-group{{ $errors->has('product_quantity') ? ' has-error' : '' }}">
                <label for="product_quantity" class="control-label col-md-3 col-sm-3 col-xs-12">Product Quantity</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="product_quantity" class="form-control col-md-7 col-xs-12" type="text" name="product_quantity">

                  @if ($errors->has('product_quantity'))
                      <span class="help-block">
                          <strong>{{ $errors->first('product_quantity') }}</strong>
                      </span>
                  @endif
                </div>
              </div>


              <div class="form-group{{ $errors->has('product_price') ? ' has-error' : '' }}">
                <label for="product_price" class="control-label col-md-3 col-sm-3 col-xs-12">Price Per Unit</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="product_price" class="form-control col-md-7 col-xs-12" type="text" name="product_price">

                  @if ($errors->has('product_price'))
                      <span class="help-block">
                          <strong>{{ $errors->first('product_price') }}</strong>
                      </span>
                  @endif
                </div>
              </div>


              <div class="form-group{{ $errors->has('product_image') ? ' has-error' : '' }}">
                <label for="product_image" class="control-label col-md-3 col-sm-3 col-xs-12">Product Image</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="product_image" class="form-control col-md-7 col-xs-12" type="file" name="product_image">

                  @if ($errors->has('product_image'))
                      <span class="help-block">
                          <strong>{{ $errors->first('product_image') }}</strong>
                      </span>
                  @endif
                </div>
              </div>


              <div class="form-group{{ $errors->has('product_available_from') ? ' has-error' : '' }}">
                <label for="product_available_from" class="control-label col-md-3 col-sm-3 col-xs-12">Product Available:  <br>From</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="product_available_from" class="form-control col-md-7 col-xs-12" type="date" name="product_available_from">

                  @if ($errors->has('product_available_from'))
                      <span class="help-block">
                          <strong>{{ $errors->first('product_available_from') }}</strong>
                      </span>
                  @endif
                </div>
              </div>


              <div class="form-group{{ $errors->has('product_available_to') ? ' has-error' : '' }}">
                <label for="product_available_to" class="control-label col-md-3 col-sm-3 col-xs-12">To</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="product_available_to" class="form-control col-md-7 col-xs-12" type="date" name="product_available_to">

                  @if ($errors->has('product_available_to'))
                      <span class="help-block">
                          <strong>{{ $errors->first('product_available_to') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
              
              
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                  <button type="submit" class="btn btn-success pull-right">Submit</button>
				  <button class="btn btn-primary pull-right" type="reset">Reset</button>
                  {{-- <button class="btn btn-primary" type="button">Cancel</button> --}}
                </div>
              </div>

            </form>

            {{-- <img src="{{ asset('storage/images/orca-image-1502034000458.jpg_1502034000519.jpeg') }}"> --}}
          </div>
        </div>
      </div>
    </div>
@endsection

