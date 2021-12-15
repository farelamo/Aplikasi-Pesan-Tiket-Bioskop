<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';

    public function film(){
        return $this->belongsToMany("App\Models\Film","jadwal_film","id_jadwal","id_film");
    }

    public function transaksi(){
        return $this->hasMany("App\Models\Transaksi","id_jadwal");
    }
}
