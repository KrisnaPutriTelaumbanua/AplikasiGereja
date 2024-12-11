@extends('layout.main')

@section('judul', 'Dashboard')

@section('content')
    <style>
        .dashboard-container {
            background: url("{{ asset('assets/img/ApotekInt.jpeg') }}") no-repeat center center fixed;
            background-size: cover;
            height: 100vh; /* Tinggi 100% */
            overflow: hidden; /* Mengunci scrolling */
            padding: 100px; /* Memberi ruang  */
            color: white; /* Warna teks di atas gambar */
        }

        .card {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgb(4, 178, 18); /*   tebalin shadow */
            transition: box-shadow 0.3s ease-in-out;
            background: rgba(0, 0, 0, 0.78);
            border-radius: 10px;
            padding: 20px;
            color: white;

        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.54);
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
        }

        .card-text {
            font-size: 1.2rem;
            color: white;
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }


    </style>

{{--    <div class="dashboard-container">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-6 col-md-6">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title">Jumlah Produk</h5>--}}
{{--                            <p class="card-text">{{ $totalProducts }} produk</p>--}}
{{--                            <a href="{{ route('content.product.list') }}" class="btn btn-success">Lihat Produk</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6 col-md-6">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title">Jumlah Karyawan</h5>--}}
{{--                            <p class="card-text">{{ $totalKaryawan }} orang</p>--}}
{{--                            <a href="{{ route('content.karyawan.list') }}" class="btn btn-success">Lihat Karyawan</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6 col-md-6">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title">Jumlah Shift</h5>--}}
{{--                            <p class="card-text">{{ $totalShifts }} shift</p>--}}
{{--                            <a href="{{ route('content.shift.list') }}" class="btn btn-success">Lihat Shift</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6 col-md-6">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title">Jumlah Kategori Produk</h5>--}}
{{--                            <p class="card-text">{{ $totalKategori }} kategori</p>--}}
{{--                            <a href="{{ route('content.kategori.list') }}" class="btn btn-success">Lihat Kategori Produk</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
