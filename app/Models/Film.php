<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $table = 'film';
    protected $primaryKey = 'id_film';
    
    public function genre(){
        return $this->belongsToMany("App\Models\Genre","film_genre","id_film","id_genre");
    }
    public function kategori(){
        return $this->belongsToMany("App\Models\Kategori","film_kategori","id_film","id_kategori");
    }
    public function bioskop(){
        return $this->belongsToMany("App\Models\Bioskop","film_bioskop","id_film","id_bioskop");
    }
    public function jadwal(){
        return $this->belongsToMany("App\Models\Jadwal","jadwal_film","id_film","id_jadwal");
    }
}
