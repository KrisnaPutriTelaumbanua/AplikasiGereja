<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use App\Models\Pelayan;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    // Menampilkan daftar presensi
    public function list()
    {
        $presensis = Presensi::with('pelayan')->paginate(10); // Mengambil data presensi dengan relasi pelayan
        return view('content.presensi.list', compact('presensis'));
    }

    // Menampilkan form tambah presensi
    public function add()
    {
        $pelayans = Pelayan::all(); // Ambil semua data pelayan untuk pilihan
        return view('content.presensi.add', compact('pelayans'));
    }

    // Menyimpan presensi baru
    public function insert(Request $request)
    {
        $validated = $request->validate([
            'id_pelayan' => 'required|exists:pelayan,id_pelayan',
            'tgl' => 'required|date',
            'status' => 'required|in:hadir,tidak hadir',
        ]);

        Presensi::create($validated);
        return redirect()->route('presensi.list')->with('success', 'Presensi berhasil ditambahkan!');
    }


    public function delete(Request $request)
    {
        $presensi = Presensi::find($request->id);
        if (!$presensi) {
            return response()->json(['message' => 'Presensi tidak ditemukan'], 404);
        }

        $presensi->delete();
        return response()->json(['message' => 'Presensi berhasil dihapus'], 200);
    }
}
