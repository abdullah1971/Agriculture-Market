@extends('layouts.customerLayout')

@section('additionalcss')

	<style type="text/css">

		@import "https://fonts.googleapis.com/css?family=Montserrat:300,400,700";
		.rwd-table {
		  margin: 1em 0;
		  min-width: 300px;
		}
		.rwd-table tr {
		  border-top: 1px solid #ddd;
		  border-bottom: 1px solid #ddd;
		  
		}
		.rwd-table th {
		  display: none;
		}
		.rwd-table td {
		  display: block;

		}

		.rwd-table tr td {
		  text-align: center;

		}


		.rwd-table td:first-child {
		  padding-top: .5em;
		}
		.rwd-table td:last-child {
		  padding-bottom: .5em;
		}
		.rwd-table td:before {
		  content: attr(data-th) ": ";
		  font-weight: bold;
		  width: 6.5em;
		  display: inline-block;
		}
		@media (min-width: 480px) {
		  .rwd-table td:before {
		    display: none;
		  }
		}
		.rwd-table th, .rwd-table td {
		  text-align: left;
		}
		@media (min-width: 480px) {
		  .rwd-table th, .rwd-table td {
		    display: table-cell;
		    padding: .25em .5em;
		  }
		  .rwd-table th:first-child, .rwd-table td:first-child {
		    padding-left: 0;
		  }
		  .rwd-table th:last-child, .rwd-table td:last-child {
		    padding-right: 0;
		  }
		}

		/*body {
		  padding: 0 2em;
		  font-family: Montserrat, sans-serif;
		  -webkit-font-smoothing: antialiased;
		  text-rendering: optimizeLegibility;
		  color: #444;
		  background: #eee;
		}*/

		h1 {
		  font-weight: normal;
		  letter-spacing: -1px;
		  color: #34495E;
		}

		.rwd-table {
		  background: #34495E;
		  color: #fff;
		  border-radius: .4em;
		  overflow: hidden;
		}
		.rwd-table tr {
		  border-color: #46637f;
		}
		.rwd-table th, .rwd-table td {
		  margin: .5em 1em;
		}
		@media (min-width: 480px) {
		  .rwd-table th, .rwd-table td {
		    padding: 1em !important;
		  }
		}
		.rwd-table th, .rwd-table td:before {
		  color: #dd5;
		}

	</style>

@endsection


@section('side_nav')

	<li><a href="{{ route('customer.productShow', ['catagory' => "all"]) }}">{{ "Product" }} </a></li>
	
	

@endsection

@section('page_type')

	My Cart

@endsection

@section('page_content')

	<div class="myCartContent" style="padding-top: 60px;padding-left: 250px;">

		@php
			$i = 1
		@endphp

		<table id="cart_data_table" class="rwd-table">
		  <tr>
		    <th>Item No.</th>
		    <th>Item Name</th>
		    <th>Unit</th>
		    <th>Item Quantity</th>
		    <th>Price Per Unit</th>
		    <th>Item Total Price</th>
		  </tr>
		  @if ($singleItem)
			  @foreach ($singleItem as $singleItemValue)
				  <tr>
				    <td>{{ $i++ }}</td>
				    <td style="display: none;">{{ $singleItemValue["item"]["id"] }}</td>
				    <td id="temp_item_quantity_{{ $i }}" style="display: none;">{{ $singleItemValue["quantity"] }}</td>
				    <td>{{ $singleItemValue["item"]["product_name"] }}</td>
				    <td>{{ $singleItemValue["item"]["unit"] }}</td>
				    <td id="item_quantity"><input id="input_item_quantity" type="number" name="item_quantity" value="{{ $singleItemValue["quantity"] }}" min="0" max="{{ $singleItemValue["item"]["product_quantity"] }}" style="color: black;"><input id="hidden_input_item_unit_price" type="hidden" name="" value="{{ $singleItemValue["item"]["product_price"] }}"><input id="serial_num" type="hidden" value="{{ $i }}"><input id="previous_item_quantity" type="hidden" value="{{ $singleItemValue["quantity"] }}"><input id="initial_final_quantity" type="hidden" value="{{ $cartData->totalQuantity }}"></td>
				    <td>{{ $singleItemValue["item"]["product_price"] }}tk</td>
				    <td id="input_item_total_price_{{ $i }}">{{ $singleItemValue["price"] }}tk</td>
				  </tr>
			  @endforeach
			  <tr>
			    <td></td>
			    <td></td>
			    <td>Total Items : </td>
			    <td id="final_total_item">{{ $cartData->totalQuantity }}</td>
			    <td>Total Price : </td>
			    <td id="final_total_price">{{ $cartData->totalPrice }}tk</td>
			  </tr>
		  @endif
		</table>

		<form method="post" action="{{ route('customer.checkout') }}">

			{{ csrf_field() }}

			<input id="table_info" type="hidden" name="table_info">
			
			{{-- <button id="submit_info" type="submit" class="btn btn-info" style="margin-left: 520px;">Check Out</button> --}}

			<button id="submit_info" type="submit" class="btn btn-success"  style="margin-left: 520px;">Check Out</button>

		</form>

	</div>



