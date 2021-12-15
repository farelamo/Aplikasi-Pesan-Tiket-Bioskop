@extends('admin.layouts.app')
@section('content-header')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Data Transaksi</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a 
               href="{{url('/transaksi')}}">Data Transaksi</a></li>
              <li class="breadcrumb-item active">Edit Transaksi</li>
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
        <i class="far fa-list-alt"></i> Form Tambah Data Transaksi</h3>
        <div class="card-tools">
          <a href="{{url('/transaksi')}}" class="btn btn-sm btn-warning 
         float-right"><i class="fas fa-arrow-alt-circle-left"></i> 
        Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br>
      <div class="col-sm-10">
      </div>
      <form class="form-horizontal" method="post" 
       action="{{ url('/transaksi.'.$DataTransaksi->id_transaksi) }}"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="PUT" name="_method">
        <div class="card-body">
          <div class="form-group row">
            <label for="foto" class="col-sm-12 col-form-label">
            <span class="text-info">
            <i class="fas fa-user-circle"></i> <u>
           Data Transaksi</u></span></label>
          </div>        
          
          @error('user_pengguna')
              <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="form-group row">
        <label for="user_pengguna" class="col-sm-3 col-form-label">
        User Pengguna</label>
        <div class="col-sm-7">
          <select class="form-control @error('user_pengguna') is-invalid @enderror" id="user_pengguna" name="user_pengguna">
            <option value="">- Pilih User_pengguna -</option>
            @if (!empty($DataUserPengguna))
                    @foreach($DataUserPengguna as $key => $UserPengguna)
                        <option value="{{ $UserPengguna->id_user_pengguna }}"
                        @if ($UserPengguna->id_user_pengguna==$DataTransaksi->id_user_pengguna)
                          selected
                        @endif
                        >{{ $UserPengguna->nama }}</option>
                    @endforeach
                @endif

          </select>
        </div>
      </div>

      @error('jadwal')
              <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="form-group row">
        <label for="jadwal" class="col-sm-3 col-form-label">
        Jadwal</label>
        <div class="col-sm-7">
          <select class="form-control @error('jadwal') is-invalid @enderror" id="jadwal" name="jadwal">
            <option value="">- Pilih Jadwal -</option>
            @if (!empty($DataJadwal))
                    @foreach($DataJadwal as $key => $Jadwal)
                        <option value="{{ $Jadwal->id_jadwal }}"
                        @if ($Jadwal->id_jadwal==$DataTransaksi->id_jadwal)
                          selected
                        @endif
                        >{{ $Jadwal->tanggal }}</option>
                    @endforeach
                @endif

          </select>
        </div>
      </div>

          @error('total_tiket')
          <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="form-group row">
            <label for="total_tiket" class="col-sm-3 col-form-label">
             Total Tiket</label>
            <div class="col-sm-7">
              <input type="text" class="form-control 
              @error('total_tiket') is-invalid @enderror" 
              name="total_tiket" id="total_tiket" value="{{ $DataTransaksi->total_tiket }}">
            </div>
          </div>
          
          @error('total_harga')
          <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="form-group row">
            <label for="total_harga" class="col-sm-3 col-form-label">
             Total Harga</label>
            <div class="col-sm-7">
              <input type="text" class="form-control 
              @error('total_harga') is-invalid @enderror" 
              name="total_harga" id="total_harga" value="{{ $DataTransaksi->total_harga }}">
            </div>
          </div>
          
          @error('notifikasi')
              <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="form-group row">
        <label for="notifikasi" class="col-sm-3 col-form-label">
        Notifikasi</label>
        <div class="col-sm-7">
          <select class="form-control @error('notifikasi') is-invalid @enderror" id="notifikasi" name="notifikasi">
            <option value="">- Pilih Notifikasi -</option>
            @if (!empty($DataNotifikasi))
                    @foreach($DataNotifikasi as $key => $Notifikasi)
                        <option value="{{ $Notifikasi->id_notifikasi }}"
                        @if ($Notifikasi->id_notifikasi==$DataTransaksi->id_notifikasi)
                          selected
                        @endif
                        >{{ $Notifikasi->status }}</option>
                    @endforeach
                @endif

          </select>
        </div>
      </div>

          <div class="form-group row">
            <label for="hobi" class="col-sm-3 col-form-label">
            Tiket</label>
            <div class="col-sm-7">
            @if (!empty($DataTiket))
                @foreach($DataTiket as $key => $Tiket)
                    <input type="checkbox" name="list_tiket[]" 
                    value="{{ $Tiket->id_tiket }}"
                    @if (in_array($Tiket->id_tiket, $TransaksiTiket))
                    checked
                    @endif
                    > {{ $Tiket->harga }} <br>
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
            <button type="submit" class="btn btn-info float-right">
            <i class="fas fa-save"></i> Simpan</button>
          </div>  
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

    </section>
<!-- /.content -->
@endsection
