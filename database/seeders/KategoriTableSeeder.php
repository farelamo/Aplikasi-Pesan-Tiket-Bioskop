<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori1 = new Kategori;
        $kategori1->kategori = "Terbaru";
        $kategori1->save();
        
        $kategori2 = new Kategori;
        $kategori2->kategori = "Terpopuler";
        $kategori2->save();
    }
}
