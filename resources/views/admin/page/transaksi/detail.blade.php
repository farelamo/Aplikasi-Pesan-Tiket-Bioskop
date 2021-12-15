@extends('admin.layouts.app')

@section('content-header')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h3><i class="fas fa-book"></i> Transaksi</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
              <a href="{{url('/profil')}}">Home</a></li>
              <li class="breadcrumb-item">
              <a href="{{url('/transaksi')}}">Data Transaksi</a></li>
              <li class="breadcrumb-item active">
             Detail Data Transaksi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection

@section('main-content')
<section class="content">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                  <a href="{{url('/transaksi')}}" class="btn btn-sm 
                  btn-warning float-right">
                  <i class="fas fa-arrow-alt-circle-left">
                 </i> Kembali</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                    <tbody>            
                      <tr>
                        <td width="20%"><strong>User Pengguna<strong></td>
                        <td width="80%">{{ $DataTransaksi->user_pengguna->nama }}</td>
                      </tr>                 
                      <tr>
                        <td width="20%"><strong>Jadwal<strong></td>
                        <td width="30%">{{ $DataTransaksi->jadwal->tanggal }}</td>
                        <td width="25%">{{ $DataTransaksi->jadwal->jam_mulai }}</td>
                        <td width="25%">{{ $DataTransaksi->jadwal->jam_selesai }}</td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Total Tiket<strong></td>
                        <td width="80%">{{ $DataTransaksi->total_tiket }}</td>
                      </tr> 
                      <tr>
                        <td width="20%"><strong>Total Harga<strong></td>
                        <td width="80%">{{ $DataTransaksi->total_harga }}</td>
                      </tr> 
                      <tr>
                        <td width="20%"><strong>Notifikasi<strong></td>
                        <td width="80%"><b>{{ $DataTransaksi->notifikasi->status }}</b></td>
                      </tr> 
                      <tr>
                        <td><strong>Tiket<strong></td>
                        <td>
                          <ul>
                          @foreach($DataTransaksi->tiket as $tiket)
                                <li> {{ $tiket->harga }} </li>                               
                           @endforeach
                          </ul>
                        </td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Created By<strong></td>
                        <td width="80%">{{ $DataTransaksi->users->name }}</td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Created At<strong></td>
                        <td width="80%">{{ $DataTransaksi->created_at }}</td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Updated By<strong></td>
                        <td width="80%">{{ $DataTransaksi->users2->name }}</td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Updated At<strong></td>
                        <td width="80%">{{ $DataTransaksi->updated_at }}</td>
                      </tr>
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">&nbsp;</div>
            </div>
            <!-- /.card -->

    </section>
@endsection
