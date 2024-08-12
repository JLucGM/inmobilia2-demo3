<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contactos', function (Blueprint $table) {
           
            $table->unsignedBigInteger('customer_type_id');
            $table->unsignedBigInteger('status_contact_id');
            $table->unsignedBigInteger('origins_id');
    
            // Relaciones
            $table->foreign('customer_type_id')->references('id')->on('customer_types')->onDelete('cascade');
            $table->foreign('status_contact_id')->references('id')->on('status_contacts')->onDelete('cascade');
            $table->foreign('origins_id')->references('id')->on('origins')->onDelete('cascade');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
{
    Schema::table('contactos', function (Blueprint $table) {
        $table->dropForeign('contactos_customer_type_id_foreign');
        $table->dropForeign('contactos_status_contact_id_foreign');
        $table->dropForeign('contactos_origins_id_foreign');

        $table->dropColumn('customer_type_id');
        $table->dropColumn('status_contact_id');
        $table->dropColumn('origins_id');
    });
}
}
