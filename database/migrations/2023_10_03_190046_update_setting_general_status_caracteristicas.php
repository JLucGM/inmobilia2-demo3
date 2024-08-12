<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSettingGeneralStatusCaracteristicas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('setting_generals', function (Blueprint $table) {
            $table->boolean('status_section_one')->default(1);
            $table->boolean('status_section_two')->default(1);
            $table->boolean('status_section_three')->default(1);
            $table->string('name')->default('Properties Shop')->after('id');
            $table->string('telefono')->nullable();
            $table->text('direccion')->nullable();
            $table->string('email')->nullable();
            $table->text('description')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('portadaBlog')->nullable();
            $table->string('portadaFaq')->nullable();
            $table->string('portadaContact')->nullable();
            $table->string('titleBlog')->nullable();
            $table->string('titleFaq')->nullable();
            $table->string('titleContact')->nullable();
            $table->longText('descriptionBlog')->nullable();
            $table->longText('descriptionFaq')->nullable();
            $table->longText('descriptionContact')->nullable();
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
            $table->dropColumn('status_section_one');
            $table->dropColumn('status_section_two');
            $table->dropColumn('status_section_three');
            $table->dropColumn('name');
            $table->dropColumn('telefono');
            $table->dropColumn('direccion');
            $table->dropColumn('email');
            $table->dropColumn('description');
            $table->dropColumn('facebook');
            $table->dropColumn('twitter');
            $table->dropColumn('instagram');
            $table->dropColumn('linkedin');
            $table->dropColumn('portadaBlog');
            $table->dropColumn('portadaFaq');
            $table->dropColumn('portadaContact');
            $table->dropColumn('descriptionBlog');
            $table->dropColumn('descriptionFaq');
            $table->dropColumn('descriptionContact');
        });
    }
}
