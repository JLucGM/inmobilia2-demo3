<?php

namespace Database\Seeders;

use App\Models\Origin;
use Illuminate\Database\Seeder;

class OriginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $origin = [
            ['name' => 'no means',],                      
        ];

        foreach ($origin as $originData) {
            Origin::create($originData);
        }
    }
    }
