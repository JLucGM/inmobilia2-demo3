<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Seeder;

class PrioritiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $priorities = [
        ['name' => 'low'],
        ['name' => 'medium'],
        ['name' => 'high'],
    ];
    
    foreach ($priorities as $priority) {
        Priority::create($priority);
    } 
    }
}
