@extends('layout.main')

@section('judul', 'Data Departemen')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-dark" href="{{ url('departemen/add') }}">Tambah Data Departemen</a>
                    <div class="table-responsive mt-2">
                        <table class="table table-striped">
                            <thead class="bg-gradient-light">
                            <tr>
                                <th>No</th>
                                <th>Departemen</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($departemens->count() > 0)
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($departemens as $data)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $data->nama_departemen }}</td>
                                        <td>
                                            <a class="btn btn-warning btn-sm" href="{{ url('departemen/edit/'.$data->id_departemen) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button"
                                                    data-id-departemen="{{ $data->id_departemen }}"
                                                    data-nama-departemen="{{ $data->nama_departemen }}"
                                                    class="btn btn-danger btn-sm btn-hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" class="text-center">Data departemen belum tersedia.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        {{ $departemens->links() }}
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
                let idDepartemen = $(this).data('id-departemen');
                let namaDepartemen = $(this).data('nama-departemen');
                Swal.fire({
                    title: "Konfirmasi",
                    text: `Anda yakin hapus data ${namaDepartemen}?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('departemen.delete') }}', // Gunakan rute named route
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: idDepartemen
                            },
                            success: function () {
                                Swal.fire('Sukses', 'Data berhasil dihapus', 'success')
                                    .then(function () {
                                        window.location.reload();
                                    });
                            },
                            error: function (xhr) {
                                if (xhr.status === 404) {
                                    Swal.fire('Gagal', 'Departemen tidak ditemukan.', 'error');
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
