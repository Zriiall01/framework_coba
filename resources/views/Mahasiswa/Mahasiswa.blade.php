@extends('layout.template')
@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Data Mahasiswa</h3>
        </div>

        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-9">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Mahasiswa</h4>
                                    <a class="btn btn-success" href="/Tambah_mahasiswa" role="button">add</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Foto</th>
                                                    <th>Nama Mahasiswa</th>
                                                    <th>NPM</th>
                                                    <th>Deskripsi</th>
                                                    <th>Jurusan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($mahasiswa as $item)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td><img class="rounded mx-auto d-block w-50 h-50" src="{{ asset('gambar/'. $item->foto) }}" alt=""></td>
                                                        <td>{{ $item->nama_mhs }}</td>
                                                        <td>{{ $item->nim_mhs }}</td>
                                                        <td>{!! $item->deskripsi !!}</td>
                                                        <td>{{ $item->nama_jrs }}</td>
                                                        <td>
                                                            <a href="/Edit_mahasiswa/{{ $item->mahasiswa_id }}/Edit"
                                                                class="badge bg-secondary text-light">Edit</a>
                                                            <a onclick="return confirm('Hapus Data')"
                                                                href="/Hapus_mahasiswa/{{ $item->mahasiswa_id }}/Edit"
                                                                class="badge bg-danger text-light">Hapus</a>
                                                        </td>
                                                        <td><a href="#"><i
                                                                    class="badge-circle badge-circle-light-secondary font-medium-1"
                                                                    data-feather="mail"></i></a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card">
                        <div class="card-body py-4 px-5">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl">
                                    <img src="{{ asset('admin') }}/assets/images/faces/1.jpg" alt="Face 1">
                                </div>
                                <div class="ms-3 name">
                                    <h6 class="text-muted mb-0">You are logged in as </h6>
                                        <p class="font-bold">{{ Auth::user()->name }}.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endsection
