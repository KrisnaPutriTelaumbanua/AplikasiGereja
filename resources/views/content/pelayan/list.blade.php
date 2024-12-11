@extends('layout.main')

@section('judul', 'Data Pelayan')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-dark mb-3" href="{{ url('/pelayan/add') }}">Tambah Data Pelayan</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="bg-gradient-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Pelayan</th>
                                <th>Departemen</th>
                                <th>Subdepartemen</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($pelayans->count() > 0)
                                @foreach($pelayans as $key => $data)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $data->nama_pelayan }}</td>
                                        <td>{{ $data->departemen->nama_departemen ?? '-' }}</td>
                                        <td>{{ $data->subdepartemen->nama_subdepartemen ?? '-' }}</td>
                                        <td>
                                            <a class="btn btn-warning btn-sm" href="{{ url('pelayan/edit/'.$data->id_pelayan) }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <button type="button"
                                                    data-id-pelayan="{{ $data->id_pelayan }}"
                                                    data-nama-pelayan="{{ $data->nama_pelayan }}"
                                                    class="btn btn-danger btn-sm btn-hapus">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">Data pelayan belum tersedia.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        {{ $pelayans->links() }} <!-- Menampilkan pagination -->
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
                const idPelayan = $(this).data('id-pelayan');
                const namaPelayan = $(this).data('nama-pelayan');
                Swal.fire({
                    title: "Konfirmasi",
                    text: `Anda yakin ingin menghapus data ${namaPelayan}?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/pelayan/delete',
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: idPelayan
                            },
                            success: function () {
                                Swal.fire('Sukses', 'Data berhasil dihapus', 'success')
                                    .then(() => {
                                        window.location.reload();
                                    });
                            },
                            error: function () {
                                Swal.fire('Gagal', 'Terjadi kesalahan ketika menghapus data', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
