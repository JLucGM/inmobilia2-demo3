<?php

namespace Database\Seeders;

use App\Models\Ciudades;
use App\Models\Estado;
use Illuminate\Database\Seeder;

class CiudadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear las ciudades de cada estado
        $ciudades = [
            //Ciudades de Venezuela
            // Amazonas
            ['name' => 'Puerto Ayacucho', 'estado_id' => Estado::where('name', 'Amazonas')->first()->id],
            ['name' => 'San Fernando de Atabapo', 'estado_id' => Estado::where('name', 'Amazonas')->first()->id],
            ['name' => 'La Esmeralda', 'estado_id' => Estado::where('name', 'Amazonas')->first()->id],
            ['name' => 'Maroa', 'estado_id' => Estado::where('name', 'Amazonas')->first()->id],
            ['name' => 'Isla Ratón', 'estado_id' => Estado::where('name', 'Amazonas')->first()->id],
            ['name' => 'San Juan de Manapiare', 'estado_id' => Estado::where('name', 'Amazonas')->first()->id],
            ['name' => 'San Carlos de Río Negro', 'estado_id' => Estado::where('name', 'Amazonas')->first()->id],

            // Anzoátegui
            ['name' => 'Barcelona', 'estado_id' => Estado::where('name', 'Anzoátegui')->first()->id],
            ['name' => 'Puerto La Cruz', 'estado_id' => Estado::where('name', 'Anzoátegui')->first()->id],
            ['name' => 'Lechería', 'estado_id' => Estado::where('name', 'Anzoátegui')->first()->id],
            ['name' => 'El Tigre', 'estado_id' => Estado::where('name', 'Anzoátegui')->first()->id],
            ['name' => 'Anaco', 'estado_id' => Estado::where('name', 'Anzoátegui')->first()->id],
            ['name' => 'Puerto Píritu', 'estado_id' => Estado::where('name', 'Anzoátegui')->first()->id],
            ['name' => 'Cantaura', 'estado_id' => Estado::where('name', 'Anzoátegui')->first()->id],
            ['name' => 'San José de Guanipa', 'estado_id' => Estado::where('name', 'Anzoátegui')->first()->id],
            ['name' => 'Guanta ', 'estado_id' => Estado::where('name', 'Anzoátegui')->first()->id],
            ['name' => 'Pariaguan ', 'estado_id' => Estado::where('name', 'Anzoátegui')->first()->id],
            ['name' => 'Aragua De Barcelona', 'estado_id' => Estado::where('name', 'Anzoátegui')->first()->id],
            ['name' => 'Clarines ', 'estado_id' => Estado::where('name', 'Anzoátegui')->first()->id],
            ['name' => 'Ciudad Orinoco', 'estado_id' => Estado::where('name', 'Anzoátegui')->first()->id],
            ['name' => 'San Mateo', 'estado_id' => Estado::where('name', 'Anzoátegui')->first()->id],
            ['name' => 'Onoto ', 'estado_id' => Estado::where('name', 'Anzoátegui')->first()->id],
            ['name' => 'Valle de Guanape', 'estado_id' => Estado::where('name', 'Anzoátegui')->first()->id],
            ['name' => 'El Chaparro', 'estado_id' => Estado::where('name', 'Anzoátegui')->first()->id],
            ['name' => 'Boca de Uchire', 'estado_id' => Estado::where('name', 'Anzoátegui')->first()->id],

            // Apure
            ['name' => 'San Fernando de Apure', 'estado_id' => Estado::where('name', 'Apure')->first()->id],
            ['name' => 'Achaguas', 'estado_id' => Estado::where('name', 'Apure')->first()->id],
            ['name' => 'Biruaca', 'estado_id' => Estado::where('name', 'Apure')->first()->id],
            ['name' => 'Guasdualito', 'estado_id' => Estado::where('name', 'Apure')->first()->id],
            ['name' => 'Bruzual', 'estado_id' => Estado::where('name', 'Apure')->first()->id],

            // Aragua
            ['name' => 'San Mateo', 'estado_id' => Estado::where('name', 'Aragua')->first()->id],
            ['name' => 'Camatagua', 'estado_id' => Estado::where('name', 'Aragua')->first()->id],
            ['name' => 'Santa Rita', 'estado_id' => Estado::where('name', 'Aragua')->first()->id],
            ['name' => 'Maracay', 'estado_id' => Estado::where('name', 'Aragua')->first()->id],
            ['name' => 'Santa Cruz', 'estado_id' => Estado::where('name', 'Aragua')->first()->id],
            ['name' => 'La Victoria', 'estado_id' => Estado::where('name', 'Aragua')->first()->id],
            ['name' => 'El Consejo', 'estado_id' => Estado::where('name', 'Aragua')->first()->id],
            ['name' => 'Palo Negro', 'estado_id' => Estado::where('name', 'Aragua')->first()->id],
            ['name' => 'El Limón', 'estado_id' => Estado::where('name', 'Aragua')->first()->id],
            ['name' => 'Ocumare de la Costa', 'estado_id' => Estado::where('name', 'Aragua')->first()->id],
            ['name' => 'San Casimiro', 'estado_id' => Estado::where('name', 'Aragua')->first()->id],
            ['name' => 'San Sebastián', 'estado_id' => Estado::where('name', 'Aragua')->first()->id],
            ['name' => 'Turmero', 'estado_id' => Estado::where('name', 'Aragua')->first()->id],
            ['name' => 'Las Tejerías', 'estado_id' => Estado::where('name', 'Aragua')->first()->id],
            ['name' => 'Cagua', 'estado_id' => Estado::where('name', 'Aragua')->first()->id],
            ['name' => 'Colonia Tovar', 'estado_id' => Estado::where('name', 'Aragua')->first()->id],
            ['name' => 'Barbacoas', 'estado_id' => Estado::where('name', 'Aragua')->first()->id],
            ['name' => 'Villa de Cura', 'estado_id' => Estado::where('name', 'Aragua')->first()->id],

            // Barinas
            ['name' => 'Barinas', 'estado_id' => Estado::where('name', 'Barinas')->first()->id],
            ['name' => 'Socopó', 'estado_id' => Estado::where('name', 'Barinas')->first()->id],
            ['name' => 'Barinas', 'estado_id' => Estado::where('name', 'Barinas')->first()->id],
            ['name' => 'Ciudad Bolivia', 'estado_id' => Estado::where('name', 'Barinas')->first()->id],
            ['name' => 'Barinitas', 'estado_id' => Estado::where('name', 'Barinas')->first()->id],
            ['name' => 'Santa Bárbara', 'estado_id' => Estado::where('name', 'Barinas')->first()->id],
            ['name' => 'Sabaneta', 'estado_id' => Estado::where('name', 'Barinas')->first()->id],
            ['name' => 'Barrancas', 'estado_id' => Estado::where('name', 'Barinas')->first()->id],
            ['name' => 'Obispos', 'estado_id' => Estado::where('name', 'Barinas')->first()->id],
            ['name' => 'Los Guasimitos', 'estado_id' => Estado::where('name', 'Barinas')->first()->id],
            ['name' => 'Libertad', 'estado_id' => Estado::where('name', 'Barinas')->first()->id],
            ['name' => 'Arauquita', 'estado_id' => Estado::where('name', 'Barinas')->first()->id],
            ['name' => 'Las Casitas del Vegón de Nutrias', 'estado_id' => Estado::where('name', 'Barinas')->first()->id],
            ['name' => 'La Caramuca	', 'estado_id' => Estado::where('name', 'Barinas')->first()->id],
            ['name' => 'Arismendi', 'estado_id' => Estado::where('name', 'Barinas')->first()->id],
            ['name' => 'Quebrada Seca', 'estado_id' => Estado::where('name', 'Barinas')->first()->id],
            ['name' => 'Dolores', 'estado_id' => Estado::where('name', 'Barinas')->first()->id],
            ['name' => 'Chameta', 'estado_id' => Estado::where('name', 'Barinas')->first()->id],
            ['name' => 'La Mula	', 'estado_id' => Estado::where('name', 'Barinas')->first()->id],
            ['name' => 'La Luz	', 'estado_id' => Estado::where('name', 'Barinas')->first()->id],
            ['name' => 'Curbatí', 'estado_id' => Estado::where('name', 'Barinas')->first()->id],
            ['name' => 'Bum-Bum	', 'estado_id' => Estado::where('name', 'Barinas')->first()->id],
            ['name' => 'San Silvestre	', 'estado_id' => Estado::where('name', 'Barinas')->first()->id],

            // Bolívar
            ['name' => 'Ciudad Guayana ', 'estado_id' => Estado::where('name', 'Bolívar')->first()->id],
            ['name' => 'Ciudad Bolívar', 'estado_id' => Estado::where('name', 'Bolívar')->first()->id],
            ['name' => 'Puerto Ordaz', 'estado_id' => Estado::where('name', 'Bolívar')->first()->id],
            ['name' => 'Upata', 'estado_id' => Estado::where('name', 'Bolívar')->first()->id],
            ['name' => 'Caicara del Orinoco', 'estado_id' => Estado::where('name', 'Bolívar')->first()->id],
            ['name' => 'Ciudad Piar', 'estado_id' => Estado::where('name', 'Bolívar')->first()->id],
            ['name' => 'El Callao', 'estado_id' => Estado::where('name', 'Bolívar')->first()->id],
            ['name' => 'El Dorado', 'estado_id' => Estado::where('name', 'Bolívar')->first()->id],
            ['name' => 'Maripa', 'estado_id' => Estado::where('name', 'Bolívar')->first()->id],
            ['name' => 'Santa Elena de Uairén', 'estado_id' => Estado::where('name', 'Bolívar')->first()->id],
            ['name' => 'Tumeremo', 'estado_id' => Estado::where('name', 'Bolívar')->first()->id],
            ['name' => 'Guasipati', 'estado_id' => Estado::where('name', 'Bolívar')->first()->id],
            ['name' => 'El Palmar', 'estado_id' => Estado::where('name', 'Bolívar')->first()->id],

            // Carabobo
            ['name' => 'Valencia', 'estado_id' => Estado::where('name', 'Carabobo')->first()->id],
            ['name' => 'Puerto Cabello', 'estado_id' => Estado::where('name', 'Carabobo')->first()->id],
            ['name' => 'Naguanagua', 'estado_id' => Estado::where('name', 'Carabobo')->first()->id],
            ['name' => 'Tocuyito', 'estado_id' => Estado::where('name', 'Carabobo')->first()->id],
            ['name' => 'Guacara', 'estado_id' => Estado::where('name', 'Carabobo')->first()->id],
            ['name' => 'Mariara', 'estado_id' => Estado::where('name', 'Carabobo')->first()->id],
            ['name' => 'Bejuma', 'estado_id' => Estado::where('name', 'Carabobo')->first()->id],
            ['name' => 'Morón', 'estado_id' => Estado::where('name', 'Carabobo')->first()->id],
            ['name' => 'San Joaquín ', 'estado_id' => Estado::where('name', 'Carabobo')->first()->id],
            ['name' => 'Güigüe', 'estado_id' => Estado::where('name', 'Carabobo')->first()->id],

            // Cojedes
            ['name' => 'San Carlos', 'estado_id' => Estado::where('name', 'Cojedes')->first()->id],
            ['name' => 'Tinaquillo', 'estado_id' => Estado::where('name', 'Cojedes')->first()->id],
            ['name' => 'Tinaco', 'estado_id' => Estado::where('name', 'Cojedes')->first()->id],
            ['name' => 'Las Vegas', 'estado_id' => Estado::where('name', 'Cojedes')->first()->id],
            ['name' => 'El Pao', 'estado_id' => Estado::where('name', 'Cojedes')->first()->id],
            ['name' => 'Macapo', 'estado_id' => Estado::where('name', 'Cojedes')->first()->id],

            // Delta Amacuro
            ['name' => 'Tucupita', 'estado_id' => Estado::where('name', 'Delta Amacuro')->first()->id],
            ['name' => 'Sierra Imataca', 'estado_id' => Estado::where('name', 'Delta Amacuro')->first()->id],
            ['name' => 'Pedernales', 'estado_id' => Estado::where('name', 'Delta Amacuro')->first()->id],
            ['name' => 'Curiapo', 'estado_id' => Estado::where('name', 'Delta Amacuro')->first()->id],

            // Distrito Capital
            ['name' => 'Baruta', 'estado_id' => Estado::where('name', 'Distrito Capital')->first()->id],
            ['name' => ' El Hatillo', 'estado_id' => Estado::where('name', 'Distrito Capital')->first()->id],
            ['name' => 'Sucre', 'estado_id' => Estado::where('name', 'Distrito Capital')->first()->id],
            ['name' => 'Curiapo', 'estado_id' => Estado::where('name', 'Distrito Capital')->first()->id],

            // Falcón
            ['name' => 'Coro', 'estado_id' => Estado::where('name', 'Falcón')->first()->id],
            ['name' => 'Punto Fijo', 'estado_id' => Estado::where('name', 'Falcón')->first()->id],
            ['name' => 'Churuguara', 'estado_id' => Estado::where('name', 'Falcón')->first()->id],
            ['name' => 'Tucacas', 'estado_id' => Estado::where('name', 'Falcón')->first()->id],
            ['name' => 'Judibana', 'estado_id' => Estado::where('name', 'Falcón')->first()->id],
            ['name' => 'Santa Ana de Coro', 'estado_id' => Estado::where('name', 'Falcón')->first()->id],
            ['name' => 'La Vela de Coro', 'estado_id' => Estado::where('name', 'Falcón')->first()->id],
            ['name' => 'Chichiriviche', 'estado_id' => Estado::where('name', 'Falcón')->first()->id],
            ['name' => 'Adícora', 'estado_id' => Estado::where('name', 'Falcón')->first()->id],
            ['name' => 'Cumarebo', 'estado_id' => Estado::where('name', 'Falcón')->first()->id],
            ['name' => 'Dabajuro', 'estado_id' => Estado::where('name', 'Falcón')->first()->id],
            ['name' => 'San Juan de Los Cayos', 'estado_id' => Estado::where('name', 'Falcón')->first()->id],
            ['name' => 'Santa Cruz de Bucarat', 'estado_id' => Estado::where('name', 'Falcón')->first()->id],
            ['name' => 'Tocopero', 'estado_id' => Estado::where('name', 'Falcón')->first()->id],
            ['name' => 'Capatárida', 'estado_id' => Estado::where('name', 'Falcón')->first()->id],

            // Guárico
            ['name' => 'San Juan de Los Morros', 'estado_id' => Estado::where('name', 'Guárico')->first()->id],
            ['name' => 'Valle de la Pascua', 'estado_id' => Estado::where('name', 'Guárico')->first()->id],
            ['name' => 'Calabozo', 'estado_id' => Estado::where('name', 'Guárico')->first()->id],
            ['name' => 'Zaraza', 'estado_id' => Estado::where('name', 'Guárico')->first()->id],
            ['name' => 'Altagracia de Orituco', 'estado_id' => Estado::where('name', 'Guárico')->first()->id],

            // Lara
            ['name' => 'Barquisimeto', 'estado_id' => Estado::where('name', 'Lara')->first()->id],
            ['name' => 'Carora', 'estado_id' => Estado::where('name', 'Lara')->first()->id],
            ['name' => 'El Tocuyo', 'estado_id' => Estado::where('name', 'Lara')->first()->id],
            ['name' => 'Quibor', 'estado_id' => Estado::where('name', 'Lara')->first()->id],
            ['name' => 'Cabudare', 'estado_id' => Estado::where('name', 'Lara')->first()->id],

            // Mérida
            ['name' => 'Mérida', 'estado_id' => Estado::where('name', 'Mérida')->first()->id],
            ['name' => 'El Vigia', 'estado_id' => Estado::where('name', 'Mérida')->first()->id],
            ['name' => 'Ejido', 'estado_id' => Estado::where('name', 'Mérida')->first()->id],
            ['name' => 'Lagunllas', 'estado_id' => Estado::where('name', 'Mérida')->first()->id],
            ['name' => 'Tovar', 'estado_id' => Estado::where('name', 'Mérida')->first()->id],

            // Miranda
            ['name' => 'Los Teques', 'estado_id' => Estado::where('name', 'Miranda')->first()->id],
            ['name' => 'Guatire', 'estado_id' => Estado::where('name', 'Miranda')->first()->id],
            ['name' => 'Guarenas', 'estado_id' => Estado::where('name', 'Miranda')->first()->id],
            ['name' => 'Cúa,', 'estado_id' => Estado::where('name', 'Miranda')->first()->id],
            ['name' => 'Santa Teresa del Tuy', 'estado_id' => Estado::where('name', 'Miranda')->first()->id],
            ['name' => 'San Francisco de Yare', 'estado_id' => Estado::where('name', 'Miranda')->first()->id],
            ['name' => 'Caucagua', 'estado_id' => Estado::where('name', 'Miranda')->first()->id],
            ['name' => 'San Antonio de Los Altos', 'estado_id' => Estado::where('name', 'Miranda')->first()->id],
            ['name' => 'Santa Lucía', 'estado_id' => Estado::where('name', 'Miranda')->first()->id],
            ['name' => 'Higuerote', 'estado_id' => Estado::where('name', 'Miranda')->first()->id],
            ['name' => 'Río Chico', 'estado_id' => Estado::where('name', 'Miranda')->first()->id],

            // Monagas
            ['name' => 'Punta de Mata,', 'estado_id' => Estado::where('name', 'Monagas')->first()->id],
            ['name' => 'Caripe', 'estado_id' => Estado::where('name', 'Monagas')->first()->id],
            ['name' => 'Caripito', 'estado_id' => Estado::where('name', 'Monagas')->first()->id],
            ['name' => 'Maturín', 'estado_id' => Estado::where('name', 'Monagas')->first()->id],
            ['name' => 'Temblador', 'estado_id' => Estado::where('name', 'Monagas')->first()->id],

            // Nueva Esparta
            ['name' => 'La Asunción', 'estado_id' => Estado::where('name', 'Nueva Esparta')->first()->id],
            ['name' => 'Porlamar', 'estado_id' => Estado::where('name', 'Nueva Esparta')->first()->id],
            ['name' => 'Juan Griego', 'estado_id' => Estado::where('name', 'Nueva Esparta')->first()->id],
            ['name' => 'Punta de Piedras', 'estado_id' => Estado::where('name', 'Nueva Esparta')->first()->id],
            ['name' => 'Pampatar', 'estado_id' => Estado::where('name', 'Nueva Esparta')->first()->id],
            ['name' => 'San Juan Bautista', 'estado_id' => Estado::where('name', 'Nueva Esparta')->first()->id],
            ['name' => 'El Valle del Espíritu Santo', 'estado_id' => Estado::where('name', 'Nueva Esparta')->first()->id],

            // Portuguesa
            ['name' => 'Guanare', 'estado_id' => Estado::where('name', 'Portuguesa')->first()->id],
            ['name' => 'Acarigua', 'estado_id' => Estado::where('name', 'Portuguesa')->first()->id],
            ['name' => 'Araure', 'estado_id' => Estado::where('name', 'Portuguesa')->first()->id],

            // Sucre
            ['name' => 'Cumaná', 'estado_id' => Estado::where('name', 'Sucre')->first()->id],
            ['name' => 'Carúpano', 'estado_id' => Estado::where('name', 'Sucre')->first()->id],
            ['name' => 'Cariaco', 'estado_id' => Estado::where('name', 'Sucre')->first()->id],

            // Táchira
            ['name' => 'San Cristóbal', 'estado_id' => Estado::where('name', 'Táchira')->first()->id],
            ['name' => 'Táriba,', 'estado_id' => Estado::where('name', 'Táchira')->first()->id],
            ['name' => 'Rubio', 'estado_id' => Estado::where('name', 'Táchira')->first()->id],
            ['name' => 'La Grita', 'estado_id' => Estado::where('name', 'Táchira')->first()->id],
            ['name' => 'San Antonio del Táchira', 'estado_id' => Estado::where('name', 'Táchira')->first()->id],
            ['name' => 'La Fría', 'estado_id' => Estado::where('name', 'Táchira')->first()->id],
            ['name' => 'Santa Ana del Táchira', 'estado_id' => Estado::where('name', 'Táchira')->first()->id],
            ['name' => 'Capacho Nuevo', 'estado_id' => Estado::where('name', 'Táchira')->first()->id],
            ['name' => 'San Juan de Colón', 'estado_id' => Estado::where('name', 'Táchira')->first()->id],
            ['name' => 'Cordero', 'estado_id' => Estado::where('name', 'Táchira')->first()->id],
            ['name' => 'Capacho Viejo', 'estado_id' => Estado::where('name', 'Táchira')->first()->id],

            // Trujillo
            ['name' => 'Trujillo', 'estado_id' => Estado::where('name', 'Trujillo')->first()->id],
            ['name' => 'Valera', 'estado_id' => Estado::where('name', 'Trujillo')->first()->id],
            ['name' => 'Boconó', 'estado_id' => Estado::where('name', 'Trujillo')->first()->id],
            ['name' => 'Carvajal', 'estado_id' => Estado::where('name', 'Trujillo')->first()->id],

            // La Guaira
            ['name' => 'La Guaira', 'estado_id' => Estado::where('name', 'La Guaira')->first()->id],
            ['name' => 'Caraballeda', 'estado_id' => Estado::where('name', 'La Guaira')->first()->id],
            ['name' => 'Catia La Mar', 'estado_id' => Estado::where('name', 'La Guaira')->first()->id],
            ['name' => 'Macuto', 'estado_id' => Estado::where('name', 'La Guaira')->first()->id],
            ['name' => 'Maiquetía', 'estado_id' => Estado::where('name', 'La Guaira')->first()->id],

            // Yaracuy
            ['name' => 'San Felipe', 'estado_id' => Estado::where('name', 'Yaracuy')->first()->id],
            ['name' => 'Independencia', 'estado_id' => Estado::where('name', 'Yaracuy')->first()->id],
            ['name' => 'Chivacoa', 'estado_id' => Estado::where('name', 'Yaracuy')->first()->id],
            ['name' => 'Nirgua', 'estado_id' => Estado::where('name', 'Yaracuy')->first()->id],
            ['name' => 'Cocorote', 'estado_id' => Estado::where('name', 'Yaracuy')->first()->id],
            ['name' => 'Urachiche', 'estado_id' => Estado::where('name', 'Yaracuy')->first()->id],

            // Zulia
            ['name' => 'Maracaibo', 'estado_id' => Estado::where('name', 'Zulia')->first()->id],
            ['name' => 'San Francisco', 'estado_id' => Estado::where('name', 'Zulia')->first()->id],
            ['name' => 'Cabimas', 'estado_id' => Estado::where('name', 'Zulia')->first()->id],
            ['name' => 'Ciudad Ojeda', 'estado_id' => Estado::where('name', 'Zulia')->first()->id],
            ['name' => 'Santa Bárbara del Zulia', 'estado_id' => Estado::where('name', 'Zulia')->first()->id],
            ['name' => 'Rosario de Perijá', 'estado_id' => Estado::where('name', 'Zulia')->first()->id],
            ['name' => 'Machiques', 'estado_id' => Estado::where('name', 'Zulia')->first()->id],
            ['name' => 'La Concepción', 'estado_id' => Estado::where('name', 'Zulia')->first()->id],
            ['name' => 'Los Puertos de Altagracia', 'estado_id' => Estado::where('name', 'Zulia')->first()->id],

            //Ciudades de Republica Dominicana
            // Azua
            ['name' => 'Azua de Compostela', 'estado_id' => Estado::where('name', 'Azua')->first()->id],
            ['name' => 'Estebanía', 'estado_id' => Estado::where('name', 'Azua')->first()->id],
            ['name' => 'Guayabal', 'estado_id' => Estado::where('name', 'Azua')->first()->id],
            ['name' => 'Las Charcas', 'estado_id' => Estado::where('name', 'Azua')->first()->id],
            ['name' => 'Las Yayas de Viajama', 'estado_id' => Estado::where('name', 'Azua')->first()->id],
            ['name' => 'Padre Las Casas', 'estado_id' => Estado::where('name', 'Azua')->first()->id],
            ['name' => 'Peralta', 'estado_id' => Estado::where('name', 'Azua')->first()->id],
            ['name' => 'Pueblo Viejo', 'estado_id' => Estado::where('name', 'Azua')->first()->id],
            ['name' => 'Sabana Yegua', 'estado_id' => Estado::where('name', 'Azua')->first()->id],
            ['name' => 'Tábara Arriba', 'estado_id' => Estado::where('name', 'Azua')->first()->id],

            // Bahoruco
            ['name' => 'Neiba', 'estado_id' => Estado::where('name', 'Bahoruco')->first()->id],
            ['name' => 'Galván', 'estado_id' => Estado::where('name', 'Bahoruco')->first()->id],
            ['name' => 'Los Ríos', 'estado_id' => Estado::where('name', 'Bahoruco')->first()->id],
            ['name' => 'Tamayo', 'estado_id' => Estado::where('name', 'Bahoruco')->first()->id],
            ['name' => 'Uvilla', 'estado_id' => Estado::where('name', 'Bahoruco')->first()->id],
            ['name' => 'Mella', 'estado_id' => Estado::where('name', 'Bahoruco')->first()->id],
            ['name' => 'El Palmar', 'estado_id' => Estado::where('name', 'Bahoruco')->first()->id],
            ['name' => 'Monserrat', 'estado_id' => Estado::where('name', 'Bahoruco')->first()->id],

            // Barahona
            ['name' => 'Barahona', 'estado_id' => Estado::where('name', 'Barahona')->first()->id],
            ['name' => 'Cabral', 'estado_id' => Estado::where('name', 'Barahona')->first()->id],
            ['name' => 'El Peñón', 'estado_id' => Estado::where('name', 'Barahona')->first()->id],
            ['name' => 'Enriquillo', 'estado_id' => Estado::where('name', 'Barahona')->first()->id],
            ['name' => 'Fundación', 'estado_id' => Estado::where('name', 'Barahona')->first()->id],
            ['name' => 'Jaquimeyes', 'estado_id' => Estado::where('name', 'Barahona')->first()->id],
            ['name' => 'La Ciénaga', 'estado_id' => Estado::where('name', 'Barahona')->first()->id],
            ['name' => 'Las Salinas', 'estado_id' => Estado::where('name', 'Barahona')->first()->id],
            ['name' => 'Paraíso', 'estado_id' => Estado::where('name', 'Barahona')->first()->id],
            ['name' => 'Pescadería', 'estado_id' => Estado::where('name', 'Barahona')->first()->id],
            ['name' => 'Vicente Noble', 'estado_id' => Estado::where('name', 'Barahona')->first()->id],

            // Dajabón
            ['name' => 'Dajabón', 'estado_id' => Estado::where('name', 'Dajabón')->first()->id],
            ['name' => 'El Pino', 'estado_id' => Estado::where('name', 'Dajabón')->first()->id],
            ['name' => 'Loma de Cabrera', 'estado_id' => Estado::where('name', 'Dajabón')->first()->id],
            ['name' => 'Partido', 'estado_id' => Estado::where('name', 'Dajabón')->first()->id],
            ['name' => 'Restauración', 'estado_id' => Estado::where('name', 'Dajabón')->first()->id],

            // Duarte
            ['name' => 'San Francisco de Macorís', 'estado_id' => Estado::where('name', 'Duarte')->first()->id],
            ['name' => 'Arenoso', 'estado_id' => Estado::where('name', 'Duarte')->first()->id],
            ['name' => 'Castillo', 'estado_id' => Estado::where('name', 'Duarte')->first()->id],
            ['name' => 'Eugenio María de Hostos', 'estado_id' => Estado::where('name', 'Duarte')->first()->id],
            ['name' => 'Las Guáranas', 'estado_id' => Estado::where('name', 'Duarte')->first()->id],
            ['name' => 'Pimentel', 'estado_id' => Estado::where('name', 'Duarte')->first()->id],
            ['name' => 'San Luis', 'estado_id' => Estado::where('name', 'Duarte')->first()->id],

            // El Seibo
            ['name' => 'El Seibo', 'estado_id' => Estado::where('name', 'El Seibo')->first()->id],
            ['name' => 'Miches', 'estado_id' => Estado::where('name', 'El Seibo')->first()->id],
            ['name' => 'Santa Cruz de El Seibo', 'estado_id' => Estado::where('name', 'El Seibo')->first()->id],

            // Elías Piña
            ['name' => 'Comendador', 'estado_id' => Estado::where('name', 'Elías Piña')->first()->id],
            ['name' => 'Bánica', 'estado_id' => Estado::where('name', 'Elías Piña')->first()->id],
            ['name' => 'El Llano', 'estado_id' => Estado::where('name', 'Elías Piña')->first()->id],
            ['name' => 'Hondo Valle', 'estado_id' => Estado::where('name', 'Elías Piña')->first()->id],
            ['name' => 'Juan Santiago', 'estado_id' => Estado::where('name', 'Elías Piña')->first()->id],

            // Espaillat
            ['name' => 'Moca', 'estado_id' => Estado::where('name', 'Espaillat')->first()->id],
            ['name' => 'Cayetano Germosén', 'estado_id' => Estado::where('name', 'Espaillat')->first()->id],
            ['name' => 'Gaspar Hernández', 'estado_id' => Estado::where('name', 'Espaillat')->first()->id],
            ['name' => 'Jamao al Norte', 'estado_id' => Estado::where('name', 'Espaillat')->first()->id],

            // Hato Mayor
            ['name' => 'Hato Mayor del Rey', 'estado_id' => Estado::where('name', 'Hato Mayor')->first()->id],
            ['name' => 'El Valle', 'estado_id' => Estado::where('name', 'Hato Mayor')->first()->id],
            ['name' => 'Sabana de la Mar', 'estado_id' => Estado::where('name', 'Hato Mayor')->first()->id],
            ['name' => 'Yerba Buena', 'estado_id' => Estado::where('name', 'Hato Mayor')->first()->id],

            // Hermanas Mirabal
            ['name' => 'Salcedo', 'estado_id' => Estado::where('name', 'Hermanas Mirabal')->first()->id],
            ['name' => 'Tenares', 'estado_id' => Estado::where('name', 'Hermanas Mirabal')->first()->id],
            ['name' => 'Villa Tapia', 'estado_id' => Estado::where('name', 'Hermanas Mirabal')->first()->id],

            // Independencia
            ['name' => 'Jimaní', 'estado_id' => Estado::where('name', 'Independencia')->first()->id],
            ['name' => 'Duvergé', 'estado_id' => Estado::where('name', 'Independencia')->first()->id],
            ['name' => 'La Descubierta', 'estado_id' => Estado::where('name', 'Independencia')->first()->id],
            ['name' => 'Mella', 'estado_id' => Estado::where('name', 'Independencia')->first()->id],

            // La Altagracia
            ['name' => 'Higüey', 'estado_id' => Estado::where('name', 'La Altagracia')->first()->id],
            ['name' => 'La Otra Banda', 'estado_id' => Estado::where('name', 'La Altagracia')->first()->id],
            ['name' => 'Boca de Yuma', 'estado_id' => Estado::where('name', 'La Altagracia')->first()->id],
            ['name' => 'San Rafael del Yuma', 'estado_id' => Estado::where('name', 'La Altagracia')->first()->id],

            // La Romana
            ['name' => 'La Romana', 'estado_id' => Estado::where('name', 'La Romana')->first()->id],
            ['name' => 'Guaymate', 'estado_id' => Estado::where('name', 'La Romana')->first()->id],
            ['name' => 'La Caleta', 'estado_id' => Estado::where('name', 'La Romana')->first()->id],
            ['name' => 'Villa Hermosa', 'estado_id' => Estado::where('name', 'La Romana')->first()->id],

            // La Vega
            ['name' => 'La Vega', 'estado_id' => Estado::where('name', 'La Vega')->first()->id],
            ['name' => 'Concepción de La Vega', 'estado_id' => Estado::where('name', 'La Vega')->first()->id],
            ['name' => 'Jarabacoa', 'estado_id' => Estado::where('name', 'La Vega')->first()->id],
            ['name' => 'Jima Abajo', 'estado_id' => Estado::where('name', 'La Vega')->first()->id],

            // María Trinidad Sánchez
            ['name' => 'Nagua', 'estado_id' => Estado::where('name', 'María Trinidad Sánchez')->first()->id],
            ['name' => 'Cabrera', 'estado_id' => Estado::where('name', 'María Trinidad Sánchez')->first()->id],
            ['name' => 'El Factor', 'estado_id' => Estado::where('name', 'María Trinidad Sánchez')->first()->id],
            ['name' => 'Río San Juan', 'estado_id' => Estado::where('name', 'María Trinidad Sánchez')->first()->id],

            // Monseñor Nouel
            ['name' => 'Bonao', 'estado_id' => Estado::where('name', 'Monseñor Nouel')->first()->id],
            ['name' => 'Maimón', 'estado_id' => Estado::where('name', 'Monseñor Nouel')->first()->id],
            ['name' => 'Piedra Blanca', 'estado_id' => Estado::where('name', 'Monseñor Nouel')->first()->id],
            ['name' => 'Sabana del Puerto', 'estado_id' => Estado::where('name', 'Monseñor Nouel')->first()->id],

            // Monte Cristi
            ['name' => 'San Fernando de Monte Cristi', 'estado_id' => Estado::where('name', 'Monte Cristi')->first()->id],
            ['name' => 'Castañuelas', 'estado_id' => Estado::where('name', 'Monte Cristi')->first()->id],
            ['name' => 'Guayubín', 'estado_id' => Estado::where('name', 'Monte Cristi')->first()->id],
            ['name' => 'Las Matas de Santa Cruz', 'estado_id' => Estado::where('name', 'Monte Cristi')->first()->id],

            // Monte Plata
            ['name' => 'Monte Plata', 'estado_id' => Estado::where('name', 'Monte Plata')->first()->id],
            ['name' => 'Bayaguana', 'estado_id' => Estado::where('name', 'Monte Plata')->first()->id],
            ['name' => 'Peralvillo', 'estado_id' => Estado::where('name', 'Monte Plata')->first()->id],
            ['name' => 'Yamasá', 'estado_id' => Estado::where('name', 'Monte Plata')->first()->id],

            // Pedernales
            ['name' => 'Pedernales', 'estado_id' => Estado::where('name', 'Pedernales')->first()->id],
            ['name' => 'Juancho', 'estado_id' => Estado::where('name', 'Pedernales')->first()->id],
            ['name' => 'José Francisco Peña Gómez', 'estado_id' => Estado::where('name', 'Pedernales')->first()->id],

            // Peravia
            ['name' => 'Baní', 'estado_id' => Estado::where('name', 'Peravia')->first()->id],
            ['name' => 'Nizao', 'estado_id' => Estado::where('name', 'Peravia')->first()->id],
            ['name' => 'Matanzas', 'estado_id' => Estado::where('name', 'Peravia')->first()->id],
            ['name' => 'Sabana Grande de Palenque', 'estado_id' => Estado::where('name', 'Peravia')->first()->id],

            // Puerto Plata
            ['name' => 'Puerto Plata', 'estado_id' => Estado::where('name', 'Puerto Plata')->first()->id],
            ['name' => 'Altamira', 'estado_id' => Estado::where('name', 'Puerto Plata')->first()->id],
            ['name' => 'Guananico', 'estado_id' => Estado::where('name', 'Puerto Plata')->first()->id],
            ['name' => 'Imbert', 'estado_id' => Estado::where('name', 'Puerto Plata')->first()->id],

            // Sánchez Ramírez
            ['name' => 'Cotuí', 'estado_id' => Estado::where('name', 'Sánchez Ramírez')->first()->id],
            ['name' => 'Cevicos', 'estado_id' => Estado::where('name', 'Sánchez Ramírez')->first()->id],
            ['name' => 'La Mata', 'estado_id' => Estado::where('name', 'Sánchez Ramírez')->first()->id],
            ['name' => 'Fantino', 'estado_id' => Estado::where('name', 'Sánchez Ramírez')->first()->id],

            // San Cristóbal
            ['name' => 'San Cristóbal', 'estado_id' => Estado::where('name', 'San Cristóbal')->first()->id],
            ['name' => 'Bajos de Haina', 'estado_id' => Estado::where('name', 'San Cristóbal')->first()->id],
            ['name' => 'San Gregorio de Nigua', 'estado_id' => Estado::where('name', 'San Cristóbal')->first()->id],
            ['name' => 'Yaguate', 'estado_id' => Estado::where('name', 'San Cristóbal')->first()->id],

            // San José de Ocoa
            ['name' => 'San José de Ocoa', 'estado_id' => Estado::where('name', 'San José de Ocoa')->first()->id],
            ['name' => 'Rancho Arriba', 'estado_id' => Estado::where('name', 'San José de Ocoa')->first()->id],
            ['name' => 'Sabana Larga', 'estado_id' => Estado::where('name', 'San José de Ocoa')->first()->id],

            // San Juan
            ['name' => 'San Juan de la Maguana', 'estado_id' => Estado::where('name', 'San Juan')->first()->id],
            ['name' => 'El Cercado', 'estado_id' => Estado::where('name', 'San Juan')->first()->id],
            ['name' => 'Juan de Herrera', 'estado_id' => Estado::where('name', 'San Juan')->first()->id],
            ['name' => 'Las Matas de Farfán', 'estado_id' => Estado::where('name', 'San Juan')->first()->id],

            // San Pedro de Macorís
            ['name' => 'San Pedro de Macorís', 'estado_id' => Estado::where('name', 'San Pedro de Macorís')->first()->id],
            ['name' => 'Consuelo', 'estado_id' => Estado::where('name', 'San Pedro de Macorís')->first()->id],
            ['name' => 'Guayabo', 'estado_id' => Estado::where('name', 'San Pedro de Macorís')->first()->id],
            ['name' => 'Quisqueya', 'estado_id' => Estado::where('name', 'San Pedro de Macorís')->first()->id],

            // Santiago
            ['name' => 'Santiago de los Caballeros', 'estado_id' => Estado::where('name', 'Santiago')->first()->id],
            ['name' => 'Bisonó', 'estado_id' => Estado::where('name', 'Santiago')->first()->id],
            ['name' => 'Jánico', 'estado_id' => Estado::where('name', 'Santiago')->first()->id],
            ['name' => 'San José de las Matas', 'estado_id' => Estado::where('name', 'Santiago')->first()->id],

            // Santiago Rodríguez
            ['name' => 'San Ignacio de Sabaneta', 'estado_id' => Estado::where('name', 'Santiago Rodríguez')->first()->id],
            ['name' => 'Monción', 'estado_id' => Estado::where('name', 'Santiago Rodríguez')->first()->id],
            ['name' => 'Villa Los Almácigos', 'estado_id' => Estado::where('name', 'Santiago Rodríguez')->first()->id],

            // Santo Domingo
            ['name' => 'Santo Domingo Este', 'estado_id' => Estado::where('name', 'Santo Domingo')->first()->id],
            ['name' => 'Santo Domingo Norte', 'estado_id' => Estado::where('name', 'Santo Domingo')->first()->id],
            ['name' => 'Santo Domingo Oeste', 'estado_id' => Estado::where('name', 'Santo Domingo')->first()->id],
            ['name' => 'Boca Chica', 'estado_id' => Estado::where('name', 'Santo Domingo')->first()->id],

            // Valverde
            ['name' => 'Mao', 'estado_id' => Estado::where('name', 'Valverde')->first()->id],
            ['name' => 'Esperanza', 'estado_id' => Estado::where('name', 'Valverde')->first()->id],
            ['name' => 'Laguna Salada', 'estado_id' => Estado::where('name', 'Valverde')->first()->id],
        ];

        foreach ($ciudades as $ciudad) {
            Ciudades::create($ciudad);
        }
    }
}
