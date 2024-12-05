<?php

namespace Database\Seeders;

use App\Models\Station;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stations = [
            [
                'id' => 1,
                'name' => 'Carabobo Gas C.A.',
                'location' => '2035, Tocuyito 0241, Carabobo',
                'latitude' => 10.0848,
                'longitude' => -68.0371,
                'contact_number' => '04144102449',
                'responsible_person' => 'Carlos Pérez',
                'days_available' => 'Monday,Tuesday,Wednesday,Thursday,Friday',
                'opening_time' => '09:00:00',
                'closing_time' => '17:00:00',
                'active' => true,
                'code' => '3WQ4HG'
            ],
            [
                'id' => 2,
                'name' => 'Micro Llenadero Dracula Socorro',
                'location' => '4WHX+GH5, Valencia 2001, Carabobo',
                'latitude' => 10.1685,
                'longitude' => -68.0021,
                'contact_number' => null,
                'responsible_person' => 'Ana González',
                'days_available' => 'Monday,Tuesday,Wednesday,Thursday,Friday',
                'opening_time' => '09:00:00',
                'closing_time' => '17:00:00',
                'active' => true,
                'code' => '4WHXGH5'
            ],
            [
                'id' => 3,
                'name' => 'Gasdracula',
                'location' => '5X36+676, Av principal, Valencia 2001, Carabobo',
                'latitude' => 10.1723,
                'longitude' => -68.0167,
                'contact_number' => null,
                'responsible_person' => 'Luis Rodríguez',
                'days_available' => 'Monday,Tuesday,Wednesday,Thursday,Friday',
                'opening_time' => '09:00:00',
                'closing_time' => '17:00:00',
                'active' => true,
                'code' => '5X36G676'
            ],
            [
                'id' => 4,
                'name' => 'Micro llenadero de Gas Dracula',
                'location' => '4XRG+4W9, Valencia 2001, Carabobo',
                'latitude' => 10.1634,
                'longitude' => -68.0164,
                'contact_number' => null,
                'responsible_person' => 'Pedro Martínez',
                'days_available' => 'Monday,Tuesday,Wednesday,Thursday,Friday',
                'opening_time' => '09:00:00',
                'closing_time' => '17:00:00',
                'active' => true,
                'code' => '4XRG4W9'
            ],
            [
                'id' => 5,
                'name' => 'Llenadero De Gas',
                'location' => '42Q6+C3W, Valencia 2001, Carabobo',
                'latitude' => 10.1733,
                'longitude' => -68.0073,
                'contact_number' => null,
                'responsible_person' => 'Sofía Ramírez',
                'days_available' => 'Monday,Tuesday,Wednesday,Thursday,Friday',
                'opening_time' => '09:00:00',
                'closing_time' => '17:00:00',
                'active' => true,
                'code' => '42Q6C3W'
            ],
            [
                'id' => 6,
                'name' => 'PDVSA Gas Comunal',
                'location' => '5XGV+78P, Av. Soublette, entre y Cantaura, C.C. Profesional Center, PB., Calle Silva, Valencia, Carabobo',
                'latitude' => 10.1567,
                'longitude' => -67.9774,
                'contact_number' => null,
                'responsible_person' => 'María Fernández',
                'days_available' => 'Monday,Tuesday,Wednesday,Thursday,Friday',
                'opening_time' => '09:00:00',
                'closing_time' => '17:00:00',
                'active' => true,
                'code' => '5XGV78P'
            ],
            [
                'id' => 7,
                'name' => 'Planta De Llenado Negra Hipolita (Gas Dracula)',
                'location' => '7 Trans. 8, Valencia 2003, Carabobo',
                'latitude' => 10.1956,
                'longitude' => -67.9689,
                'contact_number' => null,
                'responsible_person' => 'Javier López',
                'days_available' => 'Monday,Tuesday,Wednesday,Thursday,Friday',
                'opening_time' => '09:00:00',
                'closing_time' => '17:00:00',
                'active' => true,
                'code' => '7Trans8'
            ],
            [
                'id' => 8,
                'name' => 'Llenadero de Guaparo',
                'location' => '6XHR+CWQ, Av. La Hispanidad, Naguanagua 2005, Carabobo',
                'latitude' => 10.1744,
                'longitude' => -67.9608,
                'contact_number' => null,
                'responsible_person' => 'Gabriela Torres',
                'days_available' => 'Monday,Tuesday,Wednesday,Thursday,Friday',
                'opening_time' => '09:00:00',
                'closing_time' => '17:00:00',
                'active' => true,
                'code' => '6XHRCWQ'
            ],
            [
                'id' => 9,
                'name' => 'PDVSA GAS',
                'location' => '638W+436, Guacara 2015, Carabobo',
                'latitude' => 10.1819,
                'longitude' => -67.9055,
                'contact_number' => null,
                'responsible_person' => 'Fernando Gómez',
                'days_available' => 'Monday,Tuesday,Wednesday,Thursday,Friday',
                'opening_time' => '09:00:00',
                'closing_time' => '17:00:00',
                'active' => true,
                'code' => '638W436'
            ],
            [
                'id' => 10,
                'name' => 'AUTOGAS LLENADERO PDVSA',
                'location' => '63RP+G54, Variante Yagua, Guacara 2015, Carabobo',
                'latitude' => 10.2422,
                'longitude' => -67.8882,
                'contact_number' => null,
                'responsible_person' => 'Elena Pérez',
                'days_available' => 'Monday,Tuesday,Wednesday,Thursday,Friday',
                'opening_time' => '09:00:00',
                'closing_time' => '17:00:00',
                'active' => true,
                'code' => '63RPG54'
            ],
            [
                'id' => 11,
                'name' => 'Planta Yagua PDVSA',
                'location' => '732M+5F, Guacara 2015, Carabobo',
                'latitude' => 10.2355,
                'longitude' => -67.8796,
                'contact_number' => null,
                'responsible_person' => 'Luis Torres',
                'days_available' => 'Monday,Tuesday,Wednesday,Thursday,Friday',
                'opening_time' => '09:00:00',
                'closing_time' => '17:00:00',
                'active' => true,
                'code' => '732M5F'
            ],
            [
                'id' => 12,
                'name' => 'Centro de llenado de gas',
                'location' => '64W6+7QW, Guacara 2015, Carabobo',
                'latitude' => 10.2323,
                'longitude' => -67.8703,
                'contact_number' => null,
                'responsible_person' => 'Carlos Herrera',
                'days_available' => 'Monday,Tuesday,Wednesday,Thursday,Friday',
                'opening_time' => '09:00:00',
                'closing_time' => '17:00:00',
                'active' => true,
                'code' => '64W67QW'
            ],
            [
                'id' => 13,
                'name' => 'Llenadero De Gas Comunal PDVSA Turmero',
                'location' => '6FH4+4R, Turmero, Aragua',
                'latitude' => 10.2276,
                'longitude' => -67.5681,
                'contact_number' => '08002662662',
                'responsible_person' => 'Ricardo López',
                'days_available' => 'Monday,Tuesday,Wednesday,Thursday,Friday',
                'opening_time' => '09:00:00',
                'closing_time' => '17:00:00',
                'active' => true,
                'code' => '6FH44R'
            ]
        ];

        // DB::table('stations')->insert($stations);


        foreach ($stations as $station) {
            $stationx = Station::create( $station );
            echo $stationx . "STATIONS";
        }


    }
}
