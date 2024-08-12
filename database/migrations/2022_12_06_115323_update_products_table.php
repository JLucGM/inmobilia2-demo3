<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('statusActual')->nullable();
            $table->boolean('publicar')->default(0)->nullable();
            $table->integer('dormitorios')->default(0)->nullable();
            $table->integer('ambientes')->default(0)->nullable();
            $table->integer('toilet')->default(0)->nullable(); //baño
            $table->integer('metrosCuadradosT')->default(0)->nullable(); //metros cuadrados totales
            $table->integer('metrosCuadradosC')->default(0)->nullable(); //metros cuadrados cubiertos
            $table->boolean('estrenar')->default(0)->nullable();
            $table->integer('expensas')->default(0)->nullable();
            $table->integer('cocheras')->default(0)->nullable();
            // $table->string('linkVideo')->nullable();
            $table->string('pais')->nullable();
            $table->string('region')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->string('direccion')->nullable();

            $table->bigInteger('tipoPropiedad_id')->unsigned()->nullable(); //propiedad
            $table->foreign('tipoPropiedad_id')->references('id')->on('tipo_propiedads')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'tatusActual')) {
                $table->dropColumn('statusActual');
            }

            $table->dropColumn('publicar');
            $table->dropColumn('dormitorios');
            $table->dropColumn('ambientes');
            $table->dropColumn('metrosCuadradosT');
            $table->dropColumn('metrosCuadradosC');
            $table->dropColumn('toilet');
            $table->dropColumn('estrenar');
            $table->dropColumn('expensas');
            $table->dropColumn('cocheras');
            $table->dropColumn('pais')->nullable();
            $table->dropColumn('region')->nullable();
            $table->dropColumn('ciudad')->nullable();
            $table->dropColumn('latitud')->nullable();
            $table->dropColumn('longitud')->nullable();
            $table->dropColumn('direccion')->nullable();

            $table->dropForeign('products_tipoPropiedad_id_foreign');
            $table->dropColumn('tipoPropiedad_id');
        });
    }
}
