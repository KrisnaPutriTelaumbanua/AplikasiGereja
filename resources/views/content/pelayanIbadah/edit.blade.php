@extends('layout.main')

@section('judul', 'Edit Data Pelayan Ibadah')

@section('content')
    <form method="post" action="{{ url('pelayanIbadah/update/'.$pelayanIbadah->id_pelayan_ibadah) }}">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_pelayan">Nama Pelayan</label>
                            <select name="id_pelayan" id="id_pelayan"
                                    class="form-control @error('id_pelayan') is-invalid @enderror">
                                <option value="">-- Pilih Pelayan --</option>
                                @foreach($pelayans as $pelayan)
                                    <option value="{{ $pelayan->id_pelayan }}"
                                        {{ old('id_pelayan', $pelayanIbadah->id_pelayan) == $pelayan->id_pelayan ? 'selected' : '' }}>
                                        {{ $pelayan->nama_pelayan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_pelayan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id_ibadah">Jenis Ibadah</label>
                            <select name="id_ibadah" id="id_ibadah"
                                    class="form-control @error('id_ibadah') is-invalid @enderror">
                                <option value="">-- Pilih Ibadah --</option>
                                @foreach($ibadahs as $ibadah)
                                    <option value="{{ $ibadah->id_ibadah }}"
                                        {{ old('id_ibadah', $pelayanIbadah->id_ibadah) == $ibadah->id_ibadah ? 'selected' : '' }}>
                                        {{ $ibadah->nama_ibadah }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_ibadah')
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
