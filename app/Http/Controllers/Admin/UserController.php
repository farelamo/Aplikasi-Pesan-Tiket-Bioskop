<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 5;
        $data_user = User::orderBy('name')->paginate($batas);
        $no = ($batas * ($data_user->currentPage()-1))+1;
        
        return view('admin.page.user.tampil',['DataUser' => $data_user, 'no' => $no]);
    }

    public function search(Request $request)
    {
        $batas = 5;
        $cari = $request->katakunci;
        $data_user = User::where('name','like','%'.$cari.'%')->orderBy('name')->paginate($batas);
        $jumlah_data = $data_user->count('id');
        $no = ($batas * ($data_user->currentpage()-1))+1;

        return view('admin.page.user.cari', ['DataUser'=>$data_user,'JumlahDataUser'=>$jumlah_data,'no'=>$no,'cari'=>$cari]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.user.tambah');
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
            'email' => 'required',
            'password' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png',
        ])->validated();

        $user = new User;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level = $request->level;
        $foto = $request->foto;
        $namafile = time().'.'.$foto->getClientOriginalExtension();
        $foto->move('public/foto/',$namafile);
        $user->foto = $namafile;
        $user->save();

        return redirect('/user')->with('status','Data User Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_user = User::find($id);

        return view('admin.page.user.detail', ['DataUser' => $data_user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_user = User::find($id);

        return view('admin.page.user.edit',['DataUser' => $data_user]);
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
            'email' => 'required|email',
        ]);

        $data_user = User::find($id);
        if($request->has('foto')){
            $namafileold = $data_user->foto;
            if(File::exists('public/foto/'.$namafileold)){
                File::delete('public/foto/'.$namafileold);
            }
            if($request->input('password')){
                $data_user->name = $request->nama;
                $data_user->email = $request->email;
                $data_user->password = bcrypt($request->password);
                $data_user->level = $request->level;
                $foto = $request->foto;
                $namafile = time().'.'.$foto->getClientOriginalExtension();
                $foto->move('public/foto/',$namafile);
                $data_user->foto = $namafile;
            }else{
                $data_user->name = $request->nama;
                $data_user->email = $request->email;
                $data_user->password = bcrypt($request->password);
                $data_user->level = $request->level;
                $foto = $request->foto;
                $namafile = time().'.'.$foto->getClientOriginalExtension();
                $foto->move('public/foto/',$namafile);
                $data_user->foto = $namafile;
            }
        }else{
            if($request->input('password')){
                $data_user->name = $request->nama;
                $data_user->email = $request->email;
                $data_user->password = bcrypt($request->password);
                $data_user->level = $request->level;
            }else{
                $data_user->name = $request->nama;
                $data_user->email = $request->email;
                $data_user->level = $request->level;
            }
        }
        $data_user->update();

        return redirect('/user')->with('status','Data User Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_user = User::find($id);
        $namafile = $data_user->foto;
        if(File::exists('public/foto/'.$namafile)){
            File::delete('public/foto/'.$namafile);
        }
        $data_user->delete();

        return redirect('/user')->with('status', 'Data User Berhasil Dihapus');
    }
}
