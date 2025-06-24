<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerrainsTable extends Migration
{
    public function up()
    {
        Schema::create('terrains', function (Blueprint $table) {
            $table->id();
            $table->string('title'); 
            $table->text('description')->nullable();
            $table->string('location');
            $table->decimal('area_size', 10, 2); 
            $table->decimal('price_per_day', 8, 2); 
            $table->dateTime('available_from');
            $table->dateTime('available_to');
            $table->boolean('is_available')->default(true);
            $table->string('main_image')->nullable();
            // $table->unsignedBigInteger('owner_id');
            $table->timestamps();
            
            
            // $table->foreign('owner_id')->references(p'id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('terrains');
    }
}