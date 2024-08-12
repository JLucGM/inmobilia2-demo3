<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContactoTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('apellido');
            $table->string('email');
            $table->string('telefonoContacto1');
            $table->string('telefonoContacto2')->nullable();
            $table->date('birthdate');
            $table->integer('min_budget')->nullable();
            $table->integer('max_budget')->nullable();
            $table->integer('min_area')->nullable();
            $table->integer('max_area')->nullable();
            $table->integer('bedrooms')->nullable()->default(0);
            $table->integer('bathrooms')->nullable()->default(0);
            $table->integer('garage')->nullable()->default(0);
            $table->string('pais')->nullable();
            $table->string('region')->nullable();
            $table->string('ciudad')->nullable();
            $table->longText('direccion')->nullable();
            $table->longText('observaciones')->nullable();
            $table->bigInteger('tipoPropiedad_id')->unsigned()->nullable(); // Nuevo campo

            $table->timestamps();

            $table->foreign('tipoPropiedad_id')->references('id')->on('tipo_propiedads')->onDelete('cascade')->onUpdate('cascade'); // Nueva relación
        });
    }
    
    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('contactos');
    }
}
