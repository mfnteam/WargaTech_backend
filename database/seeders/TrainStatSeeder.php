<?php

namespace Database\Seeders;

use App\Models\TrainStation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainStatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $redline = [
            [
                'name' => 'Bogor'
            ],
            [
                'name' => 'Cilebut'
            ],
            [
                'name' => 'Bojonggede'
            ],
            [
                'name' => 'Citayam'
            ],
            [
                'name' => 'Depok'
            ],
            [
                'name' => 'Depok Baru'
            ],
            [
                'name' => 'Pondok Cina'
            ],
            [
                'name' => 'Universitas Indonesia'
            ],
            [
                'name' => 'Universitas Pancasila'
            ],
            [
                'name' => 'Lenteng Agung'
            ],
            [
                'name' => 'Tanjung Barat'
            ],
            [
                'name' => 'Pasar Minggu'
            ],
            [
                'name' => 'Pasar Minggu Baru'
            ],
            [
                'name' => 'Duren Kalibata'
            ],
            [
                'name' => 'Cawang'
            ],
            [
                'name' => 'Tebet'
            ],
            [
                'name' => 'Manggarai'
            ],
            [
                'name' => 'Cikini'
            ],
            [
                'name' => 'Gondangdia'
            ],
            [
                'name' => 'Juanda'
            ],
            [
                'name' => 'Sawah Besar'
            ],
            [
                'name' => 'Mangga Besar'
            ],
            [
                'name' => 'Jayakarta'
            ],
            [
                'name' => 'Jakarta Kota'
            ],
            [
                'name' => 'Cibinong'
            ],
            [
                'name' => 'Nambo'
            ],
            [
                'name' => 'Pondok Rajeg'
            ]
        ];

        $blueline = [
            [
                'name' => 'Cikarang'
            ],
            [
                'name' => 'Metland Telaga Murni'
            ],
            [
                'name' => 'Cibitung'
            ],
            [
                'name' => 'Tambun'
            ],
            [
                'name' => 'Bekasi Timur'
            ],
            [
                'name' => 'Bekasi'
            ],
            [
                'name' => 'Kranji'
            ],
            [
                'name' => 'Cakung'
            ],
            [
                'name' => 'Klender Baru'
            ],
            [
                'name' => 'Buaran'
            ],
            [
                'name' => 'Klender'
            ],
            [
                'name' => 'Jatinegara'
            ],
            [
                'name' => 'Pondok Jati'
            ],
            [
                'name' => 'Kramat'
            ],
            [
                'name' => 'Gang Sentiong'
            ],
            [
                'name' => 'Pasar Senen'
            ],
            [
                'name' => 'Kemayoran'
            ],
            [
                'name' => 'Rajawali'
            ],
            [
                'name' => 'Kampung Bandan'
            ],
            [
                'name' => 'Matraman'
            ],
            [
                'name' => 'Sudirman'
            ],
            [
                'name' => 'Sudirman Baru'
            ],
            [
                'name' => 'Karet'
            ],
            [
                'name' => 'Tanah Abang'
            ],
            [
                'name' => 'Duri'
            ],
            [
                'name' => 'Angke'
            ],
        ];

        foreach($blueline as $st) {
            TrainStation::create([
                'name' => $st['name']
            ]);
        }
    }
}
