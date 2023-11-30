@extends('layouts.kour-main')
@section('content-kour')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- Add this to your HTML head section or include via CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />



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
                            <div class="col-lg-3 col-md-3">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <img src="../assets/img/icons/unicons/chart-success.png" alt="chart success"
                                                    class="rounded" />
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn p-0" type="button" id="cardOpt3"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Tambah</a>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="fw-medium d-block mb-4">Total Pengajuan</span>
                                        @php
                                            $countPengajuan = DB::table('pengajuan')
                                                ->where('IsDelete', 0)
                                                ->count();

                                        @endphp
                                        <h3 class="card-title mb-2">{{ $countPengajuan }}</h3>
                                    </div>
                                </div>
                            </div>

                            <!-- Card kedua - Sales -->
                            <div class="col-lg-3 col-md-3">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <img src="../assets/img/icons/unicons/wallet-info.png" alt="chart success"
                                                    class="rounded" />
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn p-0" type="button" id="cardOpt3"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Tambah</a>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="fw-medium d-block mb-4">Pengajuan Dalam Proses</span>
                                        @php
                                            $countProses = DB::table('pengajuan')
                                                ->where('IsApproved', '=', '0')
                                                ->where('IsDelete', '=', 0)
                                                ->count();
                                        @endphp

                                        <h3 class="card-title mb-2">{{ $countProses }}</h3>

                                    </div>
                                </div>
                            </div>

                            <!-- Card ketiga - Payments -->
                            <div class="col-lg-3 col-md-3">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card"
                                                    class="rounded" />
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn p-0" type="button" id="cardOpt4"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Tambah</a>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="fw-medium d-block mb-4">Pengajuan Yang Sudah Disetujui</span>
                                        @php
                                            $countSetuju = DB::table('pengajuan')
                                                ->where('IsApproved', '=', '1')
                                                ->where('IsDelete', 0)

                                                ->count();
                                        @endphp
                                        <h3 class="card-title text-nowrap mb-2">{{ $countSetuju }}</h3>
                                    </div>
                                </div>
                            </div>

                            <!-- Card keempat - Transactions -->
                            <div class="col-lg-3 col-md-3">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card"
                                                    class="rounded" />
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn p-0" type="button" id="cardOpt1"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Tambah</a>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="fw-medium d-block mb-4">Pengajuan Tidak Disetujui</span>
                                        @php
                                            $countNot = DB::table('pengajuan')
                                                ->where('IsApproved', '=', '2')
                                                ->where('IsDelete', '=', 0)
                                                ->count();
                                        @endphp

                                        <h3 class="card-title text-nowrap mb-2">{{ $countNot }}</h3>
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
                                                    {{ Session::get('message') }}
                                                </div>

                                                <script>
                                                    // Use setTimeout to hide the message after 3000 milliseconds (3 seconds)
                                                    setTimeout(function() {
                                                        document.getElementById('pesan-sukses').style.display = 'none';
                                                    }, 3000);
                                                </script>
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
                                                        @if ($da->IsDelete == 0)
                                                            <tr>
                                                                <td>{{ $da->tentang }}</td>
                                                                <td>{{ $da->created_at }}</td>
                                                                <td>{{ $da->nama_kategori }}</td>
                                                                <td>{{ $da->unit_kerja }}</td>
                                                                <td>
                                                                    @if ($da->IsApproved == 0)
                                                                        <i class="fa-regular fa-clock text-primary"></i>
                                                                        Menunggu Disetujui
                                                                    @elseif($da->IsApproved == 1)
                                                                        <i class="fas fa-check text-success"></i> Sudah
                                                                        Disetujui
                                                                    @else
                                                                        <i class="fas fa-times text-danger"></i> Tidak
                                                                        Disetujui
                                                                    @endif
                                                                </td>

                                                                <td class="text-center btn-group">
                                                                    <a href="{{ route('kour.discuss', ['id' => $da->id_pengajuan]) }}"
                                                                        class="btn btn-primary">Diskusi</a>
                                                                    <a href="{{ route('perijinan.show', ['id' => $da->id_pengajuan]) }}"
                                                                        class="btn btn-success">Perijinan</a>
                                                                </td>
                                                        @endif
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
