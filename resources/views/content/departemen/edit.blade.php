@extends('layout.main')

@section('judul', 'Edit Data Departemen')

@section('content')
    <form method="post" action="{{ url('departemen/update/'.$departemen->id_departemen) }}">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_departemen">Nama Departemen</label>
                            <input type="text"
                                   class="form-control @error('nama_departemen') is-invalid @enderror"
                                   value="{{ old('nama_departemen', $departemen->nama_departemen) }}"
                                   name="nama_departemen"
                                   id="nama_departemen">
                            @error('nama_departemen')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
