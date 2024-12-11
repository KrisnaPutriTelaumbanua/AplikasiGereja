@extends('layout.main')

@section('judul', 'Data Kategori')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-dark" href="{{ url('/kategori/add') }}">Tambah Data Kategori</a>
                    <div class="table-responsive mt-2">
                        <table class="table table-striped">
                            <thead class="bg-gradient-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($categories->count() > 0)
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($categories as $data)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $data->nama_kategori }}</td>
                                        <td>{{ $data->deskripsi }}</td>
                                        <td>
                                            <a class="btn btn-warning btn-sm" href="{{ url('kategori/edit/'.$data->id_kategori) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button"
                                                    data-id-kategori="{{ $data->id_kategori }}"
                                                    data-nama-kategori="{{ $data->nama_kategori }}"
                                                    class="btn btn-danger btn-sm btn-hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">Data kategori belum tersedia.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        {{ $categories->links() }} <!-- Menampilkan pagination -->
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
                let idKategori = $(this).data('id-kategori');
                let namaKategori = $(this).data('nama-kategori');
                Swal.fire({
                    title: "Konfirmasi",
                    text: `Anda yakin hapus data ${namaKategori}?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/kategori/delete',
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: idKategori
                            },
                            success: function () {
                                Swal.fire('Sukses', 'Data berhasil dihapus', 'success')
                                    .then(function () {
                                        window.location.reload();
                                    });
                            },
                            error: function () {
                                Swal.fire('Gagal', 'Terjadi kesalahan ketika hapus data', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
