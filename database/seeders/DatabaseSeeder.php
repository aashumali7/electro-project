<?php

namespace Database\Seeders;

use App\Models\SystemInfo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Aashu',
            'surname' => 'Mali',
            'email' => 'Aashish2@gmail.com',
            'password' => 'Aashish2@gmail.com',
            'role' => 'admin'
        ]);
        
        //elequent orm method
        SystemInfo::insert([
            [
                'meta_name'=>'app_name',
                'meta_value'=>'Flipkart'
            ],
            [
                'meta_name'=>'app_logo',
                'meta_value'=>'https://brandslogos.com/wp-content/uploads/images/large/flipkart-logo.png'
            ],
            [
                'meta_name'=>'app_version',
                'meta_value'=>'1.0.0'
            ]
        ]);
    }
}
