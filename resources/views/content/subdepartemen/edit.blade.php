@extends('layout.main')

@section('judul', 'Edit Data Subdepartemen')

@section('content')
    <form method="POST" action="{{ route('subdepartemen.update', $subdepartemen->id_subdepartemen) }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
{{--                        <div class="form-group">--}}
{{--                            <label for="id_departemen">Departemen</label>--}}
{{--                            <select name="id_departemen" id="id_departemen" class="form-control @error('id_departemen') is-invalid @enderror">--}}
{{--                                <option value="">Pilih Departemen</option>--}}
{{--                                @foreach ($departemens as $departemen)--}}
{{--                                    <option value="{{ $departemen->id_departemen }}"--}}
{{--                                        {{ old('id_departemen', $subdepartemen->id_departemen) == $departemen->id_departemen ? 'selected' : '' }}>--}}
{{--                                        {{ $departemen->nama_departemen }}--}}
{{--                                    </option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            @error('id_departemen')--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                {{ $message }}--}}
{{--                            </div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}

                        <div class="form-group">
                            <label for="nama_subdepartemen">Nama Subdepartemen</label>
                            <input type="text"
                                   class="form-control @error('nama_subdepartemen') is-invalid @enderror"
                                   value="{{ old('nama_subdepartemen', $subdepartemen->nama_subdepartemen) }}"
                                   name="nama_subdepartemen"
                                   id="nama_subdepartemen">
                            @error('nama_subdepartemen')
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
