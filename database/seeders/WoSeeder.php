<?php

namespace Database\Seeders;

use App\Models\Wo;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wo::create([
            'fppp_id' => 1,
            'tgl_terima_fppp' => Carbon::parse('2022-08-01'),
            'finish_qc' => Carbon::parse('2022-08-01'),
            'kode_unit' => 'W01A.1',
            'tipe_barang' => 'ASTRAL AP 01 FIXED WINDOW (SG-RB)',
            'tujuan' => 'Dalam Kota',
            'warna' => 'Sand  Dark Brown',
            'qty' => 50,
            'qty_pack' => 50,
        ]);
        Wo::create([
            'fppp_id' => 2,
            'tgl_terima_fppp' => Carbon::parse('2022-08-01'),
            'finish_qc' => Carbon::parse('2022-08-01'),
            'kode_unit' => 'W01A.2',
            'tipe_barang' => 'ASTRAL AP 02 FIXED WINDOW (SG-RB)',
            'tujuan' => 'Dalam Kota',
            'warna' => 'Sand  Dark Brown',
            'qty' => 250,
            'qty_pack' => 123,
        ]);
        Wo::create([
            'fppp_id' => 3,
            'tgl_terima_fppp' => Carbon::parse('2022-08-01'),
            'finish_qc' => Carbon::parse('2022-08-01'),
            'kode_unit' => 'W01A.3',
            'tipe_barang' => 'ASTRAL AP 03 FIXED WINDOW (SG-RB)',
            'tujuan' => 'Dalam Kota',
            'warna' => 'Sand  Dark Brown',
            'qty' => 100,
            'qty_pack' => 50,
        ]);
        Wo::create([
            'fppp_id' => 4,
            'tgl_terima_fppp' => Carbon::parse('2022-08-01'),
            'finish_qc' => Carbon::parse('2022-08-01'),
            'kode_unit' => 'W01A.4',
            'tipe_barang' => 'ASTRAL AP 04 FIXED WINDOW (SG-RB)',
            'tujuan' => 'Dalam Kota',
            'warna' => 'Sand  Dark Brown',
            'qty' => 78,
            'qty_pack' => 68,
        ]);
        Wo::create([
            'fppp_id' => 5,
            'tgl_terima_fppp' => Carbon::parse('2022-08-01'),
            'finish_qc' => Carbon::parse('2022-08-01'),
            'kode_unit' => 'W01A.5',
            'tipe_barang' => 'ASTRAL AP 05 FIXED WINDOW (SG-RB)',
            'tujuan' => 'Dalam Kota',
            'warna' => 'Sand  Dark Brown',
            'qty' => 432,
            'qty_pack' => 234,
        ]);
        Wo::create([
            'fppp_id' => 6,
            'tgl_terima_fppp' => Carbon::parse('2022-08-01'),
            'finish_qc' => Carbon::parse('2022-08-01'),
            'kode_unit' => 'W01A.6',
            'tipe_barang' => 'ASTRAL AP 06 FIXED WINDOW (SG-RB)',
            'tujuan' => 'Dalam Kota',
            'warna' => 'Sand  Dark Brown',
            'qty' => 56,
            'qty_pack' => 20,
        ]);
        Wo::create([
            'fppp_id' => 7,
            'tgl_terima_fppp' => Carbon::parse('2022-08-01'),
            'finish_qc' => Carbon::parse('2022-08-01'),
            'kode_unit' => 'W01A.7',
            'tipe_barang' => 'ASTRAL AP 07 FIXED WINDOW (SG-RB)',
            'tujuan' => 'Dalam Kota',
            'warna' => 'Sand  Dark Brown',
            'qty' => 124,
            'qty_pack' => 124,
        ]);
        Wo::create([
            'fppp_id' => 8,
            'tgl_terima_fppp' => Carbon::parse('2022-08-01'),
            'finish_qc' => Carbon::parse('2022-08-01'),
            'kode_unit' => 'W01A.8',
            'tipe_barang' => 'ASTRAL AP 08 FIXED WINDOW (SG-RB)',
            'tujuan' => 'Dalam Kota',
            'warna' => 'Sand  Dark Brown',
            'qty' => 122,
            'qty_pack' => 90,
        ]);
        Wo::create([
            'fppp_id' => 9,
            'tgl_terima_fppp' => Carbon::parse('2022-08-01'),
            'finish_qc' => Carbon::parse('2022-08-01'),
            'kode_unit' => 'W01A.9',
            'tipe_barang' => 'ASTRAL AP 09 FIXED WINDOW (SG-RB)',
            'tujuan' => 'Dalam Kota',
            'warna' => 'Sand  Dark Brown',
            'qty' => 211,
            'qty_pack' => 210,
        ]);
        Wo::create([
            'fppp_id' => 10,
            'tgl_terima_fppp' => Carbon::parse('2022-08-01'),
            'finish_qc' => Carbon::parse('2022-08-01'),
            'kode_unit' => 'W01A.10',
            'tipe_barang' => 'ASTRAL AP 10 FIXED WINDOW (SG-RB)',
            'tujuan' => 'Dalam Kota',
            'warna' => 'Sand  Dark Brown',
            'qty' => 198,
            'qty_pack' => 176,
        ]);
        Wo::create([
            'fppp_id' => 11,
            'tgl_terima_fppp' => Carbon::parse('2022-08-01'),
            'finish_qc' => Carbon::parse('2022-08-01'),
            'kode_unit' => 'W01A.11',
            'tipe_barang' => 'ASTRAL AP 11 FIXED WINDOW (SG-RB)',
            'tujuan' => 'Dalam Kota',
            'warna' => 'Sand  Dark Brown',
            'qty' => 43,
            'qty_pack' => 33,
        ]);
        Wo::create([
            'fppp_id' => 12,
            'tgl_terima_fppp' => Carbon::parse('2022-08-01'),
            'finish_qc' => Carbon::parse('2022-08-01'),
            'kode_unit' => 'W01A.12',
            'tipe_barang' => 'ASTRAL AP 12 FIXED WINDOW (SG-RB)',
            'tujuan' => 'Dalam Kota',
            'warna' => 'Sand  Dark Brown',
            'qty' => 122,
            'qty_pack' => 44,
        ]);
    }
}
