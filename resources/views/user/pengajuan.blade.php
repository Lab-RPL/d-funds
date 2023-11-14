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
                                            <form action="/submit_pengajuan" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="tentang">Tentang</label>
                                                    <textarea class="form-control" id="tentang" name="tentang"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="unit_kerja">Unit Kerja</label>
                                                    <input type="text" id="unit_kerja" name="unit_kerja" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="catatan">Catatan</label>
                                                    <textarea class="form-control" id="catatan" name="catatan"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="id_kategori">Kategori</label>
                                                    <select class="form-select" id="kategori" name="id_kategori">
                                                        <option value="1">Kategori 1</option>
                                                        <option value="2">Kategori 2</option>
                                                        <option value="3">Kategori 3</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="obj_pembayaran">Objek Pembayaran</label>
                                                    <input type="text" id="obj_pembayaran" name="obj_pembayaran"
                                                        readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="deskripsi">Deskripsi</label>
                                                    <textarea class="form-control" id="deskripsi" name="deskripsi" readonly></textarea>
                                                </div>
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
                                                            <th><label for="file">File pendukung</label></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><input type="text" class="file-name"
                                                                    name="nama_dokumen[]" style="height: 35px;" required>
                                                            </td>
                                                            <td><input type="file" class="file-input" name="file[]"
                                                                    accept=".pdf, .doc" required></td>
                                                        </tr>
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
                                                <button type="submit" class="submit-button">Submit</button>
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
        $(document).ready(function () {
            // Fungsi untuk menambahkan baris input
            function addRow() {
                var newRow = '<tr>' +
                    '<td><input type="text" class="file-name" name="nama_dokumen[]" style="height: 35px;" required></td>' +
                    '<td><input type="file" class="file-input" name="file[]" accept=".pdf, .doc" required></td>' +
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
            $('.btn-plus').click(function () {
                addRow();
            });
    
            $('.btn-minus').click(function () {
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
