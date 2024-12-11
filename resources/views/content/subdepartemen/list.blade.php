@extends('layout.main')

@section('judul', 'Data Subdepartemen')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-dark" href="{{ url('subdepartemen/add') }}">Tambah Data Subdepartemen</a>
                    <div class="table-responsive mt-2">
                        <table class="table table-striped">
                            <thead class="bg-gradient-light">
                            <tr>
                                <th>No</th>
                                <th>Subdepartemen</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($subdepartemens->count() > 0)
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($subdepartemens as $data)
                                    <tr>
                                        <td>{{ $i++ }}</td>
{{--                                        <td>{{ $data->departemen->nama_departemen }}</td>--}}
                                        <td>{{ $data->nama_subdepartemen }}</td>
                                        <td>
                                            <a class="btn btn-warning btn-sm" href="{{ url('subdepartemen/edit/'.$data->id_subdepartemen) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button"
                                                    data-id-subdepartemen="{{ $data->id_subdepartemen }}"
                                                    data-nama-subdepartemen="{{ $data->nama_subdepartemen }}"
                                                    class="btn btn-danger btn-sm btn-hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">Data subdepartemen belum tersedia.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        {{ $subdepartemens->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')@extends('layout.main')

@section('judul', 'Data Subdepartemen')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-dark" href="{{ url('subdepartemen/add') }}">Tambah Data Subdepartemen</a>
                    <div class="table-responsive mt-2">
                        <table class="table table-striped">
                            <thead class="bg-gradient-light">
                            <tr>
                                <th>No</th>
                                <th>Subdepartemen</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($subdepartemens->count() > 0)
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($subdepartemens as $data)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $data->nama_subdepartemen }}</td>  <!-- Menampilkan nama subdepartemen -->
                                        <td>
                                            <a class="btn btn-warning btn-sm" href="{{ url('subdepartemen/edit/'.$data->id_subdepartemen) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button"
                                                    data-id-subdepartemen="{{ $data->id_subdepartemen }}"
                                                    data-nama-subdepartemen="{{ $data->nama_subdepartemen }}"
                                                    class="btn btn-danger btn-sm btn-hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" class="text-center">Data subdepartemen belum tersedia.</td> <!-- Perbaiki colspan menjadi 3 karena ada 3 kolom -->
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        {{ $subdepartemens->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(function () {
            $('.btn-hapus').on('click', function () {
                let idSubdepartemen = $(this).data('id-subdepartemen');
                let namaSubdepartemen = $(this).data('nama-subdepartemen');
                Swal.fire({
                    title: "Konfirmasi",
                    text: `Anda yakin hapus data ${namaSubdepartemen}?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('subdepartemen.delete') }}', // Gunakan rute named route
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: idSubdepartemen
                            },
                            success: function () {
                                Swal.fire('Sukses', 'Data berhasil dihapus', 'success')
                                    .then(function () {
                                        window.location.reload();
                                    });
                            },
                            error: function (xhr) {
                                if (xhr.status === 404) {
                                    Swal.fire('Gagal', 'Subdepartemen tidak ditemukan.', 'error');
                                } else {
                                    Swal.fire('Gagal', 'Terjadi kesalahan saat menghapus data', 'error');
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush

<script>
        $(function () {
            $('.btn-hapus').on('click', function () {
                let idSubdepartemen = $(this).data('id-subdepartemen');
                let namaSubdepartemen = $(this).data('nama-subdepartemen');
                Swal.fire({
                    title: "Konfirmasi",
                    text: `Anda yakin hapus data ${namaSubdepartemen}?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('subdepartemen.delete') }}', // Gunakan rute named route
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: idSubdepartemen
                            },
                            success: function () {
                                Swal.fire('Sukses', 'Data berhasil dihapus', 'success')
                                    .then(function () {
                                        window.location.reload();
                                    });
                            },
                            error: function (xhr) {
                                if (xhr.status === 404) {
                                    Swal.fire('Gagal', 'Subdepartemen tidak ditemukan.', 'error');
                                } else {
                                    Swal.fire('Gagal', 'Terjadi kesalahan saat menghapus data', 'error');
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
