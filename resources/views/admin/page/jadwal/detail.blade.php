@extends('admin.layouts.app')

@section('content-header')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h3><i class="fas fa-book"></i> Jadwal</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
              <a href="{{url('/profil')}}">Home</a></li>
              <li class="breadcrumb-item">
              <a href="{{url('/jadwal')}}">Data Jadwal</a></li>
              <li class="breadcrumb-item active">
             Detail Data Jadwal</li>
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
                  <a href="{{url('/jadwal')}}" class="btn btn-sm 
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
                        <td width="20%"><strong>Tanggal<strong></td>
                        <td width="80%">{{ $DataJadwal->tanggal }}</td>
                      </tr>                 
                      <tr>
                        <td width="20%"><strong>Jam Mulai<strong></td>
                        <td width="80%">{{ $DataJadwal->jam_mulai }}
                          </td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Jam Selesai<strong></td>
                        <td width="80%">{{ $DataJadwal->jam_selesai }}
                          </td>
                      </tr>
                      <tr>
                        <td><strong>Film<strong></td>
                        <td>
                          <ul>
                          @foreach($DataJadwal->film as $film)
                                <li> {{ $film->judul }}
                           </li>                               
                           @endforeach
                          </ul>
                        </td>
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
