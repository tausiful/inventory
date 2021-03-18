<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiftingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liftings', function (Blueprint $table) {
            $table->id();
            $table->string('serial_no');
            $table->string('vaouchar_no')->nullable();
            $table->integer('vendor_id');
            $table->string('purchase_by')->nullable();
            $table->date('submission_date')->nullable();
            $table->date('vouchar_date')->nullable();
            $table->string('total_qty')->nullable();
            $table->double('total_price', $scale = 2);
            $table->double('total_mrp_price', $scale = 2);
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
        Schema::dropIfExists('liftings');
    }
}
