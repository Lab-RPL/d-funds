@extends('layouts.kour-main')
@section('content-kour')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <div class="layout-page">
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">

                            <div class="col-lg-12 col-md-12">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                @php
                                                    $adminUser = \App\Models\User::where('user_type', 'kour')->first();
                                                @endphp
                                                <h2 class="card-title">
                                                    @if ($adminUser)
                                                        Selamat Datang, {{ $adminUser->username }} di DFUNDS
                                                    @else
                                                        Selamat Datang di DFUNDS
                                                    @endif
                                                </h2>
                                            </div>
                                            <img src="../assets/img/illustrations/man-with-laptop-light.png"
                                                alt="Welcome Image" width="160">
                                        </div>
                                        <!-- Card content here -->
                                    </div>
                                </div>
                            </div>


                            <!-- Tabel Data -->
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body"> <!-- Tombol Tambah -->
                                        <!-- Formulir dengan Tabel -->
                                        <form>
                                            @if (Session::has('message'))
                                                <div id="pesan-sukses" class="alert alert-success mt-4">
                                                    {{ Session::get('message') }}</div>
                                            @endif
                                            <table id="tabelData" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" id="headr">Tentang</th>
                                                        <th class="text-center" id="headr">Tanggal Pengajuan</th>
                                                        <th class="text-center" id="headr">Kategori</th>
                                                        <th class="text-center" id="headr">Unit Kerja</th>
                                                        <th class="text-center" id="headr">Status</th>
                                                        <th class="text-center" id="headr">Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $da)
                                                        <tr>
                                                            <td>{{ $da->tentang }}</td>
                                                            <td>{{ $da->created_at }}</td>
                                                            <td>{{ $da->nama_kategori }}</td>
                                                            <td>{{ $da->unit_kerja }}</td>
                                                            <td></td>
                                                            <td class="text-center">
                                                                <a href="#" class="btn btn-primary">Diskusi</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $('#tabelData').DataTable({
            lengthMenu: [
                [5, 10, 25, -1],
                [5, 10, 25, "All"]
            ],

            pageLength: 5 // Menampilkan 5 data per halaman
        });
    </script>
@endsection
