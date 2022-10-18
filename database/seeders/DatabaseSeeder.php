<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\WoSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\FpppSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            QuotationSeeder::class,
            DetailQuotationSeeder::class,
            FpppSeeder::class,
            AssemblySeeder::class,
            WorkOrderSeeder::class,
            RekapSubkonSeeder::class,
        ]);
    }
}
