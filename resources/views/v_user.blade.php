@extends ('home')
@section('title', 'User')
@section('header', 'Halaman User')
@section ('isicontent')


<a href="/user/add" class="btn btn-sm btn-success">Tambah Data</a>
@if (session('Pesan'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i>Success!</h5>
    {{ (session('Pesan')) }}.

</div>
@endif
<table class="table table-boarder">
    <thead>
        <tr>
            <th>no</th>
            <th>Username</th>
            <th>Password</th>
            <th>Level</th>
            <th>Foto</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;  ?>
        @foreach ($user as $data)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $data->username }}</td>
            <td>{{ $data->password }}</td>
            <td>{{ $data->level }}</td>
            <td> <img src="{{ url('foto_user/' .$data->foto) }}" width="80px"></td>
            <td>
                <a href="/user/detail/{{ $data->id }}" class="btn btn-sm btn-success"> View </a>
                <a href="/user/edit/{{ $data->id }}" class="btn btn-sm btn-warning"> Edit </a>
                <a href="/user/delete/{{ $data->id}}" class="btn btn-sm btn-danger"> Delete </a>
            </td>
            @endforeach
        </tr>
    </tbody>
</table>

@endsection