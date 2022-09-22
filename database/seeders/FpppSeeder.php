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
            "quotation_id" => 1,
            "fppp_no" => "123/FPPP/B03/07/2022",
            "applicator_name" => "PT. BRI",
            "project_name" => "Lantai 1 BRI",
        ]);
        Fppp::create([
            "quotation_id" => 2,
            "fppp_no" => "124/FPPP/B04/07/2022",
            "project_name" => "Lantai 1 BCA",
            "applicator_name" => "PT. BCA"
        ]);
        for ($i = 5; $i < 15; $i++) {
            $i_plus = $i + 1;
            Fppp::create([
                "quotation_id" => 1,
                "fppp_no" => "12{$i}/FPPP/B0{$i}/07/2022",
                "project_name" => "Lantai 1 BRI",
                "applicator_name" => "PT. BRI"
            ]);
            Fppp::create([
                "quotation_id" => 2,
                "fppp_no" => "12{$i_plus}/FPPP/B0{$i_plus}/07/2022",
                "project_name" => "Lantai 1 BCA",
                "applicator_name" => "PT. BCA"
            ]);
        }
    }
}
