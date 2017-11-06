<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('relation');
            $table->string('family_type');
            $table->string('email');
            $table->text('phone_number');
            $table->unsignedInteger('default_pickup_hours_id')->nullable();  
            $table->timestamps();
        });

        Schema::table('parents', function (Blueprint $table) {
            $table->foreign('default_pickup_hours_id')->references('id')->on('default_pickup_hours');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parents');
    }
}
