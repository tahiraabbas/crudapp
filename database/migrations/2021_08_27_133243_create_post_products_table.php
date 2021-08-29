<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('post_product')) {
        Schema::create('post_product', function (Blueprint $table) {
            $table->integer('post_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->foreign('post_id')
            ->references('id')
            ->on('posts')->onDelete('cascade');
            $table->foreign('product_id')
            ->references('id')
            ->on('products')->onDelete('cascade');
        });
    }
}
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_products');
    }
}
