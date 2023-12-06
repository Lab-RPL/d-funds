@extends('layouts.pelaksana-main')
@section('content-pelaksana')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
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
                                            @php
                                            // Menggunakan helper session() untuk mengambil data dari sesi
                                            $userId = session('user_id');

                                            // Mendapatkan username berdasarkan user_id
                                            $user = \App\Models\admin::find($userId);
                                            $userName = $user ? $user->username : null;
                                        @endphp

                                        <div class="flex-grow-1">
                                            <h2 class="card-title">
                                                @if ($userName)
                                                    Selamat Datang, {{ $userName }} di DFUNDS
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

                            <!-- Card pertama - Profit -->
                            <div class="col-lg-12 col-md-12">
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
                                        <span class="fw-medium d-block mb-4">Total Pengajuan Yang Sudah Disetujui</span>
                                        @php
                                            $countPengajuan = DB::table('pengajuan')
                                                ->where('IsDelete', 0)
                                                ->where('IsApproved', '=', '1')
                                                ->count();
                                        @endphp
                                        <h3 class="card-title mb-2">{{ $countPengajuan }}</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="approvalModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="approvalModal">Status Pengajuan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <!-- Your form goes here -->
                                            <form action="{{ route('pelaksana.action') }}" method="post">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="approvalStatus" class="form-label">Status</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="statusPelaksana"
                                                            id="diproses" value="1" required>
                                                        <label class="form-check-label" for="diproses">
                                                            Sedang Diproses
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="statusPelaksana"
                                                            id="diajukanPUMK" value="2" required>
                                                        <label class="form-check-label" for="diajukanPUMK">
                                                            Sudah Diajukan PUMK
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="statusPelaksana"
                                                            id="revisi" value="2" required>
                                                        <label class="form-check-label" for="revisi">
                                                            Proses Revisi
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="statusPelaksana"
                                                            id="terbayar" value="4" required>
                                                        <label class="form-check-label" for="terbayar">
                                                            Sudah Terbayar
                                                        </label>
                                                    </div>
                                                </div>

                                                <!-- Use the hidden field to store the id_pengajuan -->
                                                <input type="hidden" name="id_pengajuan" id="approvalId">

                                                <div class="mb-3">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="modal-footer">
                                            <!-- Footer content goes here -->
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Tabel Data -->
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- Formulir dengan Tabel -->
                                        <form>
                                            @if (Session::has('message'))
                                            <div id="pesan-sukses" class="alert alert-success mt-4">
                                                {{ Session::get('message') }}
                                            </div>
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
                                                                    @if ($da->status_pelaksana == 0)
                                                                        <i class="fa-regular fa-hourglass-half text-primary"></i> Belum Diproses
                                                                    @elseif($da->status_pelaksana == 1)
                                                                        <i class="fas fa-clock text-warning"></i> Sedang Diproses
                                                                    @elseif($da->status_pelaksana == 2)
                                                                        <i class="fas fa-clock text-warning"></i> Sudah Diajukan PUMK
                                                                    @elseif($da->status_pelaksana == 3)
                                                                        <i class="fas fa-clock text-warning"></i> Proses Revisi
                                                                    @else
                                                                        <i class="fas fa-check text-success"></i> Sudah Terbayar
                                                                    @endif
                                                                </td>
                                                                <td class="text-center">
                                                                    <a href="{{ route('pelaksana.discuss', ['id' => $da->id_pengajuan]) }}"
                                                                        class="btn btn-primary"><i class="fas fa-comments"></i></a>
                                                                    <button class="btn btn-success btn-approval"
                                                                        data-id="{{ $da->id_pengajuan }}"><i class="fas fa-file-signature"></i></button>
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

        setTimeout(function() {
            document.getElementById('pesan-sukses').style.display = 'none';
        }, 3000);

        $(document).ready(function() {
            // Function to handle the approval modal
            $('.btn-approval').click(function(e) {
                var pengajuanId = $(this).data('id');
                $('#approvalId').val(pengajuanId);
                $('#approvalModal').modal('show');
                e.preventDefault();
            });
        });
    </script>
@endsection
