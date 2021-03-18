<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiftingProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lifting_products', function (Blueprint $table) {
            $table->id();
            $table->integer('lifting_id');
            $table->integer('vendor_id');
            $table->integer('product_id');
            $table->string('product_name', 100);
            $table->string('model_no', 100);
            $table->string('serial_no');
            $table->integer('qty');
            $table->double('price', $scale = 2);
            $table->double('mrp', $scale = 2);
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('lifting_products');
    }
}
