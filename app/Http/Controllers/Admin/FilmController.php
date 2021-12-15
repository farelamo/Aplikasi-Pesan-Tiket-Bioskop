<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Kategori;
use App\Models\Genre;
use App\Models\Bioskop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 5;
        $data_film = Film::orderBy('judul')->paginate($batas);
        $no = ($batas * ($data_film->currentPage()-1))+1;
        
        return view('admin.page.film.tampil',['DataFilm' => $data_film, 'no' => $no]);
    }

    public function search(Request $request)
    {
        $batas = 5;
        $cari = $request->katakunci;
        $data_film = Film::where('judul','like','%'.$cari.'%')->orderBy('judul')->paginate($batas);
        $jumlah_data = $data_film->count('id');
        $no = ($batas * ($data_film->currentpage()-1))+1;

        return view('admin.page.film.cari', ['DataFilm'=>$data_film,'JumlahDataFilm'=>$jumlah_data,'no'=>$no,'cari'=>$cari]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_kategori = Kategori::orderBy('kategori','asc')->get();
        $data_genre = Genre::orderBy('genre','asc')->get();
        $data_bioskop = Bioskop::orderBy('nama','asc')->get();
        return view('admin.page.film.tambah',['DataKategori'=>$data_kategori, 'DataGenre'=>$data_genre, 'DataBioskop'=>$data_bioskop]);
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
            'judul' => 'required',
            'sinopsis' => 'required',
            'link' => 'required',
            'cover' => 'required|image|mimes:jpeg,jpg,png',
        ])->validated();

        $film = new Film;
        $film->judul = $request->judul;
        $film->sinopsis = $request->sinopsis;
        $film->link = $request->link;
        $cover = $request->cover;
        $namafile = time().'.'.$cover->getClientOriginalExtension();
        $cover->move('public/cover/',$namafile);
        $film->cover = $namafile;
        $film->save();
        $film->genre()->attach($request->input("list_genre"));
        $film->kategori()->attach($request->input("list_kategori"));
        $film->bioskop()->attach($request->input("list_bioskop"));
        
        return redirect('/film')->with('status', 
        'Data Film Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_film = Film::find($id);

        return view('admin.page.film.detail', ['DataFilm' => $data_film]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_film = Film::find($id);
        $data_genre = Genre::orderBy('genre','asc')->get();
        $data_kategori = Kategori::orderBy('kategori','asc')->get();
        $data_bioskop = Bioskop::orderBy('nama','asc')->get();
        $film_genre = $data_film->genre->pluck('id_genre')->toArray();
        $film_kategori = $data_film->kategori->pluck('id_kategori')->toArray();
        $film_bioskop = $data_film->bioskop->pluck('id_bioskop')->toArray();
        
        return view('admin.page.film.edit', ['DataFilm' => $data_film, 'DataGenre' => $data_genre, 'FilmGenre' => $film_genre, 'DataKategori' => $data_kategori, 'FilmKategori' => $film_kategori, 'DataBioskop' => $data_bioskop, 'FilmBioskop' => $film_bioskop]);

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
            'judul' => 'required',
            'sinopsis' => 'required',
            'link' => 'required',
            'cover' => 'image|mimes:jpeg,jpg,png',
        ])->validated();

        $data_film = Film::find($id);

        $namafileold = $data_film->cover;
        if($request->has('cover')){
            if(File::exists('public/cover/'.$namafileold)) {
                File::delete('public/cover/'.$namafileold);
            }
            $data_film->judul = $request->judul;
            $data_film->sinopsis = $request->sinopsis;
            $data_film->link = $request->link;
            $cover = $request->cover;
            $namafile = time().'.'.$cover->getClientOriginalExtension();
            $cover->move('public/cover/',$namafile);
            $data_film->cover = $namafile;
            $data_film->genre()->detach();
            $data_film->kategori()->detach();
            $data_film->bioskop()->detach();
        }else{
            $data_film->judul = $request->judul;
            $data_film->sinopsis = $request->sinopsis;
            $data_film->link = $request->link;
            $data_film->genre()->detach();
            $data_film->kategori()->detach();
            $data_film->bioskop()->detach();
        }
        $data_film->update();
        $data_film->genre()->attach($request->input("list_genre"));
        $data_film->kategori()->attach($request->input("list_kategori"));
        $data_film->bioskop()->attach($request->input("list_bioskop"));

        return redirect('/film')->with('status', 'Data Film Berhasil Diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_film = Film::find($id);
        $namafile = $data_film->cover;
        if(File::exists('public/cover/'.$namafile)) {
            File::delete('public/cover/'.$namafile);
        }
        $data_film->delete();

        return redirect('/film')->with('status', 'Data Film Berhasil Dihapus');
    }
}
