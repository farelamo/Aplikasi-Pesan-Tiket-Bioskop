@extends('admin.layouts.app')

@section('content-header')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Data Tiket</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
              <a href="{{url('/tiket')}}">Data Tiket</a></li>
              <li class="breadcrumb-item active">Edit Data 
              Tiket</li>
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
        <i class="far fa-list-alt"></i> Form Edit Data Tiket</h3>
        <div class="card-tools">
          <a href="{{url('/tiket')}}" class="btn btn-sm btn-warning 
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
      action="{{ url('/tiket.'.$DataTiket->id_tiket) }}"
      enctype="multipart/form-data">
      @csrf
      <input type="hidden" value="PUT" name="_method">
      <div class="card-body">
          <div class="form-group row">
            <label for="foto" class="col-sm-12 col-form-label">
             <span class="text-info">
            <i class="fas fa-tiket-circle"></i> <u>Data Tiket</u>
           </span></label>
          </div>

          @error('kursi')
              <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="form-group row">
        <label for="kursi" class="col-sm-3 col-form-label">
        Kursi</label>
        <div class="col-sm-7">
          <select class="form-control @error('kursi') is-invalid @enderror" id="kursi" name="kursi">
            <option value="">- Pilih Kursi -</option>
            @if (!empty($DataKursi))
                    @foreach($DataKursi as $key => $Kursi)
                        <option value="{{ $Kursi->id_kursi }}"
                        @if ($Kursi->id_kursi==$DataTiket->id_kursi)
                          selected
                        @endif
                        >{{ $Kursi->nomor_kursi }}</option>
                    @endforeach
                @endif

          </select>
        </div>
      </div>
      @error('harga')
      <span class="text-danger">{{ $message }}</span>
    @enderror
    <div class="form-group row">
      <label for="harga" class="col-sm-3 col-form-label">
      Harga</label>
      <div class="col-sm-7">
        <input type="text" class="form-control 
         @error('harga') is-invalid @enderror" 
        name="harga" id="harga" value="{{ $DataTiket->harga}}">
      </div>
    </div>
            
    @error('stok')
    <span class="text-danger">{{ $message }}</span>
  @enderror
  <div class="form-group row">
    <label for="stok" class="col-sm-3 col-form-label">
    Stok</label>
    <div class="col-sm-7">
      <input type="text" class="form-control 
       @error('stok') is-invalid @enderror" 
      name="stok" id="stok" value="{{ $DataTiket->stok}}">
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
