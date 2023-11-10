@extends('layouts.pejabat-main')
@section('content-pejabat')


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
                                    <h2 class="card-title">Tampilan sementara Pejabat DFUNDS</h2>
                                  </div>
                                  <img src="../assets/img/illustrations/man-with-laptop-light.png" alt="Welcome Image" width="160"> 
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
                                                <img src="../assets/img/icons/unicons/chart-success.png"
                                                    alt="chart success" class="rounded" />
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
                                        <span class="fw-medium d-block mb-1">Profit</span>
                                        <h3 class="card-title mb-2">$12,628</h3>
                                    </div>
                                </div>
                            </div>

                            <!-- Card kedua - Sales -->
                            <div class="col-lg-3 col-md-3">
                              <div class="card mb-4">
                                  <div class="card-body">
                                      <div class="card-title d-flex align-items-start justify-content-between">
                                          <div class="avatar flex-shrink-0">
                                              <img src="../assets/img/icons/unicons/wallet-info.png"
                                                  alt="chart success" class="rounded" />
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
                                      <span class="fw-medium d-block mb-1">Sales</span>
                                      <h3 class="card-title mb-2">$7,628</h3>
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
                                        <span class="d-block mb-1">Payments</span>
                                        <h3 class="card-title text-nowrap mb-2">$2,456</h3>
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
                                        <span class="fw-medium d-block mb-1">Transactions</span>
                                        <h3 class="card-title mb-2">$14,857</h3>
                                    </div>
                                </div>
                            </div>
                           
                           <!-- Tabel Data -->
                           <div class="col-lg-12 col-md-12">
                              <div class="card">
                                <div class="card-body">
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
