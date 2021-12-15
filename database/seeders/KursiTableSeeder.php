<?php

namespace Database\Seeders;

use App\Models\Kursi;
use Illuminate\Database\Seeder;

class KursiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kursi1 = new Kursi;
        $kursi1->nomor_kursi = "A1";
        $kursi1->save();
        
        $kursi2 = new Kursi;
        $kursi2->nomor_kursi = "A2";
        $kursi2->save();
    }
}