@endsection



@section('additionaljs')

	<script type="text/javascript">
		
		$(document).ready(function() {
			

			$(document).on('change', '#item_quantity', function() {
			  
				// console.log('dkfjs');

				// $(this).find('#serial_num').val(13);


				var serial_num = $(this).find('#serial_num').val();
				var hidden_input_item_unit_price = $(this).find('#hidden_input_item_unit_price').val();
				var input_item_quantity = $(this).find('#input_item_quantity').val();




				var singleItemPrice = hidden_input_item_unit_price * input_item_quantity;
				var singleItemPriceId = "#input_item_total_price_" + serial_num;

				singleItemPrice = singleItemPrice + "tk";
				$(singleItemPriceId).text(singleItemPrice);


				// var initial_item_quantity = $(this).find('#initial_item_quantity').val();
				// var increased_quantity = input_item_quantity - initial_item_quantity;
				// var previous_final_total_item = $(this).find('#initial_final_quantity').val();
				// var final_quantity = parseInt(previous_final_total_item, 10) + parseInt(increased_quantity, 10);


				var input_item_quantity = $(this).find('#input_item_quantity').val();
				var previous_item_quantity = $(this).find('#previous_item_quantity').val();
				var hidden_input_item_unit_price = parseInt($(this).find('#hidden_input_item_unit_price').val(), 10);


				input_item_quantity = parseInt(input_item_quantity, 10);
				previous_item_quantity = parseInt(previous_item_quantity, 10);

				var final_total_item = parseInt($('#final_total_item').text(), 10);









				var text = $('#final_total_price').text();
				var numb = text.match(/\d/g);
				numb = numb.join("");
				var final_total_price = parseInt(numb, 10);
				console.log(final_total_price);

				// var final_total_price = $('#final_total_price').text().slice(1);












				final_total_price = parseInt(final_total_price, 10);
				// console.log(final_total_price);

				if(input_item_quantity > previous_item_quantity){


					final_total_item++;
					final_total_price += hidden_input_item_unit_price;

				}
				else if(input_item_quantity < previous_item_quantity){

					final_total_item--;
					final_total_price -= hidden_input_item_unit_price;
				}

				$('#final_total_item').text(final_total_item);

				final_total_price = final_total_price + "tk";
				$('#final_total_price').text(final_total_price);

				$(this).find('#previous_item_quantity').val(input_item_quantity);


				// $('#final_total_item').text(final_quantity);
				// console.log(previous_item_quantity);
				// console.log(input_item_quantity);
				// console.log(final_total_item);

				var temp_item_quantity_id = "#temp_item_quantity_" + serial_num;
				$(temp_item_quantity_id).text(input_item_quantity);
				console.log(temp_item_quantity_id);

			});


			$('#submit_info').click(function() {
				
				function html2json() {
				   var json = '{';
				   var otArr = [];
				   var tbl2 = $('#cart_data_table tr').each(function(i) {        
				      x = $(this).children();
				      var itArr = [];
				      x.each(function() {
				         itArr.push('"' + $(this).text() + '"');
				      });
				      otArr.push('"' + i + '": [' + itArr.join(',') + ']');
				   })
				   json += otArr.join(",") + '}'

				   return json;
				}


				var tableData = html2json();

				$('#table_info').val(tableData);

				console.log(tableData);
				// alert(tableData);

			});


		});

	</script>

@endsection

