@extends('layout.main')

@section('judul', 'Data Pelayan Ibadah')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-dark mb-3" href="{{ url('/pelayanIbadah/add') }}">Tambah Data Pelayan Ibadah</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="bg-gradient-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Pelayan</th>
                                <th>Departemen</th>
                                <th>Subdepartemen</th>
                                <th>Jenis Ibadah</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($pelayanIbadahs->count() > 0)
                                @foreach($pelayanIbadahs as $index => $data)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            @if($data->pelayan)
                                                {{ $data->pelayan->nama_pelayan }}
                                            @else
                                                Tidak Ada Pelayan
                                            @endif
                                        </td>
                                        <td>
                                            @if($data->pelayan && $data->pelayan->departemen)
                                                {{ $data->pelayan->departemen->nama_departemen }}
                                            @else
                                                Tidak Ada Departemen
                                            @endif
                                        </td>
                                        <td>
                                            @if($data->pelayan && $data->pelayan->subdepartemen)
                                                {{ $data->pelayan->subdepartemen->nama_subdepartemen }}
                                            @else
                                                Tidak Ada Subdepartemen
                                            @endif
                                        </td>
                                        <td>
                                            @if($data->ibadah)
                                                {{ \Carbon\Carbon::parse($data->ibadah->tgl_ibadah)->format('d-m-Y') }}<br>
                                                {{ $data->ibadah->waktu_ibadah }}<br>
                                                {{ $data->ibadah->kategori->nama_kategori ?? 'Tidak Ada Kategori' }}
                                            @else
                                                Tidak ada ibadah
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-warning btn-sm" href="{{ url('pelayanIbadah/edit/'.$data->id_pelayan_ibadah) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button"
                                                    class="btn btn-danger btn-sm btn-hapus"
                                                    data-id-pelayan-ibadah="{{ $data->id_pelayan_ibadah }}"
                                                    data-nama-pelayan="{{ $data->pelayan ? $data->pelayan->nama_pelayan : 'Tidak Ada Pelayan' }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">Data pelayan ibadah belum tersedia.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $pelayanIbadahs->links('pagination::bootstrap-4') }}
                        </div>
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
                const idPelayanIbadah = $(this).data('id-pelayan-ibadah');
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
                            url: '/pelayanIbadah/delete',
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: idPelayanIbadah
                            },
                            success: function (response) {
                                Swal.fire('Sukses', 'Data berhasil dihapus', 'success')
                                    .then(() => {
                                        window.location.reload();
                                    });
                            },
                            error: function (error) {
                                Swal.fire('Gagal', 'Terjadi kesalahan ketika menghapus data', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
