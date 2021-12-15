<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genre1 = new Genre;
        $genre1->genre = "Action";
        $genre1->save();
        
        $genre2 = new Genre;
        $genre2->genre = "Comedy";
        $genre2->save();
    }
}
