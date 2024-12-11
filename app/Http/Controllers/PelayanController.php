<?php

namespace App\Http\Controllers;

use App\Models\Pelayan;
use App\Models\Departemen;
use App\Models\Subdepartemen;
use Illuminate\Http\Request;

class PelayanController extends Controller
{
    // Menampilkan daftar pelayan
    public function list()
    {
        $pelayans = Pelayan::paginate(10);
        return view('content.pelayan.list', compact('pelayans'));
    }

    // Menampilkan form tambah pelayan
    public function add()
    {
        $departemens = Departemen::all(); // Ambil semua data departemen untuk pilihan
        $subdepartemens = Subdepartemen::all(); // Ambil semua data subdepartemen
        return view('content.pelayan.add', compact('departemens', 'subdepartemens'));
    }

    // Menyimpan pelayan baru
    public function insert(Request $request)
    {
        $validated = $request->validate([
            'nama_pelayan' => 'required|string|max:255',
            'id_departemen' => 'required|exists:departemens,id_departemen',
            'id_subdepartemen' => 'required|exists:subdepartemens,id_subdepartemen',
        ]);

        Pelayan::create($validated);
        return redirect()->route('pelayan.list')->with('success', 'Pelayan berhasil ditambahkan!');
    }


    public function edit(Pelayan $pelayan)
    {
        $departemens = Departemen::all(); // Ambil semua departemen
        $subdepartemens = Subdepartemen::all(); // Ambil semua subdepartemen
        return view('content.pelayan.edit', compact('pelayan', 'departemens', 'subdepartemens'));
    }

    // Mengupdate data pelayan
    public function update(Request $request, Pelayan $pelayan)
    {
        $validated = $request->validate([
            'nama_pelayan' => 'required|string|max:255',
            'id_departemen' => 'required|exists:departemens,id_departemen',
            'id_subdepartemen' => 'required|exists:subdepartemens,id_subdepartemen',
        ]);

        $pelayan->update($validated); // Mass assignment
        return redirect()->route('pelayan.list')->with('success', 'Data pelayan berhasil diperbarui!');
    }

    // Menghapus pelayan
    public function delete(Request $request)
    {
        $pelayan = Pelayan::find($request->id);
        if (!$pelayan) {
            return response()->json(['message' => 'Pelayan tidak ditemukan'], 404);
        }

        $pelayan->delete();
        return response()->json(['message' => 'Pelayan berhasil dihapus'], 200);
    }
}
