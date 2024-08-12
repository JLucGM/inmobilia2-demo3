<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhyStateIdAndTypeBusinessIdToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('products', function (Blueprint $table) {
        $table->dropColumn('status');
        $table->dropColumn('statusActual');

        $table->unsignedBigInteger('phy_state_id');
        $table->foreign('phy_state_id')->references('id')->on('phy_states')->onDelete('cascade');

        $table->unsignedBigInteger('type_business_id');
        $table->foreign('type_business_id')->references('id')->on('type_businesses')->onDelete('cascade');
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
        $table->string('status'); //status 
        $table->string('statusActual'); //status 

        $table->dropForeign(['phy_state_id']);
        $table->dropColumn('phy_state_id');

        $table->dropForeign(['type_business_id']);
        $table->dropColumn('type_business_id');
    });
}
}
