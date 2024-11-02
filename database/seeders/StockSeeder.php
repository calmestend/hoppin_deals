<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stock::create([
            'branch_id' => 1,
            'product_id' => 1,
            'quantity' => 10
        ]);

        Stock::create([
            'branch_id' => 2,
            'product_id' => 1,
            'quantity' => 15
        ]);

        Stock::create([
            'branch_id' => 1,
            'product_id' => 2,
            'quantity' => 15
        ]);

        Stock::create([
            'branch_id' => 2,
            'product_id' => 2,
            'quantity' => 15
        ]);
    }
}
