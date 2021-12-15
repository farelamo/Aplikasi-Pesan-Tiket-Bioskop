<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $karyawan1 = new User;
        $karyawan1->name = "Qluwung Anggawa Swandiri";
        $karyawan1->password = bcrypt("qluwung");
        $karyawan1->email = "qluwung@gmail.com";
        $karyawan1->level = "Superadmin";
        $karyawan1->foto = "";
        $karyawan1->save();
        
        $karyawan2 = new User;
        $karyawan2->name = "M. Ihza Deprian";
        $karyawan2->password = bcrypt("ihzadeprian");
        $karyawan2->email = "ihzadeprian@gmail.com";
        $karyawan2->level = "Superadmin";
        $karyawan2->foto = "";
        $karyawan2->save();
        
        $karyawan3 = new User;
        $karyawan3->name = "Nabillah";
        $karyawan3->password = bcrypt("nabillah");
        $karyawan3->email = "nabillah@gmail.com";
        $karyawan3->level = "Admin";
        $karyawan3->foto = "";
        $karyawan3->save();
        
        $karyawan4 = new User;
        $karyawan4->name = "Khenaro Daffa Asyrof";
        $karyawan4->password = bcrypt("daffa");
        $karyawan4->email = "daffa@gmail.com";
        $karyawan4->level = "Admin";
        $karyawan4->foto = "";
        $karyawan4->save();
        
        $karyawan5 = new User;
        $karyawan5->name = "Nadila Listya Putri";
        $karyawan5->password = bcrypt("nadila");
        $karyawan5->email = "nadila@gmail.com";
        $karyawan5->level = "Admin";
        $karyawan5->foto = "";
        $karyawan5->save();
    }
}
