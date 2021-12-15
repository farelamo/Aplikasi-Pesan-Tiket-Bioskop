<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursi extends Model
{
    use HasFactory;
    protected $table = 'kursi';
    protected $primaryKey = 'id_kursi';

    public function tiket(){
        return $this->hasOne("App\Models\Tiket","id_kursi");
    }
}
