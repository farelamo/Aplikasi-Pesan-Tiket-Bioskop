<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPengguna extends Model
{
    use HasFactory;
    protected $table = 'user_pengguna';
    protected $primaryKey = "id_user_pengguna";

    protected $guarded = [];
    
    public function transaksi(){
        return $this->hasMany("App\Models\Transaksi","id_user_pengguna");
    }
}