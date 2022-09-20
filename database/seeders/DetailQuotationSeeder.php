<?php

namespace Database\Seeders;

use App\Models\DetailQuotation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DetailQuotationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetailQuotation::create([
            'lokasi' => 'Dalam Kota',
            'kode_warna' => 'Sand  Dark Brown',
            'kode_item' => 'ASTRAL',
            'kode_tipe' => 'AP',
            'kode_tipe' => 100,
        ]);

        DetailQuotation::create([
            'lokasi' => 'Luar Kota',
            'kode_warna' => 'Sand  Dark Brown',
            'kode_item' => 'ASTRAL',
            'kode_tipe' => 'AS',
            'kode_tipe' => 124,
        ]);
    }
}
