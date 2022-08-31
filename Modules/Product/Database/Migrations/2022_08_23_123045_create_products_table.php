<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('title');
            $table->string('slug');
            $table->string('sku');
            $table->string('price');
            $table->string('product_img')->nullable();
            $table->foreignId('category_id');
            $table->foreignId('sub_category_id');
            $table->foreignId('type')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('is_active');
            $table->timestamps(0);

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
