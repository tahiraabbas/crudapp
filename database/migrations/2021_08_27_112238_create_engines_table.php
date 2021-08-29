<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnginesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
    if(!Schema::hasTable('engines')) {
        Schema::create('engines', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('model_id');
            $table->string('engine_name');
            $table->timestamps();
            $table->foreign('model_id')
            ->refrences('id')->on('post_models')
            ->onDelete('cascade');

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
        Schema::dropIfExists('engines');
    }
}
