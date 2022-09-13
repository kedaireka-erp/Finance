<?php

namespace Database\Seeders;

use App\Models\Fppp;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FpppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fppp::create([
            'quotation_no' => 1,
            'fppp_no' => 1,
            'applicator_name' => 'Aplikator 1',
            'project_name' => 'Proyek 1',
        ]);
        Fppp::create([
            'quotation_no' => 2,
            'fppp_no' => 2,
            'applicator_name' => 'Aplikator 2',
            'project_name' => 'Proyek 2',
        ]);
        Fppp::create([
            'quotation_no' => 3,
            'fppp_no' => 3,
            'applicator_name' => 'Aplikator 3',
            'project_name' => 'Proyek 3',
        ]);
        Fppp::create([
            'quotation_no' => 4,
            'fppp_no' => 4,
            'applicator_name' => 'Aplikator 4',
            'project_name' => 'Proyek 4',
        ]);
        Fppp::create([
            'quotation_no' => 1,
            'fppp_no' => 5,
            'applicator_name' => 'Aplikator 5',
            'project_name' => 'Proyek 5',
        ]);
    }
}
