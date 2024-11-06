<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->text("product_desc")->nullable();
            $table->decimal("initial_price", 11, 2)->unsigned();
            $table->decimal("selling_price", 11, 2)->unsigned();
            $table->decimal("quantity", 11, 2)->default(0);
            $table->string('category');
            $table->string('product_image');
            $table->integer('vendor_id')->unsigned();
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
        Schema::dropIfExists('products');
    }
};
