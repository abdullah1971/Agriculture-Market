@extends('layouts.customerLayout')

@section('additionalcss')

	

@endsection


@section('side_nav')

	<li><a href="{{ route('customer.productShow', ['catagory' => "all"]) }}">{{ "Product" }} </a></li>
	
	

@endsection

@section('page_type')

	Delivery Address

@endsection

@section('page_content')

	<div style="padding-top: 57px;"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Confirm Address</small></h2>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{ route('customer.confirmOrder') }}">

              {{ csrf_field() }}

              


              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <label for="name" class="col-md-4 control-label">Name</label>

                  <div class="col-md-6">
                      <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                      @if ($errors->has('name'))
                          <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              

              <div class="form-group{{ $errors->has('division') ? ' has-error' : '' }}">
                  <label for="division" class="col-md-4 control-label">Division</label>

                  <div class="col-md-6">
                      <input id="division" type="text" class="form-control" name="division" value="{{ old('division') }}" required autofocus>

                      @if ($errors->has('division'))
                          <span class="help-block">
                              <strong>{{ $errors->first('division') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
                  <label for="district" class="col-md-4 control-label">District</label>

                  <div class="col-md-6">
                      <input id="district" type="text" class="form-control" name="district" value="{{ old('district') }}" required autofocus>

                      @if ($errors->has('district'))
                          <span class="help-block">
                              <strong>{{ $errors->first('district') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group{{ $errors->has('thana') ? ' has-error' : '' }}">
                  <label for="thana" class="col-md-4 control-label">Thana / Upozila</label>

                  <div class="col-md-6">
                      <input id="thana" type="text" class="form-control" name="thana" value="{{ old('thana') }}" required autofocus>

                      @if ($errors->has('thana'))
                          <span class="help-block">
                              <strong>{{ $errors->first('thana') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group{{ $errors->has('village') ? ' has-error' : '' }}">
                  <label for="village" class="col-md-4 control-label">Village</label>

                  <div class="col-md-6">
                      <input id="village" type="text" class="form-control" name="village" value="{{ old('village') }}" required autofocus>

                      @if ($errors->has('village'))
                          <span class="help-block">
                              <strong>{{ $errors->first('village') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group{{ $errors->has('contact_no') ? ' has-error' : '' }}">
                  <label for="contact_no" class="col-md-4 control-label">Contact No.</label>

                  <div class="col-md-6">
                      <input id="contact_no" type="text" class="form-control" name="contact_no" value="{{ old('contact_no') }}" required autofocus>

                      @if ($errors->has('contact_no'))
                          <span class="help-block">
                              <strong>{{ $errors->first('contact_no') }}</strong>
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



@section('additionaljs')



@endsection

