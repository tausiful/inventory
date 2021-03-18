<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_issues', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->string('issue_no', 100);
            $table->string('date', 100)->nullable();
            $table->double('total_qty', $scale = 2);
            $table->double('total_amount', $scale = 2);
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
        Schema::dropIfExists('product_issues');
    }
}
