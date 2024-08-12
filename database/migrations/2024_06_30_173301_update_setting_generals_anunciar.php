<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSettingGeneralsAnunciar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('setting_generals', function (Blueprint $table) {
            
            $table->string('portadaAnunciar')->nullable();
            $table->string('titleAnunciar')->nullable();
            $table->longText('descriptionAnunciar')->nullable();
            $table->boolean('status_section_four')->default(1);

            
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
            $table->dropColumn('portadaAnunciar');
            $table->dropColumn('titleAnunciar');
            $table->dropColumn('descriptionAnunciar');
            $table->dropColumn('status_section_four');
            
        });
    }
}
