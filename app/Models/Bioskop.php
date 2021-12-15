<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bioskop extends Model
{
    use HasFactory;
    protected $table = 'bioskop';
    protected $primaryKey = 'id_bioskop';

    public function film(){
        return $this->belongsToMany("App\Models\Film","film_bioskop","id_bioskop","id_film");
    }
}
