@extends('layouts.customerLayout')

@section('side_nav')
	
	<li><a href="{{ route('customer.productShow', ['catagory' => "all"]) }}"><i class="fa fa-product-hunt"></i> All Product </a></li>
  

@endsection

@section('page_type')

	Contact With Admin

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

              


              


              


              <div class="form-group{{ $errors->has('message_email') ? ' has-error' : '' }}">
                <label for="message_email" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="message_email" class="form-control col-md-7 col-xs-12" type="text" name="message_email">

                  @if ($errors->has('message_email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('message_email') }}</strong>
                      </span>
                  @endif
                </div>
              </div>


              <div class="form-group{{ $errors->has('message_body') ? ' has-error' : '' }}">
                <label for="message_body" class="control-label col-md-3 col-sm-3 col-xs-12">Message</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  {{-- <input id="message_body" class="form-control col-md-7 col-xs-12" type="text" name="message_body"> --}}

                  <textarea id="message_body" class="form-control col-md-7 col-xs-12  name="message_body""></textarea>

                  @if ($errors->has('message_body'))
                      <span class="help-block">
                          <strong>{{ $errors->first('message_body') }}</strong>
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

    <div class="row" style="padding-top: 50px;">
      
      <div class="col-sm-6"></div>

      <div class="col-sm-3">

        <div style="border-radius: 50%;display: inline-block;">

          <i class="fa fa-mobile fa-3x" aria-hidden="true"></i>

        </div>

        <strong></strong><p>01765432876</p></strong>

      </div>


      

      <div class="col-sm-3">

        <div style="border-radius: 50%;display: inline-block;">

          <i class="fa fa-envelope-o fa-3x" aria-hidden="true"></i>

        </div>

        <strong></strong><p>tushar@gmail.com</p></strong>

      </div>

    </div>
@endsection

