<?php

namespace Database\Seeders;

use App\Models\PhyState;
use Illuminate\Database\Seeder;

class PhyStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'used'],
            ['name' => 'in construction'],
            ['name' => 'new'],
            ['name' => 'project'],
        ];

        foreach ($data as $PhyState) {
            PhyState::create($PhyState);
        }
    }
}
