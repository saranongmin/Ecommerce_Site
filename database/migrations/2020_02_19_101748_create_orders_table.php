<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('mobile_number')->nullable();
            $table->text('shipping_address')->nullable();
            $table->float('total_amount')->nullable()->default(0);
            $table->tinyInteger('status')->default(0);
            $table->float('delivered_quantity')->default(0);
            $table->timestamp('delivered_at')->nullable();
            $table->string('delivered_by')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
