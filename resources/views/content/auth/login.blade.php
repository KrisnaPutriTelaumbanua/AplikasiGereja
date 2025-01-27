@extends('layout.login')

@section('judul', 'Login')

@section('content')
    <!-- Pesan sukses atau gagal dari aktivasi -->
    @if(session('sukses'))
        <div class="alert alert-success">
            {{ session('sukses') }}
        </div>
    @endif

    @if(session('gagal'))
        <div class="alert alert-danger">
            {{ session('gagal') }}
        </div>
    @endif

    <p class="login-box-msg">Silahkan Login</p>
    <form action="/login/verify" method="post">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control" id="email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" id="password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-dark btn-block">LOGIN</button>
{{--        <a href="/register" class="btn btn-dark btn-block">Register</a>--}}
    </form>
@endsection


{{--@extends('layout.login')--}}

{{--@section('judul', 'Login')--}}

{{--@section('content')--}}
{{--    <!-- Pesan sukses atau gagal dari aktivasi -->--}}
{{--    @if(session('sukses'))--}}
{{--        <div class="alert alert-success">--}}
{{--            {{ session('sukses') }}--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    @if(session('gagal'))--}}
{{--        <div class="alert alert-danger">--}}
{{--            {{ session('gagal') }}--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    <!-- Begin Custom Login Form -->--}}
{{--    <div class="wrapper">--}}
{{--        <form action="/login/verify" method="POST">--}}
{{--            @csrf--}}
{{--            <h1>Login</h1>--}}
{{--            <div class="input-box">--}}
{{--                <input type="email" name="email" placeholder="Email" required>--}}
{{--                <i class='bx bxs-user'></i>--}}
{{--            </div>--}}
{{--            <div class="input-box">--}}
{{--                <input type="password" name="password" placeholder="Password" required>--}}
{{--                <i class='bx bxs-lock-alt'></i>--}}
{{--            </div>--}}
{{--            <div class="remember-forgot">--}}
{{--                <label><input type="checkbox" name="remember"> Remember me</label>--}}
{{--                <a href="#">Forgot password?</a>--}}
{{--            </div>--}}
{{--            <button type="submit" class="btn">Login</button>--}}
{{--            <div class="register-link">--}}
{{--                <p>Don't have an account? <a href="/register">Register</a></p>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--    <!-- End Custom Login Form -->--}}
{{--@endsection--}}
