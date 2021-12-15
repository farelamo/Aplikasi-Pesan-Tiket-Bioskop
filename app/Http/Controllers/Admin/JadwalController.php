<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 5;
        $data_jadwal = Jadwal::orderBy('tanggal')->paginate($batas);
        $no = ($batas * ($data_jadwal->currentPage()-1))+1;
        
        return view('admin.page.jadwal.tampil',['DataJadwal' => $data_jadwal, 'no' => $no]);
    }

    public function search(Request $request)
    {
        $batas = 5;
        $cari = $request->katakunci;
        $data_jadwal = Jadwal::where('tanggal','like','%'.$cari.'%')->orderBy('tanggal')->paginate($batas);
        $jumlah_data = $data_jadwal->count('id');
        $no = ($batas * ($data_jadwal->currentpage()-1))+1;

        return view('admin.page.jadwal.cari', ['DataFilm'=>$data_jadwal,'JumlahDataJadwal'=>$jumlah_data,'no'=>$no,'cari'=>$cari]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_film = Film::orderBy('judul','asc')->get();
        return view('admin.page.jadwal.tambah',['DataFilm'=>$data_film]);
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
            'tanggal' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ])->validated();

        $jadwal = new Jadwal;
        $jadwal->tanggal = $request->tanggal;
        $jadwal->jam_mulai = $request->jam_mulai;
        $jadwal->jam_selesai = $request->jam_selesai;
        $jadwal->save();
        $jadwal->film()->attach($request->input("list_film"));
        
        return redirect('/jadwal')->with('status','Data Jadwal Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_jadwal = Jadwal::find($id);

        return view('admin.page.jadwal.detail', ['DataJadwal' => $data_jadwal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_jadwal = Jadwal::find($id);
        $data_film = Film::orderBy('judul','asc')->get();
        $jadwal_film = $data_jadwal->film->pluck('id_film')->toArray();
        
        return view('admin.page.jadwal.edit', ['DataJadwal' => $data_jadwal,'DataFilm' => $data_film, 'JadwalFilm' => $jadwal_film]);
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
            'tanggal' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ])->validated();

        $data_jadwal = Jadwal::find($id);
        $data_jadwal->tanggal = $request->tanggal;
        $data_jadwal->jam_mulai = $request->jam_mulai;
        $data_jadwal->jam_selesai = $request->jam_selesai;
        $data_jadwal->film()->detach();
        $data_jadwal->update();
        $data_jadwal->film()->attach($request->input("list_film"));
        
        return redirect('/jadwal')->with('status', 'Data Jadwal Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_jadwal = Jadwal::find($id);
        $data_jadwal->delete();
        
        return redirect('/jadwal')->with('status', 'Data Jadwal Berhasil Dihapus');
    }
}
