@extends('admin.layouts.app')

@section('content-header')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-plus"></i> Tambah Film</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
              <a href="{{url('/film')}}">Data Film</a></li>
              <li class="breadcrumb-item active">Tambah Film</li>
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
        action="{{ url('/film') }}"
        enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group row">
            <label for="foto" class="col-sm-12 col-form-label">
           <span class="text-info">
            <i class="fas fa-user-circle"></i> <u>Data Film</u>
            </span></label>
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
                <label class="custom-file-label" id="custom-file-label"
                for="customFile">Choose file</label>
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
               @error('judul') is-invalid @enderror" name="judul" 
               id="judul" value="">
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
                is-invalid @enderror" name="sinopsis" id="editor1" 
                rows="12"></textarea>
              </div>
            </div>  
            
          @error('link')
              <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="form-group row">
            <label for="link" class="col-sm-3 col-form-label">
            Link</label>
            <div class="col-sm-7">
              <input type="text" class="form-control 
                @error('link') is-invalid @enderror" name="link" 
                id="link" value="">
            </div>
          </div>
          
          <div class="form-group row">
            <label for="genre" class="col-sm-3 col-form-label">
            Genre</label>
            <div class="col-sm-7">
            @if (!empty($DataGenre))
                @foreach($DataGenre as $key => $Genre)
                    <input type="checkbox" name="list_genre[]" 
                    value="{{ $Genre->id_genre }}"> {{ $Genre->genre }} 
                    <br>
                @endforeach
            @endif
            </div>
          </div>
          
          <div class="form-group row">
            <label for="kategori" class="col-sm-3 col-form-label">
            Kategori</label>
            <div class="col-sm-7">
            @if (!empty($DataKategori))
                @foreach($DataKategori as $key => $Kategori)
                    <input type="checkbox" name="list_kategori[]" 
                    value="{{ $Kategori->id_kategori }}"> {{ $Kategori->kategori }} 
                    <br>
                @endforeach
            @endif
            </div>
          </div>
          
          <div class="form-group row">
            <label for="kategori" class="col-sm-3 col-form-label">
            Bioskop</label>
            <div class="col-sm-7">
            @if (!empty($DataBioskop))
                @foreach($DataBioskop as $key => $Bioskop)
                    <input type="checkbox" name="list_bioskop[]" 
                    value="{{ $Bioskop->id_bioskop }}"> {{ $Bioskop->nama }} 
                    <br>
                @endforeach
            @endif
            </div>
          </div>
            {{--           
              <div class="form-group row">
            <label for="kategori" class="col-sm-3 col-form-label">
            Kategori Buku</label>
            <div class="col-sm-7">
              <select class="form-control @error('kategori_buku') 
          is-invalid @enderror" id="kategori" name="kategori_buku">
                <option value="">- Pilih Kategori -</option>
                @if (!empty($DataKategori))
                    @foreach($DataKategori as $key => $Kategori)
                        <option value="{{ $Kategori->
                       id_kategori_buku }}">{{ $Kategori->
                       kategori_buku }}</option>
                    @endforeach
                @endif
              </select>
            </div>
          </div> --}}
          {{-- @error('kategori_buku')
              <span class="text-danger">{{ $message }}</span>
          @enderror --}}


          </div>
        </div>

      </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-info float-right">
             <i class="fas fa-plus"></i> Tambah</button>
          </div>  
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

    </section>
<!-- /.content -->
@endsection
