<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            Schema::create('property', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('description')->nullable();
                $table->decimal('price', 15, 2);
                $table->string('location');
                $table->integer('bedrooms');
                $table->integer('bathrooms');
                $table->integer('square_feet');
                $table->unsignedBigInteger('type_id');
                $table->unsignedBigInteger('country_id');
                $table->unsignedBigInteger('city_id');
                $table->foreign('type_id')->references('id')->on('property_types');
                $table->foreign('country_id')->references('id')->on('property_types');
                $table->foreign('city_id')->references('id')->on('property_types');
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
