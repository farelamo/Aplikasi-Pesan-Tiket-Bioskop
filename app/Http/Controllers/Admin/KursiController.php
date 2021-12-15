<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kursi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KursiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 5;
        $data_kursi = Kursi::orderBy('nomor_kursi')->paginate($batas);
        $no = ($batas * ($data_kursi->currentPage()-1))+1;
        
        return view('admin.page.kursi.tampil',['DataKursi' => $data_kursi, 'no' => $no]);
    }

    public function search(Request $request)
    {
        $batas = 5;
        $cari = $request->katakunci;
        $data_kursi = Kursi::where('nomor_kursi','like','%'.$cari.'%')->orderBy('nomor_kursi')->paginate($batas);
        $jumlah_data = $data_kursi->count('id');
        $no = ($batas * ($data_kursi->currentpage()-1))+1;

        return view('admin.page.kursi.cari', ['DataKursi'=>$data_kursi,'JumlahDataKursi'=>$jumlah_data,'no'=>$no,'cari'=>$cari]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.kursi.tambah');
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
            'nomor_kursi' => 'required',
        ])->validated();

        $kursi = new Kursi;
        $kursi->nomor_kursi = $request->nomor_kursi;
        $kursi->save();

        return redirect('/kursi')->with('status','Data Kursi Berhasil Ditambahkan');
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
        $data_kursi = Kursi::find($id);

        return view('admin.page.kursi.edit',['DataKursi' => $data_kursi]);
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
        $validator = Validator::make($request->all(),[
            'kursi' => 'required',
        ]);

        $data_kursi = Kursi::find($id);
        $data_kursi->nomor_kursi = $request->nomor_kursi;
        $data_kursi->update();

        return redirect('/kursi')->with('status','Data Kursi Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_kursi = Kursi::find($id);
        $data_kursi->delete();

        return redirect('/kursi')->with('status', 'Data Kursi Berhasil Dihapus');
    }
}
