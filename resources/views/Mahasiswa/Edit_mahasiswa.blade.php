@extends('layout.template')
@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>Tambah Mahasiswa</h3>
    </div>

    <div class="page-content">
        <section class="row">
        <div class="card m-3">
            <div class="card-body">
            <div class="card-header text-center">
            Edit Mahasiswa
            </div>
        <form class="m-2" method="post" action="" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-3">
                <label for="foto_project" class="label">Foto portofolio (16:9)</label>
                <div class="form-control h-100 text-center position-relative p-4 p-lg-5">
                    <div class="product-upload">
                        <label for="file-upload" class="file-upload mb-0">
                            <span class="d-inline-block wh-110 bg-body-bg rounded-10 position-relative">
                                <img id="upload" src="{{ asset('gambar/'. $data->foto)}}" alt="your image"/>
                            </span>
                        </label>
                        <input id="file-upload" value="{{ old('foto') ?? $data->foto}}" name="foto" onchange="readURL(this);" type="file" hidden>
                    </div>
                </div>
            </div>
            <div class="mb-2">
            <label for="exampleInputEmail1" class="form-label">Nama Mahasiswa</label>
            <input type="text" value="{{ $data->nama_mhs }}" name="mahasiswa" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">NPM</label>
            <input type="text" value="{{  $data->nim_mhs }}" name="npm" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
            <select class="form-select" name="jurusan" id="floatingSelect" aria-label="Floating label select example">
            @foreach ($jurusan as $item)
            <option value="{{ $item->jurusan_id }}">--{{$item->nama_jrs}}--</option>  
            @endforeach
            </select>
            </div>

            <button type="submit" name="simpan" class="btn btn-primary">Submit</button>
        </form>
        </div>
        </div>
        </div>
    </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
        function readURL(input){
          if (input.files && input.files[0]){
            var reader = new FileReader();
      
            reader.onload = function(e){
              $('#upload').attr('src', e.target.result);
            };
      
            reader.readAsDataURL(input.files[0]);
          }
        }
      </script>
@endsection