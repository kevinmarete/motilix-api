<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTblModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_model', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('is_supported');
            $table->integer('vehicle_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['vehicle_id', 'name']);

            $table->foreign('vehicle_id')->references('id')->on('tbl_vehicle')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_model');
    }
}
