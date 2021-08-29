<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostProductionDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        if(!Schema::hasTable('post_production_dates')) {
        Schema::create('post_production_dates', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedinteger('model_id');
            $table->date('created_at');
            $table->foreign('model_id')
            ->references('id')
            ->on('post_models')
            ->onDelete('cascade');

           
        });
    }}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_production_dates');
    }
}
