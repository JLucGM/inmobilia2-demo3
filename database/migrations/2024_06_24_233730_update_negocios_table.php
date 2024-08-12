<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNegociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('negocios', function (Blueprint $table) {
            $table->unsignedBigInteger('type_business_id');
            $table->foreign('type_business_id')->references('id')->on('type_businesses')->onDelete('cascade');
            
            $table->unsignedBigInteger('priority_id');
            $table->foreign('priority_id')->references('id')->on('priorities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('negocios', function (Blueprint $table) {
            $table->dropForeign(['type_business_id']);
            $table->dropColumn('type_business_id');
            
            $table->dropForeign(['priority_id']);
            $table->dropColumn('priority_id');
        });
    }
}
