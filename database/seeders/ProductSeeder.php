<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'category_id' => 1,
            'name' => 'Coldest Bunny',
            'description' => 'a little cold bunny who wants your kindness',
            'cost' => 30.25,
            'price' => 50.5
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Delicius Bunny',
            'description' => 'the bunnies are friends, not food. Please don\'t eat it',
            'cost' => 35.25,
            'price' => 55.5
        ]);
    }
}
