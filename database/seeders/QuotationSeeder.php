<?php

namespace Database\Seeders;

use App\Models\Quotation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuotationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quotation::create([
            'quotation_no' => '034/ALUPUS/AP084/01/2022/R5',
        ]);

        Quotation::create([
            'quotation_no' => '667/ALPHA/MX454/33/2022/R6',
        ]);
    }
}
