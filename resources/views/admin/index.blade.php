@extends('layouts.main')
@section('content')
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
                                                <h2 class="card-title">Selamat Datang di DFUNDS</h2>
                                            </div>
                                            <img src="../assets/img/illustrations/man-with-laptop-light.png"
                                                alt="Welcome Image" width="160">
                                        </div>
                                        <!-- Card content here -->
                                    </div>
                                </div>
                            </div>
                            <!-- Card pertama - Profit -->
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
                                        @php
                                        $countPejabat = DB::table('users')
                                            ->where('user_type', 'pejabat')
                                            ->count();
                                        @endphp
                                        <span class="fw-medium d-block mb-1">Pejabat</span>
                                        <h3 class="card-title mb-2">{{ $countPejabat }}</h3>
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
                                        @php
                                        $countUser = DB::table('users')
                                            ->where('user_type', 'user')
                                            ->count();
                                        @endphp
                                        <span class="fw-medium d-block mb-1">User</span>
                                        <h3 class="card-title mb-2">{{ $countUser }}</h3>
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
                                        @php
                                        $countKour = DB::table('users')
                                            ->where('user_type', 'kour')
                                            ->count();
                                        @endphp
                                        <span class="d-block mb-1">Kour</span>
                                        <h3 class="card-title text-nowrap mb-2">{{ $countKour }}</h3>
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
                                        @php
                                        $countPelaksana = DB::table('users')
                                            ->where('user_type', 'pelaksana')
                                            ->count();
                                        @endphp
                                        <span class="fw-medium d-block mb-1">Pelaksana</span>
                                        <h3 class="card-title mb-2">{{ $countPelaksana }}</h3>
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
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <!-- Your form goes here -->
                                                        <form action="{{ route('admin.store') }}" method="post">
                                                            @csrf

                                                            <div class="mb-3">
                                                                <label for="username" class="form-label">Username</label>
                                                                <input type="text" class="form-control" id="username"
                                                                    name="username" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="password" class="form-label">Password</label>
                                                                <input type="password" class="form-control"
                                                                    id="password" name="password" required>
                                                            </div>
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

                                        {{-- Edit Form
                                        <div class="modal fade" id="editModal" tabindex="-1"
                                            aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Edit Data User</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="editForm" method="POST" action="">
                                                            @method('PUT')
                                                            <!-- penambahan method PUT karena biasanya update memerlukan method ini -->
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="username_edit"
                                                                    class="form-label">Username</label>
                                                                <input type="text" class="form-control"
                                                                    id="username_edit" name="username" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="password_edit"
                                                                    class="form-label">Password</label>
                                                                <input type="password" class="form-control"
                                                                    id="password_edit" name="password" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="user_type_edit"
                                                                    class="form-label">Role</label>
                                                                <select class="form-select" id="user_type_edit"
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
                                                            <button type="submit" class="btn btn-warning">Update
                                                                Data</button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">

                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}


                                        <!-- Formulir dengan Tabel -->
                                        <form>
                                            @if (Session::has('message'))
                                                <div id="pesan-sukses" class="alert alert-success mt-4">
                                                    {{ Session::get('message') }}</div>
                                            @endif
                                            <table id="tabelData" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" id="headr">
                                                            Username</th>
                                                        <th class="text-center" id="headr">Role
                                                        </th>
                                                        <th class="text-center" id="headr">Opsi
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $user)
                                                    <tr>
                                                        <td>{{ $user->username }}</td>
                                                        <td>{{ $user->user_type }}</td>
                                                        <td class="text-center">
                                                            @if($user->user_type != 'admin')
                                                                <a href="{{ Route('admin.edit',$user->id_user) }}" class="btn btn-warning">Edit</a>
                                                                <a class="delete-btn btn btn-danger"
                                                                   href="{{ route('admin.destroy', $user->id_user) }}">Hapus</a>
                                                            @endif
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
    <style>
        #headr {
            background-color: #696CFF;
            color: #F5F5F9;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        setTimeout(function() {
            document.getElementById('pesan-sukses').style.display = 'none';
        }, 3000);


        $('#tabelData').DataTable({
            lengthMenu: [
                [5, 10, 25, -1],
                [5, 10, 25, "All"]
            ],

            pageLength: 5 // Menampilkan 5 data per halaman
        });


        // $(document).ready(function() {

        //     $('.edit-btn').click(function() {
        //         var id = $(this).data('id');

        //         $.ajax({
        //             url: '/admin/edit/' + id,
        //             method: 'GET',
        //             success: function(data) {
        //                 $('#username_edit').val(data.username);
        //                 $('#password_edit').val("");
        //                 $('#user_type_edit').val(data.user_type);
        //                 $('#editForm').attr('action', '/admin/update/' + id);
        //                 $('#editModal').modal('show');
        //             }
        //         });
        //     });
        // });
    </script>
@endsection
