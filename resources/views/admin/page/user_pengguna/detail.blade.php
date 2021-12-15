@extends('admin.layouts.app')

@section('content-header')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> 
           Detail Data User</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a 
              href="{{url('/profil')}}">Home</a></li>
              <li class="breadcrumb-item"><a 
              href="{{url('/user_pengguna')}}">Data User</a></li>
              <li class="breadcrumb-item active">Detail Data 
              User</li>
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
                  <a href="{{url('/user_pengguna')}}" class="btn btn-sm 
                  btn-warning float-right">
                  <i class="fas fa-arrow-alt-circle-left"></i> 
                 Kembali</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                    <tbody>  
                      <tr>
                        <td colspan="2"><i class="fas fa-user-
                     circle"></i> <strong>Data User<strong></td>
                      </tr>                      
                      <tr>
                        <td><strong>Foto User<strong></td>
                        <td><img src="{{asset('public/foto_user/'.$DataUserPengguna->foto)}}"class="img-fluid" width="200px;"></td>
                      </tr>               
                      <tr>
                        <td width="20%"><strong>Nama<strong></td>
                        <td width="80%">{{ $DataUserPengguna->nama}}</td>
                      </tr>                 
                      <tr>
                        <td width="20%"><strong>Username<strong></td>
                        <td width="80%">{{ $DataUserPengguna->username}}</td>
                      </tr>                 
                      <tr>
                        <td width="20%"><strong>Email<strong></td>
                        <td width="80%">{{ $DataUserPengguna->email}}</td>
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
