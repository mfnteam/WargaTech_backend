<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctor = [
            [
        'doctor_name' => 'Prastowo Sidi Pramono',
        'type' => 'anak',
        'location' => 'Rumah Sakit Islam, Jl. Cemp. Putih Tengah I No.01, Jakarta Pusat',
        'open_time' => '00:00',
        'close_time' => '23:59'
    ],
    [
        'doctor_name' => 'dr. Andi Saputra',
        'type' => 'umum',
        'location' => 'RS Mitra Keluarga, Jl. Raya Bekasi No.88, Jakarta Timur',
        'open_time' => '08:00',
        'close_time' => '16:00'
    ],
    [
        'doctor_name' => 'dr. Budi Santoso',
        'type' => 'bedah',
        'location' => 'RS Hermina Kemayoran, Jakarta Pusat',
        'open_time' => '09:00',
        'close_time' => '17:00'
    ],
    [
        'doctor_name' => 'dr. Citra Lestari',
        'type' => 'jantung',
        'location' => 'RS Harapan Kita, Jakarta Barat',
        'open_time' => '07:00',
        'close_time' => '15:00'
    ],
    [
        'doctor_name' => 'dr. Dimas Wijaya',
        'type' => 'anak',
        'location' => 'RSUD Pasar Minggu, Jakarta Selatan',
        'open_time' => '08:00',
        'close_time' => '14:00'
    ],
    [
        'doctor_name' => 'dr. Eka Prasetyo',
        'type' => 'umum',
        'location' => 'RS Fatmawati, Jakarta Selatan',
        'open_time' => '07:00',
        'close_time' => '15:00'
    ],
    [
        'doctor_name' => 'dr. Fitri Handayani',
        'type' => 'bedah',
        'location' => 'RS Persahabatan, Jakarta Timur',
        'open_time' => '10:00',
        'close_time' => '18:00'
    ],
    [
        'doctor_name' => 'dr. Guntur Mahendra',
        'type' => 'jantung',
        'location' => 'RS Premier Jatinegara, Jakarta Timur',
        'open_time' => '08:00',
        'close_time' => '16:00'
    ],
    [
        'doctor_name' => 'dr. Hendra Kurniawan',
        'type' => 'anak',
        'location' => 'RS Siloam Kebon Jeruk, Jakarta Barat',
        'open_time' => '09:00',
        'close_time' => '17:00'
    ],
    [
        'doctor_name' => 'dr. Indah Permata',
        'type' => 'umum',
        'location' => 'RS Pelni, Jakarta Barat',
        'open_time' => '07:00',
        'close_time' => '15:00'
    ],
    [
        'doctor_name' => 'dr. Joko Prabowo',
        'type' => 'bedah',
        'location' => 'RS Cipto Mangunkusumo, Jakarta Pusat',
        'open_time' => '08:00',
        'close_time' => '16:00'
    ],
    [
        'doctor_name' => 'dr. Kartika Sari',
        'type' => 'jantung',
        'location' => 'RSUP Nasional Dr. Cipto Mangunkusumo, Jakarta Pusat',
        'open_time' => '09:00',
        'close_time' => '17:00'
    ],
    [
        'doctor_name' => 'dr. Laila Nuraini',
        'type' => 'anak',
        'location' => 'RS Bhayangkara Tk. I R. Said Sukanto, Jakarta Timur',
        'open_time' => '08:00',
        'close_time' => '16:00'
    ],
    [
        'doctor_name' => 'dr. Muhammad Rizki',
        'type' => 'umum',
        'location' => 'RS Tebet, Jakarta Selatan',
        'open_time' => '08:00',
        'close_time' => '20:00'
    ],
    [
        'doctor_name' => 'dr. Nabila Putri',
        'type' => 'bedah',
        'location' => 'RS Mayapada, Jakarta Selatan',
        'open_time' => '10:00',
        'close_time' => '18:00'
    ],
    [
        'doctor_name' => 'dr. Oscar Halim',
        'type' => 'jantung',
        'location' => 'RS Pondok Indah, Jakarta Selatan',
        'open_time' => '08:00',
        'close_time' => '16:00'
    ],
    [
        'doctor_name' => 'dr. Putri Maharani',
        'type' => 'anak',
        'location' => 'RSUD Koja, Jakarta Utara',
        'open_time' => '07:00',
        'close_time' => '15:00'
    ],
    [
        'doctor_name' => 'dr. Qori Amalia',
        'type' => 'umum',
        'location' => 'RS Pluit, Jakarta Utara',
        'open_time' => '09:00',
        'close_time' => '17:00'
    ],
    [
        'doctor_name' => 'dr. Rafi Hidayat',
        'type' => 'bedah',
        'location' => 'RS Royal Taruma, Jakarta Barat',
        'open_time' => '08:00',
        'close_time' => '16:00'
    ],
    [
        'doctor_name' => 'dr. Siska Amelia',
        'type' => 'jantung',
        'location' => 'RS MMC, Jakarta Selatan',
        'open_time' => '09:00',
        'close_time' => '17:00'
    ],
    [
        'doctor_name' => 'dr. Taufik Hidayat',
        'type' => 'anak',
        'location' => 'RSUD Tarakan, Jakarta Pusat',
        'open_time' => '08:00',
        'close_time' => '16:00'
    ],
    [
        'doctor_name' => 'dr. Umi Rahmawati',
        'type' => 'umum',
        'location' => 'RS Kramat 128, Jakarta Pusat',
        'open_time' => '07:00',
        'close_time' => '15:00'
    ],
    [
        'doctor_name' => 'dr. Vina Melati',
        'type' => 'psikolog',
        'location' => 'RS Columbia Asia Pulomas, Jakarta Timur',
        'open_time' => '09:00',
        'close_time' => '17:00'
    ],
    [
        'doctor_name' => 'dr. Wahyu Nugroho',
        'type' => 'jantung',
        'location' => 'RS Jantung Jakarta, Jakarta Timur',
        'open_time' => '08:00',
        'close_time' => '16:00'
    ],
    [
        'doctor_name' => 'dr. Yuni Astuti',
        'type' => 'anak',
        'location' => 'RSU Bunda Jakarta, Jakarta Pusat',
        'open_time' => '08:00',
        'close_time' => '14:00'
    ],
    [
        'doctor_name' => 'dr. Zaki Firmansyah',
        'type' => 'psikolog',
        'location' => 'RS Islam Jakarta Pondok Kopi, Jakarta Timur',
        'open_time' => '07:00',
        'close_time' => '15:00'
    ],
    [
        'doctor_name' => 'dr. Agung Prasetya',
        'type' => 'psikolog',
        'location' => 'RS Omni Pulomas, Jakarta Timur',
        'open_time' => '10:00',
        'close_time' => '18:00'
    ],
    [
        'doctor_name' => 'dr. Bella Oktaviani',
        'type' => 'jantung',
        'location' => 'RS Medistra, Jakarta Selatan',
        'open_time' => '09:00',
        'close_time' => '17:00'
    ],
    [
        'doctor_name' => 'dr. Cahyo Wibowo',
        'type' => 'anak',
        'location' => 'RS Yadika Kebayoran Lama, Jakarta Selatan',
        'open_time' => '08:00',
        'close_time' => '16:00'
    ],
    [
        'doctor_name' => 'dr. Dewi Lestari',
        'type' => 'umum',
        'location' => 'RS Haji Jakarta, Jakarta Timur',
        'open_time' => '08:00',
        'close_time' => '20:00'
    ],
    [
        'doctor_name' => 'dr. Eko Pramono',
        'type' => 'psikolog',
        'location' => 'RS Atma Jaya, Jakarta Utara',
        'open_time' => '09:00',
        'close_time' => '17:00'
    ],
    [
        'doctor_name' => 'dr. Farah Nabila',
        'type' => 'jantung',
        'location' => 'RS Pusat Pertamina, Jakarta Selatan',
        'open_time' => '08:00',
        'close_time' => '16:00'
    ],
    [
        'doctor_name' => 'dr. Gilang Ramadhan',
        'type' => 'anak',
        'location' => 'RSUD Cengkareng, Jakarta Barat',
        'open_time' => '07:00',
        'close_time' => '15:00'
    ],
    [
        'doctor_name' => 'dr. Hana Safitri',
        'type' => 'umum',
        'location' => 'RSUD Kalideres, Jakarta Barat',
        'open_time' => '08:00',
        'close_time' => '16:00'
    ],
    [
        'doctor_name' => 'dr. Imam Setiawan',
        'type' => 'bedah',
        'location' => 'RS Mitra Kemayoran, Jakarta Pusat',
        'open_time' => '09:00',
        'close_time' => '17:00'
    ],
    [
        'doctor_name' => 'dr. Jasmine Putri',
        'type' => 'jantung',
        'location' => 'RS UKI, Jakarta Timur',
        'open_time' => '08:00',
        'close_time' => '16:00'
    ],
    [
        'doctor_name' => 'dr. Kevin Adrian',
        'type' => 'anak',
        'location' => 'RSIA Bunda Aliyah, Jakarta Timur',
        'open_time' => '08:00',
        'close_time' => '15:00'
    ],
    [
        'doctor_name' => 'dr. Lina Marlina',
        'type' => 'umum',
        'location' => 'RS Kartika Pulomas, Jakarta Timur',
        'open_time' => '07:00',
        'close_time' => '15:00'
    ],
    [
        'doctor_name' => 'dr. Miftahul Arif',
        'type' => 'bedah',
        'location' => 'RS Gandaria, Jakarta Selatan',
        'open_time' => '10:00',
        'close_time' => '18:00'
    ],
    [
        'doctor_name' => 'dr. Nanda Puspita',
        'type' => 'jantung',
        'location' => 'RS Dharmais, Jakarta Barat',
        'open_time' => '09:00',
        'close_time' => '17:00'
    ],
    [
        'doctor_name' => 'dr. Oki Saputri',
        'type' => 'anak',
        'location' => 'RS Hermina Daan Mogot, Jakarta Barat',
        'open_time' => '08:00',
        'close_time' => '16:00'
    ],
    [
        'doctor_name' => 'dr. Prima Kurnia',
        'type' => 'umum',
        'location' => 'RS Sumber Waras, Jakarta Barat',
        'open_time' => '07:00',
        'close_time' => '15:00'
    ],
    [
        'doctor_name' => 'dr. Rahmat Gunawan',
        'type' => 'psikolog',
        'location' => 'RS Jakarta Medical Center, Jakarta Selatan',
        'open_time' => '08:00',
        'close_time' => '16:00'
    ],
    [
        'doctor_name' => 'dr. Santi Wulandari',
        'type' => 'jantung',
        'location' => 'RS Mitra Kemayoran, Jakarta Pusat',
        'open_time' => '09:00',
        'close_time' => '17:00'
    ],
    [
        'doctor_name' => 'dr. Teguh Saptono',
        'type' => 'anak',
        'location' => 'RS Cengkareng, Jakarta Barat',
        'open_time' => '08:00',
        'close_time' => '16:00'
    ],
    [
        'doctor_name' => 'dr. Ulfa Khairunnisa',
        'type' => 'umum',
        'location' => 'RS Husada, Jakarta Pusat',
        'open_time' => '07:00',
        'close_time' => '15:00'
    ],
    [
        'doctor_name' => 'dr. Vicky Ramadhan',
        'type' => 'bedah',
        'location' => 'RS Islam Jakarta Cempaka Putih, Jakarta Pusat',
        'open_time' => '08:00',
        'close_time' => '16:00'
    ],
    [
        'doctor_name' => 'dr. Wulan Anggraini',
        'type' => 'jantung',
        'location' => 'RS Premier Bintaro, Tangerang Selatan',
        'open_time' => '09:00',
        'close_time' => '17:00'
    ],
    [
        'doctor_name' => 'dr. Yoga Firmansyah',
        'type' => 'psikolog',
        'location' => 'RS EMC Tangerang, Tangerang',
        'open_time' => '08:00',
        'close_time' => '16:00'
    ],
    [
        'doctor_name' => 'dr. Zahra Aulia',
        'type' => 'umum',
        'location' => 'RS Eka Hospital BSD, Tangerang Selatan',
        'open_time' => '07:00',
        'close_time' => '15:00'
    ]
        ];

    foreach($doctor as $dct) {
        Service::create([
            'doctor_name' => $dct['doctor_name'],
            'type' => $dct['type'],
            'location' => $dct['location'],
            'open_time' => $dct['open_time'],
            'close_time' => $dct['close_time']
        ]);
    }
    }
}
