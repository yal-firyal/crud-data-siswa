<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $siswas = [
            [
                'nama' => 'Rizky Khapidsyah',
                'nis' => '1234567890',
            ],
            [
                'nama' => 'Rizky Khapidsyah',
                'nis' => '1234567890',
            ]
        ];

        foreach ($siswas as $siswa) {
            \App\Models\Siswa::create($siswa);
        }
    }
}
