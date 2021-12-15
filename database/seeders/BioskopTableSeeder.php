<?php

namespace Database\Seeders;

use App\Models\Bioskop;
use Illuminate\Database\Seeder;

class BioskopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bioskop1 = new Bioskop;
        $bioskop1->nama = "Transmart MX Mall XXI";
        $bioskop1->save();
        
        $bioskop2 = new Bioskop;
        $bioskop2->nama = "Mandala 21";
        $bioskop2->save();
    }
}
