<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['name' => 'Aguascalientes', 'state_id' => 1],
            ['name' => 'Calvillo', 'state_id' => 1],
            ['name' => 'Mexicali', 'state_id' => 2],
            ['name' => 'Ensenada', 'state_id' => 2],
            ['name' => 'La Paz', 'state_id' => 3],
            ['name' => 'Cabo San Lucas', 'state_id' => 3],
            ['name' => 'Campeche', 'state_id' => 4],
            ['name' => 'Ciudad del Carmen', 'state_id' => 4],
            ['name' => 'Tuxtla Gutierrez', 'state_id' => 5],
            ['name' => 'San Cristóbal de las Casas', 'state_id' => 5],
            ['name' => 'Chihuahua', 'state_id' => 6],
            ['name' => 'Ciudad Juárez', 'state_id' => 6],
            ['name' => 'Ciudad de México', 'state_id' => 7],
            ['name' => 'Tlalnepantla', 'state_id' => 7],
            ['name' => 'Saltillo', 'state_id' => 8],
            ['name' => 'Torreón', 'state_id' => 8],
            ['name' => 'Colima', 'state_id' => 9],
            ['name' => 'Manzanillo', 'state_id' => 9],
            ['name' => 'Durango', 'state_id' => 10],
            ['name' => 'Gómez Palacio', 'state_id' => 10],
            ['name' => 'Toluca', 'state_id' => 11],
            ['name' => 'Naucalpan', 'state_id' => 11],
            ['name' => 'Guanajuato', 'state_id' => 12],
            ['name' => 'León', 'state_id' => 12],
            ['name' => 'Chilpancingo', 'state_id' => 13],
            ['name' => 'Acapulco', 'state_id' => 13],
            ['name' => 'Pachuca', 'state_id' => 14],
            ['name' => 'Tulancingo', 'state_id' => 14],
            ['name' => 'Guadalajara', 'state_id' => 15],
            ['name' => 'Zapopan', 'state_id' => 15],
            ['name' => 'Morelia', 'state_id' => 16],
            ['name' => 'Uruapan', 'state_id' => 16],
            ['name' => 'Cuernavaca', 'state_id' => 17],
            ['name' => 'Tepoztlán', 'state_id' => 17],
            ['name' => 'Tepic', 'state_id' => 18],
            ['name' => 'Bahía de Banderas', 'state_id' => 18],
            ['name' => 'Monterrey', 'state_id' => 19],
            ['name' => 'San Pedro Garza García', 'state_id' => 19],
            ['name' => 'Oaxaca', 'state_id' => 20],
            ['name' => 'Huajuapan de León', 'state_id' => 20],
            ['name' => 'Puebla', 'state_id' => 21],
            ['name' => 'Cholula', 'state_id' => 21],
            ['name' => 'Santiago de Querétaro', 'state_id' => 22],
            ['name' => 'San Juan del Río', 'state_id' => 22],
            ['name' => 'Cancún', 'state_id' => 23],
            ['name' => 'Playa del Carmen', 'state_id' => 23],
            ['name' => 'San Luis Potosí', 'state_id' => 24],
            ['name' => 'Ciudad Valles', 'state_id' => 24],
            ['name' => 'Culiacán', 'state_id' => 25],
            ['name' => 'Mazatlán', 'state_id' => 25],
            ['name' => 'Hermosillo', 'state_id' => 26],
            ['name' => 'Guaymas', 'state_id' => 26],
            ['name' => 'Villahermosa', 'state_id' => 27],
            ['name' => 'Cárdenas', 'state_id' => 27],
            ['name' => 'Ciudad Victoria', 'state_id' => 28],
            ['name' => 'Tampico', 'state_id' => 28],
            ['name' => 'Tlaxcala', 'state_id' => 29],
            ['name' => 'Apizaco', 'state_id' => 29],
            ['name' => 'Xalapa', 'state_id' => 30],
            ['name' => 'Veracruz', 'state_id' => 30],
            ['name' => 'Mérida', 'state_id' => 31],
            ['name' => 'Progreso', 'state_id' => 31],
            ['name' => 'Zacatecas', 'state_id' => 32],
            ['name' => 'Guadalupe', 'state_id' => 32],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
