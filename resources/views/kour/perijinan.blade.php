<!-- perijinan.blade.php -->

@extends('layouts.kour-main')
@section('content-kour')

<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <div class="layout-page">
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">

                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('perijinan.process', $id_pengajuan) }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="col-form-label">Status Perijinan:</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status_perijinan" id="setuju" value="1" required>
                                                    <label class="form-check-label" for="setuju" name='setuju'>Setuju</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status_perijinan" id="tidak_setuju" value="2" required>
                                                    <label class="form-check-label" for="tidak_setuju"name='tidak'>Tidak Setuju</label>
                                                </div>
                                            </div>

                                            <div class="row justify-content-end">
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
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
