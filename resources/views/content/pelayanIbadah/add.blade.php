@extends('layout.main')

@section('judul', 'Tambah Data Pelayan Ibadah')

@section('content')
    <form method="post" action="{{ url('pelayanIbadah/insert') }}">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Formulir Pelayan</h5>
                    </div>
                    <div class="card-body">
                        <!-- Pelayan Selection -->
                        <div class="form-group">
                            <label for="id_pelayan">Pilih Pelayan</label>
                            <div id="pelayan-selection" class="form-check">
                                @foreach($pelayans as $pelayan)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="id_pelayan[]" id="pelayan_{{ $pelayan->id_pelayan }}" value="{{ $pelayan->id_pelayan }}" data-departemen="{{ $pelayan->departemen->nama_departemen ?? '' }}" data-subdepartemen="{{ $pelayan->subdepartemen->nama_subdepartemen ?? '' }}">
                                        <label class="form-check-label" for="pelayan_{{ $pelayan->id_pelayan }}">
                                            {{ $pelayan->nama_pelayan }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Departemen dan Subdepartemen Display -->
                        <div id="departemen-subdepartemen" class="mt-3">
                            <div class="form-group">
                                <label for="departemen_id">Departemen</label>
                                <textarea id="departemen_id" class="form-control" readonly rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="subdepartemen_id">Subdepartemen</label>
                                <textarea id="subdepartemen_id" class="form-control" readonly rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Formulir Ibadah</h5>
                    </div>
                    <div class="card-body">
                        <!-- Ibadah Selection -->
                        <div class="form-group">
                            <label for="id_ibadah">Pilih Ibadah</label>
                            <select name="id_ibadah" id="id_ibadah" class="form-control @error('id_ibadah') is-invalid @enderror">
                                <option value="">-- Pilih Ibadah --</option>
                                @foreach($ibadahs as $ibadah)
                                    <option value="{{ $ibadah->id_ibadah }}" {{ old('id_ibadah') == $ibadah->id_ibadah ? 'selected' : '' }}>
                                        {{ $ibadah->formatted_jenis_ibadah }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_ibadah')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-dark">Simpan</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        document.querySelectorAll('input[name="id_pelayan[]"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                let departemenList = [];
                let subdepartemenList = [];

                // Get all checked checkboxes
                const checkedCheckboxes = document.querySelectorAll('input[name="id_pelayan[]"]:checked');
                checkedCheckboxes.forEach(checkedBox => {
                    const departemenName = checkedBox.getAttribute('data-departemen');
                    const subdepartemenName = checkedBox.getAttribute('data-subdepartemen');

                    if (departemenName && !departemenList.includes(departemenName)) {
                        departemenList.push(departemenName);
                    }
                    if (subdepartemenName && !subdepartemenList.includes(subdepartemenName)) {
                        subdepartemenList.push(subdepartemenName);
                    }
                });

                // Display the lists in the input fields
                document.getElementById('departemen_id').value = departemenList.join('\n') || 'Tidak Ada Departemen';
                document.getElementById('subdepartemen_id').value = subdepartemenList.join('\n') || 'Tidak Ada Subdepartemen';
            });
        });
    </script>
@endsection
