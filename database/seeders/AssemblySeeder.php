<?php

namespace Database\Seeders;

use App\Models\Assembly;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AssemblySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Assembly::create([
            'name' => 'Assembly',
        ]);

        Assembly::create([
            'name' => 'Las',
        ]);

        Assembly::create([
            'name' => 'Cek Opening',
        ]);

        Assembly::create([
            'name' => 'Pasang Kaca',
        ]);
        
        Assembly::create([
            'name' => 'Sealant Kaca',
        ]);
    }
}
