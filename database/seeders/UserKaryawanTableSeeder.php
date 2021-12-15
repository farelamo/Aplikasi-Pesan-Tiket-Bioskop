<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserKaryawan;

class UserKaryawanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag1 = new UserKaryawan;
        $tag1->nama = "M. Ihza Deprian";
        $tag1->username = "ihzadeprian";
        $tag1->password = "ihzadeprian";
        $tag1->email = "ihzadeprian@gmail.com";
        $tag1->level = "Superadmin";
        $tag1->foto = "";
        $tag1->save();
    }
}
