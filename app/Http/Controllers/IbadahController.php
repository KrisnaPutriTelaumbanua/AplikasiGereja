<?php

namespace App\Http\Controllers;

use App\Models\Ibadah;
use App\Models\Kategori;
use Illuminate\Http\Request;

class IbadahController extends Controller
{
    public function list()
    {
        // Paginate the ibadah records (10 records per page as an example)
        $ibadahList = Ibadah::with('kategori')->paginate(10);

        return view('content.ibadah.list', compact('ibadahList'));
    }




    // Display the form to add a new ibadah record
    public function add()
    {
        $categories = Kategori::all(); // Fetch all categories to show in the form
        return view('content.ibadah.add', [
            'categories' => $categories
        ]);
    }

    // Store a new ibadah record
    public function insert(Request $request)
    {
        $validated = $request->validate([
            'tgl_ibadah' => 'required|date',
            'waktu_ibadah' => 'required|date_format:H:i',
            'id_kategori' => 'required|exists:categories,id_kategori', // Ensure the category exists
        ]);

        $ibadah = new Ibadah(); // Create a new Ibadah instance
        $ibadah->tgl_ibadah = $request->tgl_ibadah;
        $ibadah->waktu_ibadah = $request->waktu_ibadah;
        $ibadah->id_kategori = $request->id_kategori;
        $ibadah->save();

        return redirect(url('/ibadah'))->with('success', 'Ibadah berhasil ditambahkan!');
    }

    // Show the form to edit an ibadah record
    public function edit($id_ibadah)
    {
        $ibadah = Ibadah::find($id_ibadah);
        if ($ibadah === null) {
            abort(404);
        }

        $categories = Kategori::all(); // Fetch all categories to show in the form
        return view('content.ibadah.edit', [
            'ibadah' => $ibadah,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id_ibadah)
    {
        $validated = $request->validate([
            'tgl_ibadah' => 'required|date',
            'waktu_ibadah' => 'required|date_format:H:i',
            'id_kategori' => 'required|exists:categories,id_kategori',
        ]);

        $ibadah = Ibadah::find($id_ibadah);
        if ($ibadah === null) {
            abort(404);
        }

        $ibadah->tgl_ibadah = $request->tgl_ibadah;
        $ibadah->waktu_ibadah = $request->waktu_ibadah;
        $ibadah->id_kategori = $request->id_kategori;
        $ibadah->save();

        return redirect()->route('ibadah.list')->with('success', 'Ibadah berhasil diperbarui!');
    }

    public function delete(Request $request)
    {
        $idIbadah = $request->id;
        $ibadah = Ibadah::find($idIbadah);
        if ($ibadah === null) {
            return response()->json([], 404);
        }

        $ibadah->delete();
        return response()->json([], 204);
    }
}
