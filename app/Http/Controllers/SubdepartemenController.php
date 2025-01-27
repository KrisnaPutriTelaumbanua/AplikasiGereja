<?php

namespace App\Http\Controllers;

use App\Models\Subdepartemen;
use Illuminate\Http\Request;

class SubdepartemenController extends Controller
{
    /**
     * Menampilkan daftar subdepartemen
     */
    public function list()
    {
        $subdepartemens = Subdepartemen::paginate(10);
        return view('content.subdepartemen.list', compact('subdepartemens'));
    }

    /**
     * Menampilkan halaman untuk menambah subdepartemen
     */
    public function add()
    {
        // Tidak perlu mengambil data departemen lagi karena kolom id_departemen sudah dihapus
        return view('content.subdepartemen.add');
    }

    /**
     * Proses penambahan subdepartemen baru
     */
    public function insert(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_subdepartemen' => 'required|string|max:100',
        ]);

        Subdepartemen::create($validated);


        return redirect()->route('subdepartemen.list')->with('success', 'Subdepartemen berhasil ditambahkan!');
    }

    /**
     * Menampilkan halaman untuk mengedit subdepartemen
     */
    public function edit(Subdepartemen $subdepartemen)
    {
        return view('content.subdepartemen.edit', compact('subdepartemen'));
    }

    /**
     * Proses pembaruan data subdepartemen
     */
    public function update(Request $request, Subdepartemen $subdepartemen)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_subdepartemen' => 'required|string|max:100',
        ]);

        // Memperbarui data subdepartemen
        $subdepartemen->update($validated);

        // Redirect ke daftar subdepartemen dengan pesan sukses
        return redirect()->route('subdepartemen.list')->with('success', 'Subdepartemen berhasil diperbarui!');
    }

    /**
     * Proses penghapusan subdepartemen
     */
    public function delete(Request $request)
    {
        $idSubdepartemen = $request->id;
        $subdepartemen = Subdepartemen::find($idSubdepartemen);

        if ($subdepartemen === null) {
            return response()->json([], 404);
        }

        $subdepartemen->delete();

        return response()->json([], 204);
    }
}
