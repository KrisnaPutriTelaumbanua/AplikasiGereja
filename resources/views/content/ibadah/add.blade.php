@extends('layout.main')
@section('judul', 'Tambah Data Ibadah')

@section('content')
    <form method="post" action="{{ url('ibadah/insert') }}">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="tgl_ibadah">Tanggal Ibadah</label>
                            <input type="date"
                                   class="form-control @error('tgl_ibadah') is-invalid @enderror"
                                   value="{{ old('tgl_ibadah') }}"
                                   name="tgl_ibadah"
                                   id="tgl_ibadah">
                            @error('tgl_ibadah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="waktu_ibadah">Waktu Ibadah</label>
                            <input type="time"
                                   class="form-control @error('waktu_ibadah') is-invalid @enderror"
                                   value="{{ old('waktu_ibadah') }}"
                                   name="waktu_ibadah"
                                   id="waktu_ibadah">
                            @error('waktu_ibadah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id_kategori">Kategori</label>
                            <select class="form-control @error('id_kategori') is-invalid @enderror" name="id_kategori" id="id_kategori">
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id_kategori }}" {{ old('id_kategori') == $category->id_kategori ? 'selected' : '' }}>
                                        {{ $category->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_kategori')
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
