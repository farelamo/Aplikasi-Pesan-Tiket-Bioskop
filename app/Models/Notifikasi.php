<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;
    protected $table = 'notifikasi';
    protected $primaryKey = 'id_notifikasi';

    public function transaksi(){
        return $this->hasMany("App\Models\Transaksi","id_notifikasi");
    }
}
