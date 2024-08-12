<?php

namespace Database\Seeders;

use App\Models\TypeBusiness;
use Illuminate\Database\Seeder;

class TypeBusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'on sale'],
            ['name' => 'for rent'],
        ];

        foreach ($data as $TypeBusiness) {
            TypeBusiness::create($TypeBusiness);
        }
    }
}
