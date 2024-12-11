@extends('layout.main')

@section('judul', 'Data Pelayan Ibadah')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-dark" href="{{ url('/pelayanIbadah/add') }}">Tambah Data Pelayan Ibadah</a>
                    <div class="table-responsive mt-2">
                        <table class="table table-striped">
                            <thead class="bg-gradient-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Pelayan</th>
                                <th>Jenis Ibadah</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($pelayanIbadahs->count() > 0)
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($pelayanIbadahs as $data)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $data->pelayan->nama_pelayan }}</td>
                                        <td>
                                            @if($data->ibadah)
                                                {{-- Display formatted jenis ibadah: nama_ibadah, tgl_ibadah, waktu_ibadah, kategori --}}
                                                {{ $data->ibadah->nama_ibadah . ' - ' . \Carbon\Carbon::parse($data->ibadah->tgl_ibadah)->format('d-m-Y') . ' - ' . $data->ibadah->waktu_ibadah . ' - ' . ($data->ibadah->kategori->nama_kategori ?? 'Tidak Ada Kategori') }}
                                            @else
                                                Tidak ada ibadah
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-warning btn-sm" href="{{ url('pelayanIbadah/edit/'.$data->id_pelayan_ibadah) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button"
                                                    data-id-pelayan-ibadah="{{ $data->id_pelayan_ibadah }}"
                                                    data-nama-pelayan="{{ $data->pelayan->nama_pelayan }}"
                                                    class="btn btn-danger btn-sm btn-hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">Data pelayan ibadah belum tersedia.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        {{ $pelayanIbadahs->links() }} <!-- Menampilkan pagination -->
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
                let idPelayanIbadah = $(this).data('id-pelayan-ibadah');
                let namaPelayan = $(this).data('nama-pelayan');
                Swal.fire({
                    title: "Konfirmasi",
                    text: `Anda yakin hapus data pelayan ${namaPelayan}?`,
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
