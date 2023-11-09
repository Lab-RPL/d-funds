@extends('layouts.main')

@section('content')
<div class="container">
    <form action="{{ route('admin.update', $user->id_user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="mb-3">
            <label for="user_type" class="form-label">Role</label>
            <select class="form-select" id="user_type" name="user_type" required>
              <option value="kour"{{ $user->user_type == 'kour' ? ' selected' : '' }}>Kour</option>
              <option value="pejabat"{{ $user->user_type == 'pejabat' ? ' selected' : '' }}>Pejabat</option>
              <option value="user"{{ $user->user_type == 'user' ? ' selected' : '' }}>User</option>
              <option value="pelaksana"{{ $user->user_type == 'pelaksana' ? ' selected' : '' }}>Pelaksana</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection