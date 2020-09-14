<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_size', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('size_id')->unsigned();

            $table->primary(['product_id', 'size_id']);

            $table->foreign('size_id')->references('id')
                ->on('sizes')->onDelete('restrict');

            $table->foreign('product_id')->references('id')
                ->on('products')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_size');
    }
}
