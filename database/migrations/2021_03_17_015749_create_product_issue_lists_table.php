<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductIssueListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_issue_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('issue_id');
            $table->integer('product_id');
            $table->string('model_no', 100)->nullable();
            $table->string('serial_no', 100);
            $table->double('price', $scale = 2);
            $table->integer('qty');
            $table->double('amount', $scale = 2);
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
        Schema::dropIfExists('product_issue_lists');
    }
}
