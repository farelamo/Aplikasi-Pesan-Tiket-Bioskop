<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';

    public function film(){
        return $this->belongsToMany("App\Models\Film","film_kategori","id_kategori","id_film");
    }
}
