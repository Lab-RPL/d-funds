
@extends('layouts.kour-main')
@section('content-kour')

<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <div class="layout-page">
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">

                        <div class="col-lg-12 col-md-12 mb-3">
                            <div class="card">
                                <h5 class="card-header bg-primary text-white">Informasi Pengajuan Draft Unit Kerja</h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                        <tr class="table-default">
                                            <td class="bg-label-primary">
                                            <span class="fw-medium">Tentang</span>
                                            </td>
                                            <td>Pengangkatan Dosen Semester Gasal</td>
                                        </tr>

                                        <tr >
                                            <td class="bg-label-primary">
                                                <span class="fw-medium">Tanggal Pengajuan</span>
                                            </td>
                                            <td>09 - 12 - 2022</td>
                                        </tr>

                                        <tr >
                                            <td class="bg-label-primary">

                                            <span class="fw-medium">Kategori</span>
                                            </td>
                                            <td>Keputusan</td>
                                        </tr>
                                        
                                        <tr >
                                            <td class="bg-label-primary">
                                    
                                            <span class="fw-medium">Unit Kerja</span>
                                            </td>
                                            <td>Kantor Hukor Universitas</td>
                                        </tr>

                                        <tr >
                                            <td class="bg-label-primary">
                        
                                            <span class="fw-medium">Berkas pendukung</span>
                                            </td>
                                            <td>Sarah Banks</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <h5 class="card-header bg-primary text-white">Diskusi</h5>
                                <div class="card-body">
                                    <!-- Form untuk menambahkan komentar -->
                                    <form>
                                        <div class="mb-3">
                                            <label for="comment" class="form-label">Tambahkan Komentar:</label>
                                            <textarea class="form-control" id="comment" rows="3"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="uploadFile" class="form-label">Unggah Dokumen:</label>
                                            <input type="file" class="form-control" id="uploadFile">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                    </form>
                        
                                    <!-- Daftar komentar -->
                                    <div class="mt-4">
                                        <h6>Komentar Sebelumnya:</h6>
                                        <ul class="list-group">
                                            <!-- Contoh Komentar -->
                                            <li class="list-group-item">
                                                <strong>User:</strong> Komentar pertama.
                                            </li>
                                            <li class="list-group-item">
                                                <strong>User2:</strong> apakah saya sudah memberikan dokumen?.
                                            </li>
                                            <li class="list-group-item">
                                                <strong>User:</strong> Sudahhh.
                                            </li>
                                            <!-- Tambahkan komentar lainnya di sini -->
                                        </ul>
                                        <a href="/kour"><button type="submit" class="btn btn-primary mt-3">Kembali</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection