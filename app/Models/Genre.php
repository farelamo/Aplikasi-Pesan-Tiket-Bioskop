<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $table = 'genre';
    protected $primaryKey = 'id_genre';

    public function film(){
        return $this->belongsToMany("App\Models\Film","film_genre","id_genre","id_film");
    }
}
