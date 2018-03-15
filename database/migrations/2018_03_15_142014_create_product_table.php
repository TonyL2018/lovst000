<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('productId')->nullable();
          $table->integer('categoryId')->nullable();
          $table->string('productCode', 20)->nullable();
          $table->string('productName', 255)->nullable();
          $table->string('productKana', 255)->nullable();
          $table->string('taxDivision', 1)->nullable();
          $table->string('productPriceDivision', 1)->nullable();
          $table->float('price')->nullable();
          $table->float('customerPrice')->nullable();
          $table->float('cost')->nullable();
          $table->string('attribute', 1000)->nullable();
          $table->string('description', 1000)->nullable();
          $table->string('catchCopy', 1000)->nullable();
          $table->string('size', 255)->nullable();
          $table->string('color', 255)->nullable();
          $table->string('tag', 255)->nullable();
          $table->string('groupCode', 255)->nullable();
          $table->string('url', 255)->nullable();
          $table->integer('displaySequence')->nullable();
          $table->string('displayFlag', 1)->nullable();
          $table->string('salesDivision', 1)->nullable();
          $table->string('division', 1)->nullable();
          $table->integer('productOptionGroupId')->nullable();
          $table->string('stockControlDivision', 1)->nullable();
          $table->string('pointNotApplicable', 1)->nullable();
          $table->string('taxFreeDivision', 1)->nullable();
          $table->string('supplierProductNo', 255)->nullable();
          $table->integer('staffDiscountRate')->nullable();
          $table->date('appStartDateTime')->nullable();
          $table->date('insDateTime')->nullable();
          $table->date('updDateTime')->nullable();
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
        Schema::dropIfExists('product');
    }
}
