<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;
    protected $table = 'tiket';
    protected $primaryKey = 'id_tiket';

    public function kursi(){
        return $this->belongsTo("App\Models\Kursi","id_kursi");
    }
    public function transaksi(){
        return $this->belongsToMany("App\Models\Transaksi","transaksi_tiket","id_tiket","id_transaksi");
    }
}
