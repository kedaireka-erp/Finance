<?php

namespace Database\Seeders;

use App\Models\RekapSubkon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RekapSubkonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RekapSubkon::create([
            'work_order_id' => 1,
            'assembly_id' => 0,
            'kode_assembly' => 0,
        ]);
        RekapSubkon::create([
            'work_order_id' => 2,
            'assembly_id' => 1,
            'kode_assembly' => 0,
        ]);
        RekapSubkon::create([
            'work_order_id' => 3,
            'assembly_id' => 2,
            'kode_assembly' => 0,
        ]);
        RekapSubkon::create([
            'work_order_id' => 4,
            'assembly_id' => 3,
            'kode_assembly' => 0,
        ]);
        RekapSubkon::create([
            'work_order_id' => 5,
            'assembly_id' => 4,
            'kode_assembly' => 0,
        ]);
        RekapSubkon::create([
            'work_order_id' => 6,
            'assembly_id' => 0,
            'kode_assembly' => 1,
        ]);
        RekapSubkon::create([
            'work_order_id' => 7,
            'assembly_id' => 1,
            'kode_assembly' => 1,
        ]);
        RekapSubkon::create([
            'work_order_id' => 8,
            'assembly_id' => 2,
            'kode_assembly' => 1,
        ]);
        RekapSubkon::create([
            'work_order_id' => 9,
            'assembly_id' => 3,
            'kode_assembly' => 1,
        ]);
        RekapSubkon::create([
            'work_order_id' => 10,
            'assembly_id' => 4,
            'kode_assembly' => 1,
        ]);
        RekapSubkon::create([
            'work_order_id' => 11,
            'assembly_id' => 0,
            'kode_assembly' => 2,
        ]);
        RekapSubkon::create([
            'work_order_id' => 12,
            'assembly_id' => 1,
            'kode_assembly' => 2,
        ]);

    }
}
