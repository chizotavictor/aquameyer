<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDronesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id');
            $table->string('drone_code');
            $table->string('drone_status');
            $table->string('specification')->default('NILL');
            $table->string('photo_1')->default('NILL');
            $table->string('photo_2')->default('NILL');
            $table->string('photo_3')->default('NILL');
            $table->text('raw');
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
        Schema::dropIfExists('drones');
    }
}
