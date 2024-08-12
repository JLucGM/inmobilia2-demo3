<?php

namespace Database\Seeders;

use App\Models\CustomerType;
use Illuminate\Database\Seeder;

class CustomerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customertype = [
            ['name' => 'buyer',],            
            ['name' => 'seller',],            
            ['name' => 'lessor',],            
            ['name' => 'tenant',],            
            ['name' => 'owner',],            
            ['name' => 'commission agent',],            
            ['name' => 'searching',],            
            ['name' => 'web contact',],            
            ['name' => 'co-debtor',],            
            ['name' => 'administrator',],            
            ['name' => 'tenant',],            
            ['name' => 'important contact',],                       
        ];

        foreach ($customertype as $customertypeData) {
            CustomerType::create($customertypeData);
        }
    }
}
