@extends('home')
@section('title', "Detail User")
@section('isicontent')

    <table class="table">
        <tr>
            <th widht ="100px">Id</th>
            <th widht ="30px">:</th>
            <th widht>{{$user->id}}</th>
        </tr>
        <tr>
            <th widht ="100px">Username</th>
            <th widht ="30px">:</th>
            <th widht>{{$user->username}}</th>
        </tr>
        <tr>
            <th widht ="100px">Password</th>
            <th widht ="30px">:</th>
            <th widht>{{$user->password}}</th>
        </tr>
        <tr>
            <th widht ="100px">Foto</th>
            <th widht ="30px">:</th>
            <th widht><img src="{{url('foto/'.$user->foto)}}" width="200px"></th>
        </tr>
        <a href="/user/" class="btn btn-sm btn-success">Kembali</a>

    </table>

    @endsection