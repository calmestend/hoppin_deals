<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $addresses = [
          ['neighborhood' => 'Centro', 'zip_code' => '20000', 'street' => 'Calle 1', 'number' => '100', 'city_id' => 1],
          ['neighborhood' => 'La Huerta', 'zip_code' => '20010', 'street' => 'Calle 2', 'number' => '101', 'city_id' => 2],
          ['neighborhood' => 'Las Flores', 'zip_code' => '21000', 'street' => 'Avenida 3', 'number' => '102', 'city_id' => 3],
          ['neighborhood' => 'Corindios', 'zip_code' => '76150', 'street' => 'Benito Juarez', 'number' => '1513', 'city_id' => 23]
        ];

        foreach ($addresses as $address) {
            Address::create($address);
        }
    }
}
