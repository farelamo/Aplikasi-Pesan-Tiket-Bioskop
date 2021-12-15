<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bioskop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BioskopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 5;
        $data_bioskop = Bioskop::orderBy('nama')->paginate($batas);
        $no = ($batas * ($data_bioskop->currentPage()-1))+1;
        
        return view('admin.page.bioskop.tampil',['DataBioskop' => $data_bioskop, 'no' => $no]);
    }

    public function search(Request $request)
    {
        $batas = 5;
        $cari = $request->katakunci;
        $data_bioskop = Bioskop::where('nama','like','%'.$cari.'%')->orderBy('nama')->paginate($batas);
        $jumlah_data = $data_bioskop->count('id_bioskop');
        $no = ($batas * ($data_bioskop->currentpage()-1))+1;

        return view('admin.page.bioskop.cari', ['DataBioskop'=>$data_bioskop,'JumlahDataBioskop'=>$jumlah_data,'no'=>$no,'cari'=>$cari]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.bioskop.tambah');
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
            'nama' => 'required',
        ])->validated();

        $bioskop = new Bioskop;
        $bioskop->nama = $request->nama;
        $bioskop->save();

        return redirect('/bioskop')->with('status','Data Bioskop Berhasil Ditambahkan');
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
        $data_bioskop = Bioskop::find($id);

        return view('admin.page.bioskop.edit',['DataBioskop' => $data_bioskop]);
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
            'nama' => 'required',
        ]);

        $data_bioskop = Bioskop::find($id);
        $data_bioskop->nama = $request->nama;
        $data_bioskop->update();

        return redirect('/bioskop')->with('status','Data Bioskop Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_bioskop = Bioskop::find($id);
        $data_bioskop->delete();

        return redirect('/bioskop')->with('status', 'Data Bioskop Berhasil Dihapus');
    }
}
