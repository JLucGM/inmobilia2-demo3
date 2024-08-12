<?php

namespace Database\Seeders;

use App\Models\TipoPropiedad;
use Illuminate\Database\Seeder;

class TipoPropiedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nombre' => 'Casa'],
            ['nombre' => 'Apartamento'],
            ['nombre' => 'Oficina'],
            ['nombre' => 'Galpones'],
            ['nombre' => 'Locales'],
            ['nombre' => 'Townhouse'],
            ['nombre' => 'Plot/Land'],
            ['nombre' => 'Commercial Lot'],
            ['nombre' => 'Farm'],
            ['nombre' => 'Chalet'],
            ['nombre' => 'Country House'],
            ['nombre' => 'Hotels'],
            ['nombre' => 'Studio Apartment'],
            ['nombre' => 'Building'],
            ['nombre' => 'Beach Plot'],
            ['nombre' => 'Hostel'],
            ['nombre' => 'Condominium'],
            ['nombre' => 'Duplex'],
            ['nombre' => 'Office'],
            ['nombre' => 'Penthouse'],
            ['nombre' => 'Bungalow'],
            ['nombre' => 'Cabin'],
            ['nombre' => 'Garage'],
        ];

        foreach ($data as $TipoPropiedadData) {
            TipoPropiedad::create($TipoPropiedadData);
        }
    }
}
