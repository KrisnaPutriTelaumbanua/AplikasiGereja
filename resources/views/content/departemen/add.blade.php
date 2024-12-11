@extends('layout.main')

@section('judul', 'Tambah Data Departemen')

@section('content')
    <form method="post" action="{{ url('departemen/insert') }}">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_departemen">Nama Departemen</label>
                            <input type="text"
                                   class="form-control @error('nama_departemen') is-invalid @enderror"
                                   value="{{ old('nama_departemen') }}"
                                   name="nama_departemen"
                                   id="nama_departemen">
                            @error('nama_departemen')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button class="btn btn-dark">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
