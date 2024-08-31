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
                            Tambah Mahasiswa
                        </div>
                        <form class="m-2" method="post" enctype="multipart/form-data" action="">
                            @csrf
                            <div class="form-group mt-3">
                                <label for="foto_project" class="label">Foto portofolio (16:9)</label>
                                <div class="form-control h-100 text-center position-relative p-4 p-lg-5">
                                    <div class="product-upload">
                                        <label for="file-upload" class="file-upload mb-0">
                                            <span class="d-inline-block wh-110 bg-body-bg rounded-10 position-relative">
                                                <img id="upload" src="{{ asset('admin')}}/assets/images/upload.png" alt="your image"/>
                                            </span>
                                        </label>
                                        <input id="file-upload" name="foto" onchange="readURL(this);" type="file" hidden>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Nama Mahasiswa</label>
                                <input type="text" name="mahasiswa" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">NPM</label>
                                <input type="text" name="npm" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Deskripsi Maha</label>
                                <textarea name="deskripsi" class="form-control" id="editor"> </textarea>
                            </div>
                            <div class="mb-3">
                                <select class="form-select" name="jurusan" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    @foreach ($jurusan as $item)
                                        <option value="{{ $item->jurusan_id }}">--{{ $item->nama_jrs }}--</option>
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

    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>

        <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}"
                }
            })
            .catch(error => {
                console.error(error);
            });

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
