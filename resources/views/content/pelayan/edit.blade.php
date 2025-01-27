@extends('layout.main')

@section('judul', 'Edit Data Pelayan')

@section('content')
    <form method="post" action="{{ url('pelayan/update/'.$pelayan->id_pelayan) }}">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_pelayan">Nama Pelayan</label>
                            <input type="text"
                                   class="form-control @error('nama_pelayan') is-invalid @enderror"
                                   value="{{ old('nama_pelayan', $pelayan->nama_pelayan) }}"
                                   name="nama_pelayan"
                                   id="nama_pelayan">
                            @error('nama_pelayan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id_departemen">Departemen</label>
                            <select name="id_departemen"
                                    id="id_departemen"
                                    class="form-control @error('id_departemen') is-invalid @enderror">
                                <option value="">Pilih Departemen</option>
                                @foreach ($departemens as $departemen)
                                    <option value="{{ $departemen->id_departemen }}"
                                        {{ old('id_departemen', $pelayan->id_departemen) == $departemen->id_departemen ? 'selected' : '' }}>
                                        {{ $departemen->nama_departemen }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_departemen')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id_subdepartemen">Subdepartemen</label>
                            <select name="id_subdepartemen"
                                    id="id_subdepartemen"
                                    class="form-control @error('id_subdepartemen') is-invalid @enderror">
                                <option value="">Pilih Subdepartemen</option>
                                @foreach ($subdepartemens as $subdepartemen)
                                    <option value="{{ $subdepartemen->id_subdepartemen }}"
                                        {{ old('id_subdepartemen', $pelayan->id_subdepartemen) == $subdepartemen->id_subdepartemen ? 'selected' : '' }}>
                                        {{ $subdepartemen->nama_subdepartemen }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_subdepartemen')
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
