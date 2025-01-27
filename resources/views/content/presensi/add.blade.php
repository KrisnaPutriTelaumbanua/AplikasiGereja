@extends('layout.main')

@section('judul', 'Tambah Data Presensi')

@section('content')
    <form method="post" action="{{ url('presensi/insert') }}">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_pelayan">Pilih Pelayan</label>
                            <select name="id_pelayan" id="id_pelayan" class="form-control @error('id_pelayan') is-invalid @enderror">
                                <option value="">Pilih Pelayan</option>
                                @foreach ($pelayans as $pelayan)
                                    <option value="{{ $pelayan->id_pelayan }}" {{ old('id_pelayan') == $pelayan->id_pelayan ? 'selected' : '' }}>
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
                            <label for="tgl">Tanggal</label>
                            <input type="datetime-local" class="form-control @error('tgl') is-invalid @enderror" name="tgl" id="tgl" value="{{ old('tgl') }}">
                            @error('tgl')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status Kehadiran</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="">Pilih Status</option>
                                <option value="hadir" {{ old('status') == 'hadir' ? 'selected' : '' }}>Hadir</option>
                                <option value="tidak hadir" {{ old('status') == 'tidak hadir' ? 'selected' : '' }}>Tidak Hadir</option>
                            </select>
                            @error('status')
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
