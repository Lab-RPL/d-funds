
@extends('layouts.main')
@section('content')

<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <div class="layout-page">
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">

                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                              <div class="card-body">
                                  <form action="{{ route('admin.update', $user->id_user) }}" method="POST">
                                      @csrf 
                                      @method('PUT') 
                                    <div class="row mb-3">
                                      <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Username</label>
                                      <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                          <input
                                            type="text"
                                            class="form-control"
                                            id="username"
                                            name="username"
                                            value="{{ $user->username }}"/>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row mb-3">
                                      <label class="col-sm-2 col-form-label" >Password</label>
                                      <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                          <input
                                            type="password"
                                            id="password"
                                            name="password"
                                            class="form-control"/>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row mb-3">
                                      <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Role</label>
                                      <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <select class="form-select" id="user_type" name="user_type" required>
                                                <option value="kour"{{ $user->user_type == 'kour' ? ' selected' : '' }}>Kour</option>
                                                <option value="pejabat"{{ $user->user_type == 'pejabat' ? ' selected' : '' }}>Pejabat</option>
                                                <option value="user"{{ $user->user_type == 'user' ? ' selected' : '' }}>User</option>
                                                <option value="pelaksana"{{ $user->user_type == 'pelaksana' ? ' selected' : '' }}>Pelaksana</option>
                                              </select>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row justify-content-end">
                                      <div class="col-sm-10 d-flex justify-content-between">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="{{ route('admin.index') }}" class="btn btn-primary ml-2" target="_self">Kembali</a>
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