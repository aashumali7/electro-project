<?php

namespace Database\Seeders;

use App\Models\Seller;
use Illuminate\Database\Seeder;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Seller::insert([
            [
               'seller_name'=>'Supreme Electronic'
            ],
            [
               'seller_name'=>'Ezig'
            ],
            [
               'seller_name'=>'HP'
            ],
            [
               'seller_name'=>'Apple'
            ],
        ]);
    }
}
