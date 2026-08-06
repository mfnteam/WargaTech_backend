<?php

namespace Database\Seeders;

use App\Models\LrtStation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LrtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jakarta = [
            [
                'name' => 'Pegangsaan Dua'
            ],
            [
                'name' => 'Boulevard Utara'
            ],
            [
                'name' => 'Boulevard Selatan'
            ],
            [
                'name' => 'Pulomas'
            ],
            [
                'name' => 'Equistrian'
            ],
            [
                'name' => 'Velodrome'
            ],
            [
                'name' => 'Rawamangun'
            ],
            [
                'name' => 'Pramuka BPKP'
            ],
            [
                'name' => 'Pasar Pramuka'
            ],
            [
                'name' => 'Matraman'
            ],
            [
                'name' => 'Manggarai'
            ],
        ];

        $jabodebek = [
            [
                'name' => 'Dukuh Atas'
            ],
            [
                'name' => 'Setiabudi'
            ],
            [
                'name' => 'Rasuna Said'
            ],
            [
                'name' => 'Kuningan'
            ],
            [
                'name' => 'Pancoran'
            ],
            [
                'name' => 'Cikoko'
            ],
            [
                'name' => 'Ciliwung'
            ],
            [
                'name' => 'Cawang'
            ],
            [
                'name' => 'Halim'
            ],
            [
                'name' => 'Jati Bening Baru'
            ],
            [
                'name' => 'Cikunir 1'
            ],
            [
                'name' => 'Cikunir 2'
            ],
            [
                'name' => 'Bekasi Barat'
            ],
            [
                'name' => 'Jati Mulya'
            ],
            [
                'name' => 'TMII'
            ],
            [
                'name' => 'Kampung Rambutan'
            ],
            [
                'name' => 'Ciracas'
            ],
            [
                'name' => 'Harjamukti'
            ]
        ];


        foreach($jabodebek as $lrt) {
            LrtStation::create([
                'name' => $lrt['name']
            ]);
        }
    }
}
