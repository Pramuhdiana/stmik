@extends ('home')
@section ('isicontent')
<h1>INI HALAMAN USER</h1>


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
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection