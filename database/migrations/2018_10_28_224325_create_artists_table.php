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
        Schema::create('departamento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });
        Schema::create('ciudad', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->unsignedInteger('iddepartamento')->nullable();
            $table->foreign('iddepartamento')->references('id')->on('departamento');
            $table->string('descripcion');
            $table->timestamps();
        });
        // Schema::create('locations', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('country');
        //     $table->string('flag')->nullable();
        //     $table->unsignedInteger('city_id')->nullable();
        //     $table->foreign('city_id')->references('id')->on('cities');
        //     $table->timestamps();
        // });
        Schema::create('levels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('level');
            $table->text('description')->nullable();
            $table->timestamps();
        });
        Schema::create('artists', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('document_type',['TI','CC'])->nullable();
            $table->string('identification')->nullable();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nickname')->nullable();
            $table->longText('biography')->nullable();
            $table->timestamp('birthdate')->nullable();
            $table->integer('age')->nullable();
            $table->unsignedInteger('level_id')->nullable();
            $table->foreign('level_id')->references('id')->on('levels');
            $table->unsignedInteger('cities_id')->nullable();
            $table->foreign('cities_id')->references('id')->on('ciudad');
            $table->unsignedInteger('township')->nullable();
            $table->string('addres')->nullable();
            $table->string('expedition_place')->nullable();
            $table->unsignedInteger('person_types_id')->nullable();
            $table->foreign('person_types_id')->references('id')->on('person_types');
            $table->unsignedInteger('artist_types_id')->nullable();
            $table->foreign('artist_types_id')->references('id')->on('artist_types');
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
