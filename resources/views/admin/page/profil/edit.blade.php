@extends('admin.layouts.app')
@section('content-header')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Profil</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
              <a href="profil.php">Profil</a></li>
              <li class="breadcrumb-item active">Edit Profil</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>
@endsection

<!-- Main content -->
@section('main-content')
<section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;">
        <i class="far fa-list-alt"></i> Form Edit Profil</h3>
        <div class="card-tools">
          <a href="{{url('/profil')}}" class="btn btn-sm 
           btn-warning float-right">
          <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <br>
      
      
      <form class="form-horizontal" method="post"
      action="{{url('/profil.'.Auth::user()->id)}}">
      @csrf
      <input type="hidden" value="PUT" name="_method">
        <div class="card-body">          
          <div class="form-group row">
            <label for="foto" class="col-sm-12 col-form-label">
           <span class="text-info">
            <i class="fas fa-user-circle"></i> <u>
           PROFIL USER</u></span></label>
          </div>
          
          <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">
           Nama</label>
            <div class="col-sm-7">
              <input type="text" class="form-control 
              @error('nama') is-invalid @enderror" 
              name="nama" id="nama" 
              value="{{ Auth::user()->name }}">
            </div>
          </div>
          @error('nama')
              <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">
            Email</label>
            <div class="col-sm-7">
              <input type="text" class="form-control 
               @error('email') is-invalid @enderror"" 
              name="email" id="email" 
             value="{{ Auth::user()->email }}">
            </div>
          </div>
          @error('email')
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-info 
           float-right"><i class="fas fa-save"></i> Simpan</button>
          </div>  
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

</section>
@endsection
