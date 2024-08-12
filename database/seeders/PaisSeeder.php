<?php

namespace Database\Seeders;

use App\Models\Ciudades;
use App\Models\Estado;
use App\Models\Paises;
use Illuminate\Database\Seeder;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear el país Venezuela
        $paises = [
            ['name' => 'Venezuela'],
            ['name' => 'República Dominicana'],
        ];
        
        foreach ($paises as $pais) {
            Paises::create($pais);
        } 
    }
}
