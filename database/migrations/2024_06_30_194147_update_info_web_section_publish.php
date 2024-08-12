<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInfoWebSectionPublish extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info_web', function (Blueprint $table) {
            $table->string('title_anunciar')->default('Vende tu casa');
            $table->longText('description_anunciar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('info_web', function (Blueprint $table) {
            $table->dropColumn('title_anunciar');
            $table->dropColumn('description_anunciar');
        });
    }
}
