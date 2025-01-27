@extends('layout.main')

@section('judul', 'Data Presensi')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-dark" href="{{ url('presensi/add') }}">Tambah Data Presensi</a>
                    <div class="table-responsive mt-2">
                        <table class="table table-striped">
                            <thead class="bg-gradient-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Pelayan</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($presensis->count() > 0)
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($presensis as $data)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $data->pelayan->nama_pelayan }}</td> <!-- Relasi ke tabel pelayan -->
                                        <td>{{ $data->tgl }}</td>
                                        <td>{{ ucfirst($data->status) }}</td> <!-- Kapitalisasi pertama -->
                                        <td>
                                            <button type="button"
                                                    data-id-presensi="{{ $data->id }}"
                                                    data-nama-pelayan="{{ $data->pelayan->nama_pelayan }}"
                                                    class="btn btn-danger btn-sm btn-hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">Data presensi belum tersedia.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        {{ $presensis->links() }} <!-- Pagination -->
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
                let idPresensi = $(this).data('id-presensi');
                let namaPelayan = $(this).data('nama-pelayan');
                Swal.fire({
                    title: "Konfirmasi",
                    text: `Anda yakin ingin menghapus presensi untuk pelayan ${namaPelayan}?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('presensi.delete') }}', // Gunakan rute named route
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: idPresensi
                            },
                            success: function () {
                                Swal.fire('Sukses', 'Data presensi berhasil dihapus', 'success')
                                    .then(function () {
                                        window.location.reload();
                                    });
                            },
                            error: function (xhr) {
                                if (xhr.status === 404) {
                                    Swal.fire('Gagal', 'Data presensi tidak ditemukan.', 'error');
                                } else {
                                    Swal.fire('Gagal', 'Terjadi kesalahan saat menghapus data.', 'error');
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
