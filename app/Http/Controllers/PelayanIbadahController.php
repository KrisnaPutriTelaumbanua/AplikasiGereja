<?php

namespace App\Http\Controllers;

use App\Models\PelayanIbadah;
use App\Models\Pelayan;
use App\Models\Ibadah;
use App\Models\Departemen;
use App\Models\Subdepartemen;
use Illuminate\Http\Request;

class PelayanIbadahController extends Controller
{
    public function list()
    {
        $pelayanIbadahs = PelayanIbadah::with(['pelayan', 'ibadah', 'departemen', 'subdepartemen'])->paginate(10);

        return view('content.pelayanIbadah.list', [
            'pelayanIbadahs' => $pelayanIbadahs
        ]);
    }

    public function add()
    {
        $pelayans = Pelayan::all();
        $ibadahs = Ibadah::with('kategori')->get();
        $departemens = Departemen::all();
        $subdepartemens = Subdepartemen::all();

        return view('content.pelayanIbadah.add', compact('pelayans', 'ibadahs', 'departemens', 'subdepartemens'));
    }

    public function insert(Request $request)
    {
        $validated = $request->validate([
            'id_pelayan' => 'required|exists:pelayan,id_pelayan',
            'id_ibadah' => 'required|exists:ibadah,id_ibadah',
            'id_departemen' => 'required|exists:departemens,id_departemen',
            'id_subdepartemen' => 'required|exists:subdepartemens,id_subdepartemen',
        ]);

        PelayanIbadah::create($validated);

        return redirect()->route('pelayanIbadah.list')->with('success', 'Pelayan Ibadah berhasil ditambahkan!');
    }

    public function edit(PelayanIbadah $pelayanIbadah)
    {
        $pelayans = Pelayan::all();
        $ibadahs = Ibadah::all();
        $departemens = Departemen::all();
        $subdepartemens = Subdepartemen::all();

        return view('content.pelayanIbadah.edit', compact('pelayanIbadah', 'pelayans', 'ibadahs', 'departemens', 'subdepartemens'));
    }

    public function update(Request $request, PelayanIbadah $pelayanIbadah)
    {
        $validated = $request->validate([
            'id_pelayan' => 'required|exists:pelayan,id_pelayan',
            'id_ibadah' => 'required|exists:ibadah,id_ibadah',
            'id_departemen' => 'required|exists:departemens,id_departemen',
            'id_subdepartemen' => 'required|exists:subdepartemens,id_subdepartemen',
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
