@extends('layouts.pelaksana-main')
@section('content-pelaksana')
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
                                                    <td>{{ $data->tentang }}</td>
                                                </tr>

                                                <tr>
                                                    <td class="bg-label-primary">
                                                        <span class="fw-medium">Tanggal Pengajuan</span>
                                                    </td>
                                                    <td>{{ $data->created_at }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="bg-label-primary">

                                                        <span class="fw-medium">Kategori</span>
                                                    </td>
                                                    <td>{{ $data->nama_kategori }}</td>
                                                </tr>

                                                <tr>
                                                    <td class="bg-label-primary">

                                                        <span class="fw-medium">Unit Kerja</span>
                                                    </td>
                                                    <td>{{ $data->unit_kerja }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="bg-label-primary">

                                                        <span class="fw-medium">Catatan</span>
                                                    </td>
                                                    <td>{{ $data->catatan }}</td>
                                                </tr>

                                                <tr>
                                                    <td class="bg-label-primary" rowspan="{{ count($dokumens) }}">
                                                        <span class="fw-medium">Berkas pendukung</span>
                                                    </td>
                                                    @foreach ($dokumens as $key => $dokumen)
                                                        @if ($key !== 0)
                                                <tr>
                                                    @endif
                                                    <td><a target="_blank"
                                                            href="{{ route('pelaksana.download', $dokumen->id_dokumen) }}">{{ $dokumen->nama_dokumen }}</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 mb-4">
                                <div class="card">
                                    <h5 class="card-header bg-primary text-white">Log Aktivitas</h5>
                                    <div class="card-body">
                                        <!-- Daftar komentar -->

                                        <div class="mt-4">
                                            <h6>History</h6>
                                            <ul class="list-group">
                                                @foreach ($logs->sortByDesc('created_at') as $log)
                                                    <li class="list-group-item">
                                                        {{ $log->isi_log }}
                                                        <br>
                                                        <small>
                                                            {{ $log->created_at->translatedFormat('l, d F Y H:i:s') }}
                                        
                                                            @if ($log->created_at == $logs->last()->created_at)
                                                                <span class="badge bg-primary">Latest</span>
                                                            @endif
                                                        </small>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        
                                        


                                    </div>
                                </div>
                            </div>  

                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <h5 class="card-header bg-primary text-white">Diskusi</h5>
                                    <div class="card-body">
                                        <!-- Daftar komentar -->
                                        <div class="mt-4">
                                            <h6>Komentar Sebelumnya:</h6>
                                            <ul class="list-group">
                                                @foreach ($discusses as $discuss)
                                                    <li class="list-group-item">
                                                        <strong>{{ $discuss->username }}:</strong> {{ $discuss->isi }}
                                                        <br>
                                                        @if ($discuss->nama_file)
                                                            <strong>Download Dokumen</strong>
                                                            <!-- display file name and provide download link -->
                                                            <a
                                                                href="{{ asset('storage/suratna/' . $discuss->nama_file) }}">
                                                                Preview {{ $discuss->nama_file }}
                                                            </a>
                                                        @endif
                                                        <br>
                                                        <small>{{ \Carbon\Carbon::parse($discuss->created_at)->translatedFormat('l, d F Y H:i:s') }}</small>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <!-- Form untuk menambahkan komentar -->
                                        <form action="{{ route('pelaksana.store_discuss') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="comment" class="form-label">Tambahkan Komentar:</label>
                                                <textarea class="form-control" id="comment" rows="3" name="Komentar"></textarea>
                                            </div>
                                            <input type="hidden" name="id_pengajuan" value="{{ $data->id_pengajuan }}" />
                                            <div class="mb-3">
                                                <label for="uploadFile" class="form-label">Unggah Dokumen:</label>
                                                <input type="file" class="form-control" id="uploadFile" name="file[]">
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <a href="{{ route('pelaksana.index') }}" class="btn btn-primary" target="_self">Kembali</a>
                                                <button type="submit" class="btn btn-danger">Kirim</button>
                                            </div>
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
@endsection
