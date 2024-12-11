@extends('layout.main')

@section('judul', 'Data Ibadah')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-dark" href="{{ url('/ibadah/add') }}">Tambah Data Ibadah</a>
                    <div class="table-responsive mt-2">
                        <table class="table table-striped">
                            <thead class="bg-gradient-light">
                            <tr>
                                <th>No</th>
                                <th>Tanggal Ibadah</th>
                                <th>Waktu Ibadah</th>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($ibadahList->count() > 0)
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($ibadahList as $data)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $data->tgl_ibadah }}</td>
                                        <td>{{ $data->waktu_ibadah }}</td>
                                        <td>{{ $data->kategori->nama_kategori }}</td>
                                        <td>

                                            <a class="btn btn-warning btn-sm"
                                               href="{{ url('ibadah/edit/'.$data->id_ibadah) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button"
                                                    data-id-ibadah="{{ $data->id_ibadah }}"
                                                    data-nama-ibadah="{{ $data->nama_ibadah }}"
                                                    class="btn btn-danger btn-sm btn-hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">Data kategori belum tersedia.</td>
                                </tr>
                            @endif

                            </tbody>
                        </table>
                        {{ $ibadahList->links() }} <!-- Menampilkan pagination -->
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
                let idIbadah = $(this).data('id-ibadah');
                let namaIbadah = $(this).data('nama-ibadah'); // Get the name from data attributes
                Swal.fire({
                    title: "Konfirmasi",
                    text: `Anda yakin hapus data ${namaIbadah}?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/ibadah/delete', // Adjust the URL for the delete action
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: idIbadah
                            },
                            success: function () {
                                Swal.fire('Sukses', 'Data berhasil dihapus', 'success')
                                    .then(function () {
                                        window.location.reload(); // Reload the page after successful deletion
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

