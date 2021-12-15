<?php

namespace App\Http\Controllers\Admin;
use App\Models\Notifikasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 5;
        $data_notifikasi = Notifikasi::orderBy('status')->paginate($batas);
        $no = ($batas * ($data_notifikasi->currentPage()-1))+1;
        
        return view('admin.page.notifikasi.tampil',['DataNotifikasi' => $data_notifikasi, 'no' => $no]);
    }

    public function search(Request $request)
    {
        $batas = 5;
        $cari = $request->katakunci;
        $data_notifikasi = Notifikasi::where('status','like','%'.$cari.'%')->orderBy('status')->paginate($batas);
        $jumlah_data = $data_notifikasi->count('id');
        $no = ($batas * ($data_notifikasi->currentpage()-1))+1;

        return view('admin.page.notifikasi.cari', ['DataNotifikasi'=>$data_notifikasi,'JumlahDataNotifikasi'=>$jumlah_data,'no'=>$no,'cari'=>$cari]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.notifikasi.tambah');
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
            'status' => 'required',
        ])->validated();

        $notifikasi = new Notifikasi;
        $notifikasi->status = $request->status;
        $notifikasi->save();

        return redirect('/notifikasi')->with('status','Data Notifikasi Berhasil Ditambahkan');
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
        $data_notifikasi = Notifikasi::find($id);

        return view('admin.page.notifikasi.edit',['DataNotifikasi' => $data_notifikasi]);
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
            'status' => 'required',
        ]);

        $data_notifikasi = Notifikasi::find($id);
        $data_notifikasi->status = $request->status;
        $data_notifikasi->update();

        return redirect('/notifikasi')->with('status','Data Notifikasi Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_notifikasi = Notifikasi::find($id);
        $data_notifikasi->delete();

        return redirect('/notifikasi')->with('status', 'Data Notifikasi Berhasil Dihapus');
    }
}
