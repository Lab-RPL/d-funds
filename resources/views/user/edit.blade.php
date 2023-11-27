@extends('layouts.user-main')
@section('content-user')
    <script src="https://kit.fontawesome.com/6d55e811a1.js" crossorigin="anonymous"></script>


    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <div class="layout-page">
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="form-container">
                                            <h2>Form Pengajuan Draf</h2>
                                            <form action="{{ route('user.update', $pengajuan->id_pengajuan) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="tentang">Tentang</label>
                                                    <textarea class="form-control" id="tentang" name="tentang">{{ $pengajuan->tentang }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="unit_kerja">Unit Kerja</label>
                                                    <input type="text" id="unit_kerja" name="unit_kerja"
                                                        value={{ $pengajuan->unit_kerja }}>
                                                </div>
                                                <div class="form-group">
                                                    <label for="catatan">Catatan</label>
                                                    <textarea class="form-control" id="catatan" name="catatan">{{ $pengajuan->catatan }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="id_kategori">Kategori</label>
                                                    <select class="form-select" id="id_kategori" name="id_kategori">
                                                        <option value="" disabled selected hidden>Pilih Kategori
                                                        </option>
                                                        @foreach ($kategoris as $kategoriItem)
                                                            <option value="{{ $kategoriItem->id_kategori }}"
                                                                {{ $kategori->id_kategori == $kategoriItem->id_kategori ? 'selected' : '' }}>
                                                                {{ $kategoriItem->nama_kategori }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="form-group">
                                                    <label for="obj_pembayaran">Objek Pembayaran</label>
                                                    <input type="text" name="" id="obj_pembayaran" readonly
                                                        disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="deskripsi">Deskripsi</label>
                                                    <textarea class="form-control" id="deskripsi" name="deskripsi" readonly></textarea>
                                                </div>
                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                                <script type="text/javascript">
                                                    $(document).ready(function() {

                                                        // Fungsi untuk melakukan AJAX request
                                                        function fetchKategoriData(id_kategori) {
                                                            $.ajax({
                                                                url: '/kategori/' + id_kategori,
                                                                type: 'get',
                                                                dataType: 'json',
                                                                success: function(response) {
                                                                    console.log(response);
                                                                    if (response.status == 0) {
                                                                        alert(response.message);
                                                                    } else {
                                                                        $('#obj_pembayaran').val(response.obj_pembayaran);
                                                                        $('#deskripsi').val(response.deskripsi);
                                                                    }
                                                                    $('#deskripsi').each(function() {
                                                                        this.setAttribute('style', 'height:' + (this.scrollHeight) +
                                                                            'px;overflow-y:auto;');
                                                                    });
                                                                }
                                                            });
                                                        }

                                                        // Mengambil kategori ketika ada perubahan pada dropdown
                                                        $('#id_kategori').change(function() {
                                                            var id_kategori = $(this).val();
                                                            fetchKategoriData(id_kategori);
                                                        });

                                                        // Mengambil kategori ketika halaman dimuat
                                                        var initial_kategori_id = $('#id_kategori').val();
                                                        if (initial_kategori_id !== "") { // Hanya jika ada kategori terpilih
                                                            fetchKategoriData(initial_kategori_id);
                                                        }
                                                    });
                                                </script>





                                                {{-- <div class="form-group" id="file-container">
                                                    <label for="file">File pendukung</label>
                                                    <div class="input-group">
                                                        <input type="file" class="file-input" name="file[]"
                                                            accept=".pdf, .doc" required>
                                                        <label for="nama_dokumen">Nama Dokumen</label>
                                                        <input type="text" id="nama_dokumen" name="nama_dokumen">
                                                    </div>
                                                </div> --}}
                                                {{-- <div class="form-group" id="file-container">
                                                    <label for="file">File pendukung</label>
                                                    <div class="input-group">
                                                        <div class="file-input-container">
                                                            <input type="file" class="file-input" name="file[]"
                                                                accept=".pdf, .doc" required>
                                                        </div>
                                                        <div class="file-name-container">
                                                            <label for="nama_dokumen">Nama Dokumen</label>
                                                            <input type="text" class="file-name" name="nama_dokumen[]"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <table id="document-table">
                                                    <thead>
                                                        <tr>
                                                            <th><label for="nama_dokumen">Nama Dokumen</label></th>
                                                            <th><label for="file">File Pendukung</label></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($dokumens as $dokumen)
                                                        <tr>
                                                            <td><input type="text" class="file-name" name="nama_dokumen[]" value="{{ $dokumen->nama_dokumen }}" style="height: 35px;" required></td>
                                                            <td>
                                                                <input type="file" class="file-input" name="nama_file[]" accept=".pdf, .doc,.jpeg,.jpg,.png" multiple value="">
                                                                @if (!empty($dokumen->nama_file))
                                                                    <p class="text-info">File sebelumnya: {{ $dokumen->nama_file }}</p>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        
                                                    
                                                    </tbody>
                                                </table>
                                                <div class="form-group">
                                                    <a type="button" class="btn-plus"><i
                                                            class="fa-solid fa-circle-plus mt-2"
                                                            style="color: #2cc90d; font-size:35px;"></i></a>
                                                    <a type="button" class="btn-minus"><i
                                                            class="fa-solid fa-circle-minus mt-2"
                                                            style="color: #c90d0d; font-size:35px;"></i></a>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
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
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            // Fungsi untuk menambahkan baris input
            function addRow() {
                var newRow = '<tr>' +
                    '<td><input type="text" class="file-name" name="nama_dokumen[]" style="height: 35px;" required></td>' +
                    '<td><input type="file" class="file-input" name="nama_file[]" accept=".pdf, .doc,.jpeg,.jpg,.png" required multiple></td>' +
                    '</tr>';
                $('#document-table tbody').append(newRow);
            }

            // Fungsi untuk menghapus baris input
            function removeRow() {
                if ($('#document-table tbody tr').length > 1) {
                    $('#document-table tbody tr:last').remove();
                }
            }

            // Event click untuk tombol plus dan minus
            $('.btn-plus').click(function() {
                addRow();
            });

            $('.btn-minus').click(function() {
                removeRow();
            });
        });
    </script>


    <style>
        .file-input-container {
            flex: 1;
            margin-right: 10px;
        }

        .file-name-container {
            flex: 1;
        }

        /* Style the input fields */
        .file-input,
        .file-name {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-top: 5px;
        }

        .form-container {
            border-radius: 5px;
            padding: 20px;
            width: 450px;
            margin: 0 auto;
            margin-top: 50px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .submit-button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .input-group {
            display: flex;
            align-items: center;
        }
    </style>
@endsection
