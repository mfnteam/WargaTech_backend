<?php

namespace Database\Seeders;

use App\Models\Trackway;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trackway::create([
            'track_name' => 'nambo-jakarta',
            'station_passed' => '26,25,27,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24',
            'travel_time' => '0,11,3,10,6,4,2,4,3,1,2,7,3,1,2,2,5,2,2,7,1,1,6,3'
        ]);
    }
}
