<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Client;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            StateSeeder::class,
            CitySeeder::class,
            AddressSeeder::class,
            BranchSeeder::class,
            StockSeeder::class,
            RoleSeeder::class,
            UserSeeder::class
        ]);

        Admin::create(['user_id' => 2]);
        Client::create([
            'user_id' => 1,
            'address_id' => 4,
            'rfc' => 'MELM8305281HO'
        ]);
    }
}
