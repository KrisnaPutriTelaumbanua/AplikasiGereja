<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{

    public function list()
    {
        $categories = Kategori::query()->paginate(10); // Ambil data kategori dengan pagination
        return view('content.kategori.list', [
            'categories' => $categories
        ]);
    }

    // Menampilkan form untuk menambahkan kategori
    public function add()
    {
        return view('content.kategori.add');
    }

    // Menyimpan kategori baru
    public function insert(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string'
        ]);

        $kategori = new Kategori(); // Menggunakan Kategori
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->deskripsi = $request->deskripsi;
        $kategori->save();

        return redirect(url('/kategori'))->with('success', 'Kategori berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit kategori
    public function edit($id_kategori)
    {
        $kategori = Kategori::find($id_kategori);
        if ($kategori === null) {
            abort(404);
        }

        return view('content.kategori.edit', ['kategori' => $kategori]);
    }

    // Memperbarui kategori
    public function update(Request $request, $id_kategori)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string'
        ]);

        $kategori = Kategori::find($id_kategori); // Menggunakan $id_kategori yang diteruskan
        if ($kategori === null) {
            abort(404);
        }

        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->deskripsi = $request->deskripsi;
        $kategori->save();

        return redirect()->route('kategori.list')->with('success', 'Kategori berhasil diperbarui!');
    }

    // Menghapus kategori
    public function delete(Request $request)
    {
        $idKategori = $request->id;
        $kategori = Kategori::find($idKategori); // Menggunakan Kategori
        if ($kategori === null) {
            return response()->json([], 404);
        }

        $kategori->delete();
        return response()->json([], 204);
    }
}
