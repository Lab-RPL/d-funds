@extends('layouts.pelaksana-main')
@section('content-pelaksana')


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
                                        $adminUser = \App\Models\User::where('user_type', 'pelaksana')->first();
                                    @endphp
                                        <h2 class="card-title">
                                            @if($adminUser)
                                                Selamat Datang, {{ $adminUser->username }} di DFUNDS
                                            @else
                                                Selamat Datang di DFUNDS
                                            @endif
                                        </h2>
                                  </div>
                                  <img src="../assets/img/illustrations/man-with-laptop-light.png" alt="Welcome Image" width="160"> 
                                </div>
                                <!-- Card content here -->
                              </div>
                            </div>
                          </div>
                          
                           

                            <!-- Tabel Data -->
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body"> <!-- Tombol Tambah -->
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                            data-bs-target="#userModal">Tambah</button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="userModal" tabindex="-1" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="userModalLabel">Tambah Data User</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <!-- Your form goes here -->
                                                        <form method="post">
                                                            @csrf

                                                            <div class="mb-3">
                                                                <label for="username" class="form-label">Username</label>
                                                                <input type="text" class="form-control" id="username"
                                                                    name="username" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="password" class="form-label">Password</label>
                                                                <div style="position:relative;">
                                                                    <input id="password" type="password" class="form-control" name="password" required>
                                                                    <i id="togglePassword" style="position:absolute; right:10px; top:10px; cursor:pointer;">👁️</i>
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                            <script>
                                                                const togglePassword = document.querySelector('#togglePassword');
                                                                const password = document.querySelector('#password');
                                                            
                                                                togglePassword.addEventListener('click', function (e) {
                                                                    // toggle the type attribute
                                                                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                                                                    password.setAttribute('type', type);
                                                                    // toggle the eye slash icon
                                                                    this.textContent = this.textContent === '👁️' ? '👁️‍🗨️' : '👁️';
                                                                });
                                                            </script>
                                                            
                                                            <div class="mb-3">
                                                                <label for="user_type" class="form-label">Role</label>
                                                                <select class="form-select" id="user_type"
                                                                    name="user_type" required>
                                                                    <option selected disabled hidden value="">
                                                                        Choose...</option>
                                                                    <option value="kour">Kour</option>
                                                                    <option value="pejabat">Pejabat</option>
                                                                    <option value="user">User</option>
                                                                    <option value="pelaksana">Pelaksana</option>
                                                                </select>
                                                            </div>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Tambah
                                                                Data</button>
                                                        </form>

                                                    </div>
                                                    <div class="modal-footer">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Formulir dengan Tabel -->
                                        <form>

                                            <table id="tabelData" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" id="headr">Tentang</th>
                                                        <th class="text-center" id="headr">Tanggal Pengajuan</th>
                                                        <th class="text-center" id="headr">Kategori</th>
                                                        <th class="text-center" id="headr">Unit Kerja</th>
                                                        <th class="text-center" id="headr">Berkas pendukung</th>
                                                        <th class="text-center" id="headr">Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="text-center">
                                                                <a href="/lihat" class="btn btn-primary">Lihat</a>
                                                        </td>
                                                    </tr>

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
