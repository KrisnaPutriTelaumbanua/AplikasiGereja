@extends('layout.login')
@section('judul','Register User Baru')

@section('content')
    <p class="login-box-msg">Registrasi User Baru</p>
    <form action="" method="post">
        @csrf
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <button class="btn btn-dark btn-block" type="submit">Register</button>
        <a href="/login" class="btn btn-dark btn-block">Kembali</a>
    </form>
@endsection
