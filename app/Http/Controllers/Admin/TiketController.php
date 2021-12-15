<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kursi;
use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 5;
        $data_tiket = Tiket::orderBy('stok')->paginate($batas);
        $no = ($batas * ($data_tiket->currentPage()-1))+1;
        
        return view('admin.page.tiket.tampil',['DataTiket' => $data_tiket, 'no' => $no]);
    }

    public function search(Request $request)
    {
        $batas = 5;
        $cari = $request->katakunci;
        $data_tiket = Tiket::where('stok','like','%'.$cari.'%')->orderBy('stok')->paginate($batas);
        $jumlah_data = $data_tiket->count('id');
        $no = ($batas * ($data_tiket->currentpage()-1))+1;

        return view('admin.page.tiket.cari', ['DataTiket'=>$data_tiket,'JumlahDataTiket'=>$jumlah_data,'no'=>$no,'cari'=>$cari]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_kursi = Kursi::orderBy('nomor_kursi','asc')->get();
        return view('admin.page.tiket.tambah',['DataKursi'=>$data_kursi]);
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
            'kursi' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ])->validated();

        $tiket = new Tiket;
        $tiket->id_kursi = $request->kursi;
        $tiket->harga = $request->harga;
        $tiket->stok = $request->stok;
        $tiket->save();

        return redirect('/tiket')->with('status', 'Data Tiket Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_tiket = Tiket::find($id);
        $data_kursi = Kursi::orderBy('nomor_kursi','asc')->get();
        
        return view('admin.page.tiket.edit', ['DataTiket' => $data_tiket,'DataKursi' => $data_kursi ]);

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
            'kursi' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ])->validated();

        $data_tiket = Tiket::find($id);
        $data_tiket->id_kursi = $request->kursi;
        $data_tiket->harga = $request->harga;
        $data_tiket->stok = $request->stok;
        $data_tiket->update();
        
        return redirect('/tiket')->with('status', 'Data Tiket Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_tiket = Tiket::find($id);
        $data_tiket->delete();
        
        return redirect('/tiket')->with('status', 'Data Tiket Berhasil Dihapus');
    }
}
