@extends('admin.layouts.app')
@section('content-header')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Data Film</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a 
               href="{{url('/film')}}">Data Film</a></li>
              <li class="breadcrumb-item active">Edit Film</li>
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
        <i class="far fa-list-alt"></i> Form Tambah Data Film</h3>
        <div class="card-tools">
          <a href="{{url('/film')}}" class="btn btn-sm btn-warning 
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
       action="{{ url('/film.'.$DataFilm->id_film) }}"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="PUT" name="_method">
        <div class="card-body">
          <div class="form-group row">
            <label for="foto" class="col-sm-12 col-form-label">
            <span class="text-info">
            <i class="fas fa-user-circle"></i> <u>
           Data Film</u></span></label>
          </div>
          @error('cover')
              <span class="text-danger">{{ $message }}</span>
          @enderror          
          <div class="form-group row">
            <label for="cover" class="col-sm-3 col-form-label">
            Cover </label>
            <div class="col-sm-7">
              <div class="custom-file">
                <input type="file" class="custom-file-input 
              @error('cover') is-invalid @enderror" name="cover" 
               id="custom-file-input">
                <label class="custom-file-label" 
                for="customFile" id="custom-file-label">Choose file</label>
              </div>  
            </div>
          </div>          
          
          @error('judul')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="form-group row">
            <label for="judul" class="col-sm-3 col-form-label">
            Judul</label>
            <div class="col-sm-7">
              <input type="text" class="form-control 
               @error('judul') is-invalid @enderror" 
              name="judul" id="judul" value="{{ $DataFilm->judul}}">
            </div>
          </div>
          
          @error('sinopsis')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="form-group row">
            <label for="sinopsis" class="col-sm-3 col-form-label">
            Sinopsis</label>
            <div class="col-sm-7">
              <textarea class="form-control @error('sinopsis') 
               is-invalid @enderror" 
              name="sinopsis" id="editor1" rows="12">{{ $DataFilm->sinopsis }}</textarea>
            </div>
          </div>  
          
          @error('link')
          <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="form-group row">
            <label for="pengarang" class="col-sm-3 col-form-label">
             Link</label>
            <div class="col-sm-7">
              <input type="text" class="form-control 
              @error('link') is-invalid @enderror" 
              name="link" id="link" value="{{ $DataFilm->link }}">
            </div>
          </div>
          

          <div class="form-group row">
            <label for="hobi" class="col-sm-3 col-form-label">
            Genre</label>
            <div class="col-sm-7">
            @if (!empty($DataGenre))
                @foreach($DataGenre as $key => $Genre)
                    <input type="checkbox" name="list_genre[]" 
                    value="{{ $Genre->id_genre }}"
                    @if (in_array($Genre->id_genre, $FilmGenre))
                    checked
                    @endif
                    > {{ $Genre->genre }} <br>
                @endforeach
            @endif
            </div>
          </div>
          
          <div class="form-group row">
            <label for="hobi" class="col-sm-3 col-form-label">
            Kategori</label>
            <div class="col-sm-7">
            @if (!empty($DataKategori))
                @foreach($DataKategori as $key => $Kategori)
                    <input type="checkbox" name="list_kategori[]" 
                    value="{{ $Kategori->id_kategori }}"
                    @if (in_array($Kategori->id_kategori, $FilmKategori))
                    checked
                    @endif
                    > {{ $Kategori->kategori }} <br>
                @endforeach
            @endif
            </div>
          </div>
          
          <div class="form-group row">
            <label for="hobi" class="col-sm-3 col-form-label">
            Bioskop</label>
            <div class="col-sm-7">
            @if (!empty($DataBioskop))
                @foreach($DataBioskop as $key => $Bioskop)
                    <input type="checkbox" name="list_bioskop[]" 
                    value="{{ $Bioskop->id_bioskop }}"
                    @if (in_array($Bioskop->id_bioskop, $FilmBioskop))
                    checked
                    @endif
                    > {{ $Bioskop->nama }} <br>
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
