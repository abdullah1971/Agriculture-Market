<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmerRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmer_requests', function (Blueprint $table) {
            $table->increments('id');
            // $table->string('email');
            // $table->string('division');
            // $table->string('district');
            // $table->string('thana');
            // $table->string('village');
            $table->integer('user_id');
            $table->string('product_catagory');
            $table->string('product_name');
            $table->string('unit');
            $table->string('product_quantity');
            $table->string('product_price');
            $table->string('product_image');
            $table->string('product_available_from');
            $table->string('product_available_to');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farmer_requests');
    }
}
