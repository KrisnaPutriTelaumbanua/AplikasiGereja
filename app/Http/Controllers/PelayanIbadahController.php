<?php

namespace App\Http\Controllers;

use App\Models\PelayanIbadah;
use App\Models\Pelayan;
use App\Models\Ibadah;
use Illuminate\Http\Request;

class PelayanIbadahController extends Controller
{
    public function list()
    {
        // Mengambil data pelayan ibadah dengan relasi pelayan dan ibadah
        $pelayanIbadahs = PelayanIbadah::with(['pelayan', 'ibadah'])->paginate(10);

        return view('content.pelayanIbadah.list', [
            'pelayanIbadahs' => $pelayanIbadahs
        ]);
    }
    public function add()
    {
        $pelayans = Pelayan::all();
        $ibadahs = Ibadah::with('kategori')->get();

        return view('content.pelayanIbadah.add', compact('pelayans', 'ibadahs'));
    }

    public function insert(Request $request)
    {
        $validated = $request->validate([
            'id_pelayan' => 'required|array',
            'id_pelayan.*' => 'exists:pelayan,id_pelayan',
            'id_ibadah' => 'required|exists:ibadah,id_ibadah',
        ]);

        $id_ibadah = $validated['id_ibadah'];
        $id_pelayan_list = $validated['id_pelayan'];

        // Insert only unique entries to avoid duplicates
        foreach ($id_pelayan_list as $id_pelayan) {
            PelayanIbadah::updateOrCreate(
                ['id_pelayan' => $id_pelayan, 'id_ibadah' => $id_ibadah]
            );
        }

        return redirect()->route('pelayanIbadah.list')->with('success', 'Pelayan Ibadah berhasil ditambahkan!');
    }




    public function edit(PelayanIbadah $pelayanIbadah)
    {
        $pelayans = Pelayan::all();
        $ibadahs = Ibadah::all();

        return view('content.pelayanIbadah.edit', compact('pelayanIbadah', 'pelayans', 'ibadahs'));
    }

    public function update(Request $request, PelayanIbadah $pelayanIbadah)
    {
        $validated = $request->validate([
            'id_pelayan' => 'required|exists:pelayan,id_pelayan',
            'id_ibadah' => 'required|exists:ibadah,id_ibadah',
        ]);

        $pelayanIbadah->update($validated);

        return redirect()->route('pelayanIbadah.list')->with('success', 'Data pelayan ibadah berhasil diperbarui!');
    }

    public function delete(Request $request)
    {
        $idPelayanIbadah = $request->id;
        $pelayanIbadah = PelayanIbadah::find($idPelayanIbadah);
        if ($pelayanIbadah === null) {
            return response()->json([], 404);
        }

        $pelayanIbadah->delete();
        return response()->json([], 204);
    }
}
