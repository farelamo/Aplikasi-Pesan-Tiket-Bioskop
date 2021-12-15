@extends('admin.layouts.app')

@section('content-header')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h3><i class="fas fa-book"></i> Film</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
              <a href="{{url('/profil')}}">Home</a></li>
              <li class="breadcrumb-item">
              <a href="{{url('/film')}}">Data Film</a></li>
              <li class="breadcrumb-item active">
             Detail Data Film</li>
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
                  <a href="{{url('/film')}}" class="btn btn-sm 
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
                        <td><strong>Cover Film<strong></td>
                        <td><img 
                 src="{{asset('public/cover/'.$DataFilm->cover)}}" 
                        class="img-fluid" width="200px;"></td>
                      </tr>             
                      <tr>
                        <td width="20%"><strong>Judul<strong></td>
                        <td width="80%">{{ $DataFilm->judul }}</td>
                      </tr>                 
                      <tr>
                        <td width="20%"><strong>Link<strong></td>
                        <td width="80%">{{ $DataFilm->link }}
                          </td>
                      </tr>
                      <tr>
                        <td><strong>Genre<strong></td>
                        <td>
                          <ul>
                          @foreach($DataFilm->genre as $genre)
                                <li> {{ $genre->genre }}
                           </li>                               
                           @endforeach
                          </ul>
                        </td>
                      </tr>
                      <tr>
                        <td><strong>Kategori<strong></td>
                        <td>
                          <ul>
                          @foreach($DataFilm->kategori as $kategori)
                                <li> {{ $kategori->kategori }}
                           </li>                               
                           @endforeach
                          </ul>
                        </td>
                      </tr>
                      <tr>
                        <td><strong>Bioskop<strong></td>
                        <td>
                          <ul>
                          @foreach($DataFilm->bioskop as $bioskop)
                                <li> {{ $bioskop->nama }}
                           </li>                               
                           @endforeach
                          </ul>
                        </td>
                      </tr>
                      <tr>
                        <td width="20%">
                         <strong>Sinopsis<strong></td>
                        <td width="80%">
                        {{ $DataFilm->sinopsis }}</td>
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
