<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    /**
     * Menampilkan daftar departemen
     */
    public function list()
    {
        $departemens = Departemen::paginate(10);
        return view('content.departemen.list', compact('departemens'));
    }

    /**
     * Menampilkan halaman untuk menambah departemen
     */
    public function add()
    {
        $departemens = Departemen::all(); 
        return view('content.departemen.add', compact('departemens'));
    }


    /**
     * Proses penambahan departemen baru
     */
    public function insert(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_departemen' => 'required|string|max:100',
        ]);

        // Menambahkan data departemen baru
        Departemen::create($validated);

        // Redirect ke daftar departemen dengan pesan sukses
        return redirect()->route('departemen.list')->with('success', 'Departemen berhasil ditambahkan!');
    }

    /**
     * Menampilkan halaman untuk mengedit departemen
     */
    public function edit(Departemen $departemen)
    {
        return view('content.departemen.edit', compact('departemen'));
    }

    /**
     * Proses pembaruan data departemen
     */
    public function update(Request $request, Departemen $departemen)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_departemen' => 'required|string|max:100',
        ]);

        // Memperbarui data departemen
        $departemen->update($validated);

        // Redirect ke daftar departemen dengan pesan sukses
        return redirect()->route('departemen.list')->with('success', 'Departemen berhasil diperbarui!');
    }

    /**
     * Proses penghapusan departemen
     */
    // Proses penghapusan departemen
    public function delete(Request $request)
    {
        $idDepartemen = $request->id; // Mendapatkan ID departemen dari request
        $departemen = Departemen::find($idDepartemen); // Mencari departemen berdasarkan ID

        // Cek apakah departemen ditemukan
        if ($departemen === null) {
            return response()->json([], 404); // Jika tidak ditemukan, kembalikan response 404
        }

        // Menghapus departemen
        $departemen->delete();

        // Mengembalikan response 204 (No Content) setelah berhasil dihapus
        return response()->json([], 204);
    }

}
