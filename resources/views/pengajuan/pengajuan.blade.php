@extends('layouts.user-main')
@section('content-user')
    <script src="https://kit.fontawesome.com/6d55e811a1.js" crossorigin="anonymous"></script>

    <style>
        .form-container {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            width: 400px;
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
                                                    <input type="text" id="deskripsi" name="deskripsi" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="keterangan">Keterangan</label>
                                                    <input type="text" id="keterangan" name="keterangan" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="catatan">Catatan</label>
                                                    <input type="text" id="catatan" name="catatan" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="file">File pendukung</label>
                                                    <input type="file" id="file" name="file" accept=".pdf, .doc"
                                                        required>
                                                    <a type="button"><i class="fa-solid fa-circle-plus mt-2"
                                                            style="color: #2cc90d; font-size:35px;"></i></a>
                                                    <a type="button"><i class="fa-solid fa-circle-minus mt-2"
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
@endsection
