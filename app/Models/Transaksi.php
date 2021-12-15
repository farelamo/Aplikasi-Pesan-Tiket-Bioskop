<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    public function user_pengguna(){
        return $this->belongsTo("App\Models\UserPengguna","id_user_pengguna");
    }
    public function jadwal(){
        return $this->belongsTo("App\Models\Jadwal","id_jadwal");
    }
    public function tiket(){
        return $this->belongsToMany("App\Models\Tiket","transaksi_tiket","id_transaksi","id_tiket");
    }
    public function notifikasi(){
        return $this->belongsTo("App\Models\Notifikasi","id_notifikasi");
    }
    public function users(){
        return $this->belongsTo("App\Models\User","created_by");
    }
    public function users2(){
        return $this->belongsTo("App\Models\User","updated_by");
    }
}
