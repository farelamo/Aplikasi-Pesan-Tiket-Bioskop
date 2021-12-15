@extends('admin.layouts.app')

@section('content-header')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Data Kursi</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
              <a href="{{url('/kursi')}}">Data Kursi</a></li>
              <li class="breadcrumb-item active">Edit Data 
              Kursi</li>
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
        <i class="far fa-list-alt"></i> Form Edit Data Kursi</h3>
        <div class="card-tools">
          <a href="{{url('/kursi')}}" class="btn btn-sm btn-warning 
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
      action="{{ url('/kursi.'.$DataKursi->id_kursi) }}"
      enctype="multipart/form-data">
      @csrf
      <input type="hidden" value="PUT" name="_method">
      <div class="card-body">
          <div class="form-group row">
            <label for="foto" class="col-sm-12 col-form-label">
             <span class="text-info">
            <i class="fas fa-kursi-circle"></i> <u>Data Kursi</u>
           </span></label>
          </div>

          @error('kursi')
              <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="form-group row">
            <label for="nomor_kursi" class="col-sm-3 col-form-label">
             Nomor Kursi</label>
            <div class="col-sm-7">
              <input type="text" class="form-control @error('nomor_kursi') 
              is-invalid @enderror" name="nomor_kursi" 
              id="nomor_kursi" value="{{ $DataKursi->nomor_kursi}}">
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
