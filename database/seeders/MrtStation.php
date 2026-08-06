<?php

namespace Database\Seeders;

use App\Models\MrtStation as ModelsMrtStation;
use App\Models\MrtTrains;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MrtStation extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mrt = [
            [
                'name' => 'Lebak Bulus Grab'
            ],
            [
                'name' => 'Fatmawati Indomaret'
            ],
            [
                'name' => 'Cipete Raya'
            ],
            [
                'name' => 'Haji Nawi'
            ],
            [
                'name' => 'Blok A'
            ],
            [
                'name' => 'Blok M BCA'
            ],
            [
                'name' => 'ASEAN'
            ],
            [
                'name' => 'Senayan'
            ],
            [
                'name' => 'Istora Mandiri'
            ],
            [
                'name' => 'Bendungan Hilir'
            ],
            [
                'name' => 'Setiabudi Astra'
            ],
            [
                'name' => 'Dukuh Atas BNI'
            ],
            [
                'name' => 'Bundaran HI Bank DKI'
            ],
        ];

        foreach($mrt as $a) {
            ModelsMrtStation::create([
                'name' => $a['name']
            ]);
        }
    }
}
