@extends('layout.template')
@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>Wooooyyy Lagi santai</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <!-- Total Mahasiswa -->
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Total Mahasiswa</h6>
                                        <h6 class="font-extrabold mb-0">{{ $totalmahasiswa }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Gender Statistics -->
                    @foreach ($genderCount as $gender)
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon {{ $gender->gender == 'Male' ? 'blue' : 'pink' }}">
                                            <i class="iconly-boldAdd-User"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">{{ ucfirst($gender->gender) }} Students</h6>
                                        <h6 class="font-extrabold mb-0">{{ $gender->count }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Jurusan Cards with Student Count -->
                    @foreach ($totaljurusan as $jurusan)
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class='bx bx-book'></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">{{ $jurusan->nama_jrs }}</h6>
                                        <h6 class="font-extrabold mb-0">{{ $jurusan->mahasiswa_count }} Students</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Mahasiswa Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Mahasiswa</h4>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>NAMA MAHASISWA</th>
                                                <th>NPM</th>
                                                <th>JURUSAN</th>
                                                <th>GENDER</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($mahasiswa as $item)
                                            <tr>
                                                <td>{{ $item->nama_mhs }}</td>
                                                <td>{{ $item->nim_mhs }}</td>
                                                <td>{{ $item->nama_jrs }}</td>
                                                <td>{{ ucfirst($item->gender) }}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="4">No students found.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Profile Card (remains as is) -->
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body py-4 px-5">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="{{ asset('admin') }}/assets/images/faces/1.jpg" alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <h6 class="text-muted mb-0">You are logged in as </h6>
                                <p class="font-weight-bold">{{ Auth::user()->name }}.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
