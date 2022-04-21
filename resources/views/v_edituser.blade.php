@extends('home')
@section('title', 'Edit User')
@section('header', 'Halaman Edit')
@section('isicontent')

    <form action="/user/update/{{ $user->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="content">
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label>Username</label>
                    <input name="username" class="form-control" value="{{ $user->username }}" readonly>
                <div class="text-danger">
                        @error('username')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input name="password" class="form-control" value="{{ $user->password }}">
                    <div class="text-danger">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Level : {{ $user->level }}</label>
                        <label>Ganti Level</label>
                        <select name="level" id="level">
                            <option value="Admin">Admin</option>
                            <option value="Operator">Operator</option>
                        </select>
                </div>

            <div class="form-group">
                    <label>Foto</label>
                    <img src="{{url('foto_user/'.$user->foto)}}" width="150px">

                <br>
                <label>Ganti Foto</label>
                <input name="foto" class="form-control" type="file">
                <div class="text-danger">
                    @error('foto')
                        {{ $message}}
                        @enderror
                </div>
               
            </div>
            <br>
            <div class="form-group">
                <button class="btn btn-primary"> Update </button>
            </div>
            </div>

        </div>
    </div>

    </form>

    @endsection