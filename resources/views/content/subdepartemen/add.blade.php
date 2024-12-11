@extends('layout.main')

@section('judul', 'Tambah Data Subdepartemen')

@section('content')
    <form method="post" action="{{ url('subdepartemen/insert') }}">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_subdepartemen">Nama Subdepartemen</label>
                            <input type="text"
                                   class="form-control @error('nama_subdepartemen') is-invalid @enderror"
                                   value="{{ old('nama_subdepartemen') }}"
                                   name="nama_subdepartemen"
                                   id="nama_subdepartemen">
                            @error('nama_subdepartemen')
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
