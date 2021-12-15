<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserPengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class UserPenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 5;
        $data_user_pengguna = UserPengguna::orderBy('nama')->paginate($batas);
        $no = ($batas * ($data_user_pengguna->currentPage()-1))+1;
        
        return view('admin.page.user_pengguna.tampil',['DataUserPengguna' => $data_user_pengguna, 'no' => $no]);
    }

    public function search(Request $request)
    {
        $batas = 5;
        $cari = $request->katakunci;
        $data_user_pengguna = UserPengguna::where('nama','like','%'.$cari.'%')->orderBy('nama')->paginate($batas);
        $jumlah_data = $data_user_pengguna->count('id');
        $no = ($batas * ($data_user_pengguna->currentpage()-1))+1;

        return view('admin.page.user_pengguna.cari', ['DataUserPengguna'=>$data_user_pengguna,'JumlahDataUserPengguna'=>$jumlah_data,'no'=>$no,'cari'=>$cari]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.user_pengguna.tambah');
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
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png',
        ])->validated();

        $user_pengguna = new UserPengguna;
        $user_pengguna->nama = $request->nama;
        $user_pengguna->username = $request->username;
        $user_pengguna->email = $request->email;
        $user_pengguna->password = bcrypt($request->password);
        $foto = $request->foto;
        $namafile = time().'.'.$foto->getClientOriginalExtension();
        $foto->move('public/foto_user/',$namafile);
        $user_pengguna->foto = $namafile;
        $user_pengguna->save();

        return redirect('/user_pengguna')->with('status','Data User Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_user_pengguna = UserPengguna::find($id);

        return view('admin.page.user_pengguna.detail', ['DataUserPengguna' => $data_user_pengguna]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_user_pengguna = UserPengguna::find($id);

        return view('admin.page.user_pengguna.edit',['DataUserPengguna' => $data_user_pengguna]);
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
            'username' => 'required',
            'email' => 'required|email',
        ]);

        $data_user_pengguna = UserPengguna::find($id);
        if($request->has('foto')){
            $namafileold = $data_user_pengguna->foto;
            if(File::exists('public/foto_pengguna/'.$namafileold)){
                File::delete('public/foto_pengguna/'.$namafileold);
            }
            if($request->input('password')){
                $data_user_pengguna->nama = $request->nama;
                $data_user_pengguna->username = $request->username;
                $data_user_pengguna->email = $request->email;
                $data_user_pengguna->password = bcrypt($request->password);
                $foto = $request->foto;
                $namafile = time().'.'.$foto->getClientOriginalExtension();
                $foto->move('public/foto_user/',$namafile);
                $data_user_pengguna->foto = $namafile;
            }else{
                $data_user_pengguna->nama = $request->nama;
                $data_user_pengguna->username = $request->username;
                $data_user_pengguna->email = $request->email;
                $data_user_pengguna->password = bcrypt($request->password);
                $foto = $request->foto;
                $namafile = time().'.'.$foto->getClientOriginalExtension();
                $foto->move('public/foto_user/',$namafile);
                $data_user_pengguna->foto = $namafile;
            }
        }else{
            if($request->input('password')){
                $data_user_pengguna->nama = $request->nama;
                $data_user_pengguna->username = $request->username;
                $data_user_pengguna->email = $request->email;
                $data_user_pengguna->password = bcrypt($request->password);
            }else{
                $data_user_pengguna->nama = $request->nama;
                $data_user_pengguna->username = $request->username;
                $data_user_pengguna->email = $request->email;
            }
        }
        $data_user_pengguna->update();

        return redirect('/user_pengguna')->with('status','Data User Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_user_pengguna = UserPengguna::find($id);
        $namafile = $data_user_pengguna->foto;
        if(File::exists('public/foto_user/'.$namafile)){
            File::delete('public/foto_user/'.$namafile);
        }
        $data_user_pengguna->delete();

        return redirect('/user_pengguna')->with('status', 'Data User Berhasil Dihapus');
    }
}
