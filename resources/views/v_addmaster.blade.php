@extends ('home')
@section('title', 'Add Master')
@section('header', 'Halaman Add Master')
@section ('isicontent')

<form action="/masterdata/tambah" method="POST" enctype="multipart/form-data">
@csrf
    <div class="content">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input name="password" class="form-control">
                </div>

                <div class="form-group">
                    <label>Level</label>
                    <select name="level" id="level">
                        <option value="Admin">Admin</option>
                        <option value="Operator">Operator</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto_user" class="form-control">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary">Simpan</button>
                </div>
                
            </div>
        </div>
    </div>

</form>

@endsection
@section('title','Tambah Master data')