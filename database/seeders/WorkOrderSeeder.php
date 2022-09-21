<?php

namespace Database\Seeders;

use App\Models\WorkOrder;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WorkOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WorkOrder::create([
            'fppp_id' => 1,
            'last_process' => 'packing',
            'kode_unit' => 'W01A.1',
            'nama_item' => 'ASTRAL AP 01 FIXED WINDOW (SG-RB)',
            'qty' => 50,
            'qty_packing' => 50,
            'process_assembly1' => 'Assembly',
            'tanggal_assembly1' => Carbon::parse('2022-08-01'),
            'warna' => 'Sand  Dark Brown',
            'tujuan' => 'Dalam Kota',
        ]);
        WorkOrder::create([
            'fppp_id' => 2,
            'last_process' => 'packing',
            'kode_unit' => 'W01A.2',
            'nama_item' => 'ASTRAL AP 02 FIXED WINDOW (SG-RB)',
            'qty' => 250,
            'qty_packing' => 123,
            'process_assembly1' => 'Las',
            'tanggal_assembly1' => Carbon::parse('2022-08-01'),
            'warna' => 'Sand  Dark Brown',
            'tujuan' => 'Dalam Kota',
        ]);
        WorkOrder::create([
            'fppp_id' => 3,
            'last_process' => 'packing',
            'kode_unit' => 'W01A.3',
            'nama_item' => 'ASTRAL AP 03 FIXED WINDOW (SG-RB)',
            'qty' => 100,
            'qty_packing' => 50,
            'process_assembly1' => 'Cek Opening',
            'tanggal_assembly1' => Carbon::parse('2022-08-01'),
            'warna' => 'Sand  Dark Brown',
            'tujuan' => 'Dalam Kota',
        ]);
        WorkOrder::create([
            'fppp_id' => 4,
            'last_process' => 'packing',
            'kode_unit' => 'W01A.4',
            'nama_item' => 'ASTRAL AP 04 FIXED WINDOW (SG-RB)',
            'qty' => 78,
            'qty_packing' => 68,
            'process_assembly1' => 'Pasang Kaca',
            'tanggal_assembly1' => Carbon::parse('2022-08-01'),
            'warna' => 'Sand  Dark Brown',
            'tujuan' => 'Dalam Kota',
        ]);
        WorkOrder::create([
            'fppp_id' => 5,
            'last_process' => 'packing',
            'kode_unit' => 'W01A.5',
            'nama_item' => 'ASTRAL AP 05 FIXED WINDOW (SG-RB)',
            'qty' => 432,
            'qty_packing' => 234,
            'process_assembly1' => 'Sealant Kaca',
            'tanggal_assembly1' => Carbon::parse('2022-08-01'),
            'warna' => 'Sand  Dark Brown',
            'tujuan' => 'Dalam Kota',
        ]);
        WorkOrder::create([
            'fppp_id' => 6,
            'last_process' => 'packing',
            'kode_unit' => 'W01A.6',
            'nama_item' => 'ASTRAL AP 06 FIXED WINDOW (SG-RB)',
            'qty' => 56,
            'qty_packing' => 20,
            'process_assembly2' => 'Assembly',
            'tanggal_assembly2' => Carbon::parse('2022-08-01'),
            'warna' => 'Sand  Dark Brown',
            'tujuan' => 'Dalam Kota',
        ]);
        WorkOrder::create([
            'fppp_id' => 7,
            'last_process' => 'packing',
            'kode_unit' => 'W01A.7',
            'nama_item' => 'ASTRAL AP 07 FIXED WINDOW (SG-RB)',
            'qty' => 124,
            'qty_packing' => 124,
            'process_assembly2' => 'Las',
            'tanggal_assembly2' => Carbon::parse('2022-08-01'),
            'warna' => 'Sand  Dark Brown',
            'tujuan' => 'Dalam Kota',
        ]);
        WorkOrder::create([
            'fppp_id' => 8,
            'last_process' => 'packing',
            'kode_unit' => 'W01A.8',
            'nama_item' => 'ASTRAL AP 08 FIXED WINDOW (SG-RB)',
            'qty' => 122,
            'qty_packing' => 90,
            'process_assembly2' => 'Cek Opening',
            'tanggal_assembly2' => Carbon::parse('2022-08-01'),
            'warna' => 'Sand  Dark Brown',
            'tujuan' => 'Dalam Kota',
        ]);
        WorkOrder::create([
            'fppp_id' => 9,
            'last_process' => 'packing',
            'kode_unit' => 'W01A.9',
            'nama_item' => 'ASTRAL AP 09 FIXED WINDOW (SG-RB)',
            'qty' => 211,
            'qty_packing' => 210,
            'process_assembly2' => 'Pasang Kaca',
            'tanggal_assembly2' => Carbon::parse('2022-08-01'),
            'warna' => 'Sand  Dark Brown',
            'tujuan' => 'Dalam Kota',
        ]);
        WorkOrder::create([
            'fppp_id' => 10,
            'last_process' => 'packing',
            'kode_unit' => 'W01A.10',
            'nama_item' => 'ASTRAL AP 10 FIXED WINDOW (SG-RB)',
            'qty' => 198,
            'qty_packing' => 176,
            'process_assembly2' => 'Sealant Kaca',
            'tanggal_assembly2' => Carbon::parse('2022-08-01'),
            'warna' => 'Sand  Dark Brown',
            'tujuan' => 'Dalam Kota',
        ]);
        WorkOrder::create([
            'fppp_id' => 11,
            'last_process' => 'packing',
            'kode_unit' => 'W01A.11',
            'nama_item' => 'ASTRAL AP 11 FIXED WINDOW (SG-RB)',
            'qty' => 43,
            'qty_packing' => 33,
            'process_assembly3' => 'Assembly',
            'tanggal_assembly3' => Carbon::parse('2022-08-01'),
            'warna' => 'Sand  Dark Brown',
            'tujuan' => 'Dalam Kota',
        ]);
        WorkOrder::create([
            'fppp_id' => 12,
            'last_process' => 'packing',
            'kode_unit' => 'W01A.12',
            'nama_item' => 'ASTRAL AP 12 FIXED WINDOW (SG-RB)',
            'qty' => 122,
            'qty_packing' => 44,
            'process_assembly3' => 'Las',
            'tanggal_assembly3' => Carbon::parse('2022-08-01'),
            'warna' => 'Sand  Dark Brown',
            'tujuan' => 'Dalam Kota',
        ]);
    }
}
