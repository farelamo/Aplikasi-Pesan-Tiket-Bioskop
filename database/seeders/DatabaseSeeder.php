<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            UsersTableSeeder::class,
            BioskopTableSeeder::class,
            GenreTableSeeder::class,
            KategoriTableSeeder::class,
            KursiTableSeeder::class,
            NotifikasiTableSeeder::class,
            UserKaryawanTableSeeder::class

        ]);
        // \App\Models\User::factory(10)->create();
        
    }
}
