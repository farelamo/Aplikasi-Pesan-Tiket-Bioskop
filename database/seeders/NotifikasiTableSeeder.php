<?php

namespace Database\Seeders;

use App\Models\Notifikasi;
use Illuminate\Database\Seeder;

class NotifikasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notifikasi1 = new Notifikasi;
        $notifikasi1->status = "Proses";
        $notifikasi1->save();
        
        $notifikasi2 = new Notifikasi;
        $notifikasi2->status = "Berhasil";
        $notifikasi2->save();
    }
}
