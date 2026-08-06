<?php

namespace Database\Seeders;

use App\Models\BusRoute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusStation extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $route = [
            [
                'halte_awal' => 'Pulogadung',
                'halte_alhir' => 'Galunggung',
                'kode' => '4'
            ],
            [
                'halte_awal' => 'Pulogadung',
                'halte_alhir' => 'Kuningan',
                'kode' => '4D'
            ],
            [
                'halte_awal' => 'Blok M',
                'halte_alhir' => 'Kota',
                'kode' => '1'
            ],
            [
                'halte_awal' => 'Lebak Bulus',
                'halte_alhir' => 'Ps. Baru',
                'kode' => '8'
            ],
            [
                'halte_awal' => 'Pulogadung',
                'halte_alhir' => 'Monas',
                'kode' => '2'
            ],
            [
                'halte_awal' => 'Cililitan',
                'halte_alhir' => 'Juanda',
                'kode' => '5C'
            ],
            [
                'halte_awal' => 'Damai',
                'halte_alhir' => 'Kota',
                'kode' => '3H'
            ],
            [
                'halte_awal' => 'Kalideres',
                'halte_alhir' => 'Senayan Bank Jkt',
                'kode' => '3F'
            ],
            [
                'halte_awal' => 'Ragunan',
                'halte_alhir' => 'Senayan Bank Jkt',
                'kode' => '6V'
            ],
            [
                'halte_awal' => 'Ragunan',
                'halte_alhir' => 'Galunggung',
                'kode' => '6'
            ],
            [
                'halte_awal' => 'Tj. Priok',
                'halte_alhir' => 'PGC',
                'kode' => '10'
            ],
            [
                'halte_awal' => 'Cililitan',
                'halte_alhir' => 'Grogol',
                'kode' => '9A'
            ],
            [
                'halte_awal' => 'Tj. Priok',
                'halte_alhir' => 'Bundaran Senayan',
                'kode' => '10H'
            ],
            [
                'halte_awal' => 'Pinang Ranti',
                'halte_alhir' => 'Bundaran Senayan',
                'kode' => '9C'
            ],
            [
                'halte_awal' => 'JIS',
                'halte_alhir' => 'Senen',
                'kode' => '14'
            ],
            [
                'halte_awal' => 'Pinang Ranti',
                'halte_alhir' => 'Simpang Cawang',
                'kode' => '9N'
            ],
            [
                'halte_awal' => 'Puri Beta',
                'halte_alhir' => 'Pancoran',
                'kode' => '13B'
            ],
            [
                'halte_awal' => 'Kp. Melayu',
                'halte_alhir' => 'Ancol',
                'kode' => '5'
            ],
            [
                'halte_awal' => 'Kp. Melayu',
                'halte_alhir' => 'Kp. Rambutan',
                'kode' => '7'
            ],
            [
                'halte_awal' => 'Pulogebang',
                'halte_alhir' => 'Kp. Melayu',
                'kode' => '11'
            ],
        ];

        foreach($route as $bus) {
            BusRoute::create([
                'halte_awal' => $bus['halte_awal'],
                'halte_akhir' => $bus['halte_alhir'],
                'kode' => $bus['kode']
            ]);
        }
    }
}
