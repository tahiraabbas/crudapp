<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if(!Schema::hasTable('posts')) {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->mediumText('title');
            $table->mediumText('description');
            $table->string('status');
            $table->string('founded');
            $table->string('image');
            $table->timestamps();
        });
    }
    if(!Schema::hasTable('post_models')) {
        Schema::create('post_models', function (Blueprint $table){
            $table->id();
            $table->unsignedinteger('post_id');
            $table->string('model_name');
            $table->timestamps();
            $table->foreign('post_id')->refrences('id')->on('posts')->onDelete('cascade');


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
        Schema::dropIfExists('posts');
    }
}
