<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKaryawan extends Model
{
    use HasFactory;
    protected $table = 'user_karyawan';
    protected $primaryKey = 'id_user_karyawan';

    public function transaksi(){
        return $this->hasMany("App\Models\Transaksi","created_by");
        return $this->hasMany("App\Models\Transaksi","updated_by");
    }
}
