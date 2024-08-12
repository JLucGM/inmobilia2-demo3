<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSettingGenerals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('setting_generals', function (Blueprint $table) {
            
            $table->string('logo_empresa_footer')->default('default.png')->after('logo_empresa');
            $table->string('logo_empresa_favicon')->default('favicon.ico')->after('logo_empresa');
            
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('setting_generals', function (Blueprint $table) {
            $table->dropColumn('logo_empresa_footer');
            $table->dropColumn('logo_empresa_favicon');
            
        });
    }
}
