<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('city');
            $table->timestamps();
        });
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('country');
            $table->string('flag')->nullable();
            $table->unsignedInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->timestamps();
        });
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('country');
            $table->string('flag')->nullable();
            $table->unsignedInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->timestamps();
        });
        Schema::create('levels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('level');
            $table->text('description')->nullable();
            $table->timestamps();
        });
        Schema::create('artists', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nickname')->nullable();
            $table->longText('biography')->nullable();
            $table->timestamp('birthdate')->nullable();
            $table->integer('age')->nullable();
            $table->string('website_url')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->unsignedInteger('level_id')->nullable();
            $table->foreign('level_id')->references('id')->on('levels');
            $table->unsignedInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->unsignedInteger('location_id')->nullable();
            $table->foreign('location_id')->references('id')->on('locations');
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
        Schema::dropIfExists('artists');
        Schema::dropIfExists('levels');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('countries');
        Schema::dropIfExists('cities');

    }
}
