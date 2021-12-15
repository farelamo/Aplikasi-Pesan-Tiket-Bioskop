<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Notifikasi;
use App\Models\Tiket;
use App\Models\Transaksi;
use App\Models\UserPengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 5;
        $data_transaksi = Transaksi::orderBy('total_harga','desc')->paginate($batas);
        $no = ($batas * ($data_transaksi->currentPage()-1))+1;
        
        return view('admin.page.transaksi.tampil',['DataTransaksi' => $data_transaksi, 'no' => $no]);
    }

    public function search(Request $request)
    {
        $batas = 5;
        $cari = $request->katakunci;
        $data_transaksi = Transaksi::where('total_harga','like','%'.$cari.'%')->orderBy('total_harga')->paginate($batas);
        $jumlah_data = $data_transaksi->count('id');
        $no = ($batas * ($data_transaksi->currentpage()-1))+1;

        return view('admin.page.transaksi.cari', ['DataTransaksi'=>$data_transaksi,'JumlahDataTransaksi'=>$jumlah_data,'no'=>$no,'cari'=>$cari]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_user_pengguna = UserPengguna::orderBy('nama','asc')->get();
        $data_jadwal = Jadwal::orderBy('tanggal','asc')->get();
        $data_tiket = Tiket::orderBy('harga','asc')->get();
        $data_notifikasi = Notifikasi::orderBy('status','asc')->get();
        return view('admin.page.transaksi.tambah',['DataUserPengguna'=>$data_user_pengguna, 'DataJadwal'=>$data_jadwal, 'DataTiket'=>$data_tiket, 'DataNotifikasi'=>$data_notifikasi]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_pengguna' => 'required',
            'jadwal' => 'required',
            'total_tiket' => 'required',
            'total_harga' => 'required',
            'notifikasi' => 'required',
        ])->validated();

        $transaksi = new Transaksi;
        $transaksi->id_user_pengguna = $request->user_pengguna;
        $transaksi->id_jadwal = $request->jadwal;
        $transaksi->total_tiket = $request->total_tiket;
        $transaksi->total_harga = $request->total_harga;
        $transaksi->id_notifikasi = $request->notifikasi;
        $transaksi->created_by = Auth::id();
        $transaksi->updated_by = Auth::id();
        $transaksi->save();
        $transaksi->tiket()->attach($request->input("list_tiket"));
        
        return redirect('/transaksi')->with('status', 
        'Data Transaksi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_transaksi = Transaksi::find($id);

        return view('admin.page.transaksi.detail', ['DataTransaksi' => $data_transaksi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_transaksi = Transaksi::find($id);
        $data_user_pengguna = UserPengguna::orderBy('nama','asc')->get();
        $data_jadwal = Jadwal::orderBy('tanggal','asc')->get();
        $data_notifikasi = Notifikasi::orderBy('status','asc')->get();
        $data_tiket = Tiket::orderBy('harga','asc')->get();
        $transaksi_tiket = $data_transaksi->tiket->pluck('id_tiket')->toArray();
        
        return view('admin.page.transaksi.edit', ['DataTransaksi' => $data_transaksi, 'DataTiket' => $data_tiket, 'TransaksiTiket' =>$transaksi_tiket, 'DataJadwal' => $data_jadwal, 'DataNotifikasi' => $data_notifikasi, 'DataUserPengguna' => $data_user_pengguna]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'user_pengguna' => 'required',
            'jadwal' => 'required',
            'total_tiket' => 'required',
            'total_harga' => 'required',
            'notifikasi' => 'required',
        ])->validated();

        $data_transaksi = Transaksi::find($id);
        $data_transaksi->id_user_pengguna = $request->user_pengguna;
        $data_transaksi->id_jadwal = $request->jadwal;
        $data_transaksi->total_tiket = $request->total_tiket;
        $data_transaksi->total_harga = $request->total_harga;
        $data_transaksi->id_notifikasi = $request->notifikasi;
        $data_transaksi->updated_by = Auth::id();
        $data_transaksi->tiket()->detach();
        $data_transaksi->update();
        $data_transaksi->tiket()->attach($request->input("list_tiket"));

        return redirect('/transaksi')->with('status', 'Data Transaksi Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_transaksi = Transaksi::find($id);
        $data_transaksi->delete();

        return redirect('/transaksi')->with('status', 'Data Transaksi Berhasil Dihapus');
    }
}
