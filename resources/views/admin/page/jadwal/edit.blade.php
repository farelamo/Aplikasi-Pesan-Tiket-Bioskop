@extends('admin.layouts.app')

@section('content-header')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Data Jadwal</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
              <a href="{{url('/jadwal')}}">Data Jadwal</a></li>
              <li class="breadcrumb-item active">Edit Data 
              Jadwal</li>
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
        <i class="far fa-list-alt"></i> Form Edit Data Jadwal</h3>
        <div class="card-tools">
          <a href="{{url('/jadwal')}}" class="btn btn-sm btn-warning 
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
      action="{{ url('/jadwal.'.$DataJadwal->id_jadwal) }}"
      enctype="multipart/form-data">
      @csrf
      <input type="hidden" value="PUT" name="_method">
      <div class="card-body">
          <div class="form-group row">
            <label for="foto" class="col-sm-12 col-form-label">
             <span class="text-info">
            <i class="fas fa-jadwal-circle"></i> <u>Data Jadwal</u>
           </span></label>
          </div>

      @error('tanggal')
      <span class="text-danger">{{ $message }}</span>
    @enderror
    <div class="form-group row">
      <label for="tanggal" class="col-sm-3 col-form-label">
      Tanggal</label>
      <div class="col-sm-7">
        <input type="text" class="form-control 
         @error('tanggal') is-invalid @enderror" 
        name="tanggal" id="tanggal" value="{{ $DataJadwal->tanggal}}">
      </div>
    </div>
            
    @error('jam_mulai')
    <span class="text-danger">{{ $message }}</span>
  @enderror
  <div class="form-group row">
    <label for="jam_mulai" class="col-sm-3 col-form-label">
    Jam Mulai</label>
    <div class="col-sm-7">
      <input type="text" class="form-control 
       @error('jam_mulai') is-invalid @enderror" 
      name="jam_mulai" id="jam_mulai" value="{{ $DataJadwal->jam_mulai}}">
    </div>
  </div>

    @error('jam_selesai')
    <span class="text-danger">{{ $message }}</span>
  @enderror
  <div class="form-group row">
    <label for="jam_mulai" class="col-sm-3 col-form-label">
    Jam Selesai</label>
    <div class="col-sm-7">
      <input type="text" class="form-control 
       @error('jam_selesai') is-invalid @enderror" 
      name="jam_selesai" id="jam_selesai" value="{{ $DataJadwal->jam_selesai}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="hobi" class="col-sm-3 col-form-label">
    Film</label>
    <div class="col-sm-7">
    @if (!empty($DataFilm))
        @foreach($DataFilm as $key => $Film)
            <input type="checkbox" name="list_film[]" 
            value="{{ $Film->id_film }}"
            @if (in_array($Film->id_film, $JadwalFilm))
            checked
            @endif
            > {{ $Film->judul }} <br>
        @endforeach
    @endif
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
