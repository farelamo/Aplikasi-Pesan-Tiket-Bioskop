<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bioskop;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Jadwal;
use App\Models\Kategori;
use App\Models\Kursi;
use App\Models\Notifikasi;
use App\Models\Tiket;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\UserKaryawan;
use App\Models\UserPengguna;

class PageUserController extends Controller
{
    //
    public function index(){
        $datas = Bioskop::all();
        $data2 = Film::all();
        $data3 = Genre::all();
        $data4 = Jadwal::all();
        $data5 = Kategori::all();
        $data6 = Kursi::all();
        $data7 = Notifikasi::all();
        $data8 = Tiket::all();
        $data9 = Transaksi::all();
        $data10 = User::all();
        $data11 = UserKaryawan::all();
        $data12 = UserPengguna::all();


        return view('user.master', compact('datas','data2','data3','data4','data5','data6','data7','data8','data9','data10','data11','data12'));
    }
}
