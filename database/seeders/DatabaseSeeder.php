<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            StateSeeder::class,
            CitySeeder::class,
            AddressSeeder::class,
            BranchSeeder::class,
            RoleSeeder::class,
            UserSeeder::class
        ]);

        Admin::create(['user_id' => 2]);
    }
}
