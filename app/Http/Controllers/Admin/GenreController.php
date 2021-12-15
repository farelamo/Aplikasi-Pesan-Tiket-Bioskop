<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 5;
        $data_genre = Genre::orderBy('genre')->paginate($batas);
        $no = ($batas * ($data_genre->currentPage()-1))+1;
        
        return view('admin.page.genre.tampil',['DataGenre' => $data_genre, 'no' => $no]);
    }

    public function search(Request $request)
    {
        $batas = 5;
        $cari = $request->katakunci;
        $data_genre = Genre::where('genre','like','%'.$cari.'%')->orderBy('genre')->paginate($batas);
        $jumlah_data = $data_genre->count('id');
        $no = ($batas * ($data_genre->currentpage()-1))+1;

        return view('admin.page.genre.cari', ['DataGenre'=>$data_genre,'JumlahDataGenre'=>$jumlah_data,'no'=>$no,'cari'=>$cari]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.genre.tambah');
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
            'genre' => 'required',
        ])->validated();

        $genre = new Genre;
        $genre->genre = $request->genre;
        $genre->save();

        return redirect('/genre')->with('status','Data Genre Berhasil Ditambahkan');
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
        $data_genre = Genre::find($id);

        return view('admin.page.genre.edit',['DataGenre' => $data_genre]);
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
            'genre' => 'required',
        ]);

        $data_genre = Genre::find($id);
        $data_genre->genre = $request->genre;
        $data_genre->update();

        return redirect('/genre')->with('status','Data Genre Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_genre = Genre::find($id);
        $data_genre->delete();

        return redirect('/genre')->with('status', 'Data Genre Berhasil Dihapus');
    }
}
