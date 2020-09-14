<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_active')->nullable();
            $table->string('image')->nullable();
            $table->float('unit_price')->nullable()->default(0);
            $table->float('discount')->nullable()->default(0);
            $table->string('code')->nullable()->default(0);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')
                ->on('categories');
            $table->foreign('created_by')->references('id')
                ->on('users')->onDelete('restrict');
            $table->foreign('updated_by')->references('id')
                ->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
