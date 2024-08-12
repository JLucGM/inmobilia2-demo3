<?php

namespace Database\Seeders;

use App\Models\InfoWeb;
use Illuminate\Database\Seeder;

class InfoWebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $infoweb = [
            [
                'icon_first' => 'bi bi-house',
                'icon_second' => 'fa-solid fa-building',
                'icon_thrid' => 'fa-solid fa-person-shelter',
                'icon_fourth' => 'fa-solid fa-magnifying-glass',
                
                'title_info' => 'titulo por defecto',
                'title_first' => 'La Marca Inmobiliaria de Lujo Líder en el Mundo',
                'title_second' => 'Integridad, Experiencia y Discreción en el Servicio al Cliente',
                'title_thrid' => 'Expediente Consolidado de Éxito Residencial',
                'title_fourth' => 'Conexiones Locales, Reconocimiento Internacional',
                'title_anunciar' => 'Publica tu propiedad con nosotros',

                'select_us' => 'Supported by the esteemed art business, Christies International Real Estate is a global network offering exclusive home and luxury real estate services to buyers and sellers worldwide.',
                'sell_home' => 'Somos una red global que ofrece casas exclusivas y servicios inmobiliarios de lujo a compradores y vendedores de todo el mundo.',
                'rent_home' => 'La admisión a nuestra red se realiza mediante invitación solamente, y solo a intermediadores inmobiliarios que demuestren un expediente consolidado de éxito en las ventas inmobiliarias de lujo.',
                'buy_home' => 'Nuestros corredores afiliados tienen ventas de bienes raíces residenciales notables y récord en todo el mundo.',
                'marketing_free' => 'Nuestra compañía de bienes raíces está impulsada por el alcance global y la experiencia de nuestra red de Afiliados.',
                'description_anunciar' => 'Nuestra compañía de bienes raíces está impulsada por el alcance global y la experiencia de nuestra red de Afiliados.',
            ],            
        ];

        foreach ($infoweb as $infowebData) {
            InfoWeb::create($infowebData);
        }
    }
}
