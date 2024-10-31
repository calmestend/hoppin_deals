<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = [
            ['address_id' => 1],
            ['address_id' => 2],
            ['address_id' => 3],
        ];

        foreach ($branches as $branch) {
            Branch::create($branch);
        }
    }
}
