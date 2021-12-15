@extends('admin.layouts.app')

@section('content-header')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Data User</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
              <a href="{{url('/user_pengguna')}}">Data User</a></li>
              <li class="breadcrumb-item active">Edit Data 
              User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>
@endsection

@section('main-content')
<section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;">
        <i class="far fa-list-alt"></i> Form Edit Data User</h3>
        <div class="card-tools">
          <a href="{{url('/user_pengguna')}}" class="btn btn-sm btn-warning 
          float-right"><i class="fas fa-arrow-alt-circle-left">
         </i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br>
      <div class="col-sm-10">
      </div>
      <form class="form-horizontal" method="post" 
      action="{{ url('/user_pengguna.'.$DataUserPengguna->id_user_pengguna) }}"
      enctype="multipart/form-data">
      @csrf
      <input type="hidden" value="PUT" name="_method">
      <div class="card-body">
          <div class="form-group row">
            <label for="foto" class="col-sm-12 col-form-label">
             <span class="text-info">
            <i class="fas fa-user-circle"></i> <u>Data User</u>
           </span></label>
          </div>
          
          <div class="form-group row">
            <label for="foto" class="col-sm-3 col-form-label">Foto 
            </label>
            <div class="col-sm-7">
              <div class="custom-file">
                <input type="file" class="custom-file-input" 
                name="foto" id="custom-file-input">
                <label class="custom-file-label"  
                for="customFile" id="custom-file-label">Choose file</label>
                <span class="text-danger" 
                style="font-weight:lighter;font-size:12px">
               *Jangan diisi jika tidak ingin mengubah foto</span>
              </div>  
            </div>
          </div>

          @error('nama')
              <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">
             Nama</label>
            <div class="col-sm-7">
              <input type="text" class="form-control @error('nama') 
              is-invalid @enderror" name="nama" 
              id="nama" value="{{ $DataUserPengguna->nama}}">
            </div>
          </div>
         
          @error('username')
              <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="form-group row">
            <label for="username" class="col-sm-3 col-form-label">
             Username</label>
            <div class="col-sm-7">
              <input type="text" class="form-control @error('username') 
              is-invalid @enderror" name="username" 
              id="username" value="{{ $DataUserPengguna->username}}">
            </div>
          </div>
          
          @error('email')
              <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">
            Email</label>
            <div class="col-sm-7">
              <input type="text" class="form-control @error('nama')  
              is-invalid @enderror" name="email" 
              id="email" value="{{ $DataUserPengguna->email}}">
            </div>
          </div>
          
          <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">
             Password</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" 
              name="password" id="password" value="">
              <span class="text-danger" style="font-
               weight:lighter;font-size:12px">
               *Jangan diisi jika tidak ingin mengubah 
             password</span>
            </div>
          </div>

          </div>
        </div>

      </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
          </div>  
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

    </section>
@endsection
