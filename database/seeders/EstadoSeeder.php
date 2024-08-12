<?php

namespace Database\Seeders;

use App\Models\Estado;
use App\Models\Paises;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Estados
        $estados = [
            // Crear los estados de Venezuela
            ['name' => 'Amazonas', 'pais_id' => Paises::where('name', 'Venezuela')->first()->id],
            ['name' => 'Anzoátegui', 'pais_id' => Paises::where('name', 'Venezuela')->first()->id],
            ['name' => 'Apure', 'pais_id' => Paises::where('name', 'Venezuela')->first()->id],
            ['name' => 'Aragua', 'pais_id' => Paises::where('name', 'Venezuela')->first()->id],
            ['name' => 'Barinas', 'pais_id' => Paises::where('name', 'Venezuela')->first()->id],
            ['name' => 'Bolívar', 'pais_id' => Paises::where('name', 'Venezuela')->first()->id],
            ['name' => 'Carabobo', 'pais_id' => Paises::where('name', 'Venezuela')->first()->id],
            ['name' => 'Cojedes', 'pais_id' => Paises::where('name', 'Venezuela')->first()->id],
            ['name' => 'Delta Amacuro', 'pais_id' => Paises::where('name', 'Venezuela')->first()->id],
            ['name' => 'Distrito Capital', 'pais_id' => Paises::where('name', 'Venezuela')->first()->id],
            ['name' => 'Falcón', 'pais_id' => Paises::where('name', 'Venezuela')->first()->id],
            ['name' => 'Guárico', 'pais_id' => Paises::where('name', 'Venezuela')->first()->id],
            ['name' => 'Lara', 'pais_id' => Paises::where('name', 'Venezuela')->first()->id],
            ['name' => 'Mérida', 'pais_id' => Paises::where('name', 'Venezuela')->first()->id],
            ['name' => 'Miranda', 'pais_id' => Paises::where('name', 'Venezuela')->first()->id],
            ['name' => 'Monagas', 'pais_id' => Paises::where('name', 'Venezuela')->first()->id],
            ['name' => 'Nueva Esparta', 'pais_id' => Paises::where('name', 'Venezuela')->first()->id],
            ['name' => 'Portuguesa', 'pais_id' => Paises::where('name', 'Venezuela')->first()->id],
            ['name' => 'Sucre', 'pais_id' => Paises::where('name', 'Venezuela')->first()->id],
            ['name' => 'Táchira', 'pais_id' => Paises::where('name', 'Venezuela')->first()->id],
            ['name' => 'Trujillo', 'pais_id' => Paises::where('name', 'Venezuela')->first()->id],
            ['name' => 'La Guaira', 'pais_id' => Paises::where('name', 'Venezuela')->first()->id],
            ['name' => 'Yaracuy', 'pais_id' => Paises::where('name', 'Venezuela')->first()->id],
            ['name' => 'Zulia', 'pais_id' => Paises::where('name', 'Venezuela')->first()->id],
            ['name' => 'Distrito Capital', 'pais_id' => Paises::where('name', 'Venezuela')->first()->id],
            ['name' => 'Dependencias Federales', 'pais_id' => Paises::where('name', 'Venezuela')->first()->id],

            // Crear los estados de República Dominicana
            ['name' => 'Azua', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'Bahoruco', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'Barahona', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'Dajabón', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'Duarte', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'El Seibo', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'Elías Piña', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'Espaillat', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'Hato Mayor', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'Hermanas Mirabal', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'Independencia', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'La Altagracia', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'La Romana', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'La Vega', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'María Trinidad Sánchez', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'Monseñor Nouel', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'Monte Cristi', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'Monte Plata', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'Pedernales', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'Peravia', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'Puerto Plata', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'Sánchez Ramírez', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'San Cristóbal', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'San José de Ocoa', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'San Juan', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'San Pedro de Macorís', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'Santiago', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'Santiago Rodríguez', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'Santo Domingo', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
            ['name' => 'Valverde', 'pais_id' => Paises::where('name', 'República Dominicana')->first()->id],
        ];


        foreach ($estados as $estado) {
            Estado::create($estado);
        }
    
    }
}
