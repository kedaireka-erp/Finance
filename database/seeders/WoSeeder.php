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
            'kode_unit' => 1,
            'tujuan' => 'tujuan 1',
        ]);
        Wo::create([
            'fppp_id' => 2,
            'tgl_terima_fppp' => Carbon::parse('2022-08-02'),
            'finish_qc' => Carbon::parse('2022-08-01'),
            'kode_unit' => 2,
            'tujuan' => 'tujuan 2',
        ]);
        Wo::create([
            'fppp_id' => 3,
            'tgl_terima_fppp' => Carbon::parse('2022-08-03'),
            'finish_qc' => Carbon::parse('2022-08-01'),
            'kode_unit' => 3,
            'tujuan' => 'tujuan 3',
        ]);
        Wo::create([
            'fppp_id' => 4,
            'tgl_terima_fppp' => Carbon::parse('2022-08-04'),
            'finish_qc' => Carbon::parse('2022-08-01'),
            'kode_unit' => 4,
            'tujuan' => 'tujuan 4',
        ]);
        Wo::create([
            'fppp_id' => 5,
            'tgl_terima_fppp' => Carbon::parse('2022-08-05'),
            'finish_qc' => Carbon::parse('2022-08-01'),
            'kode_unit' => 5,
            'tujuan' => 'tujuan 5',
        ]);
    }
}
