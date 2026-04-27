<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;

class InformasiController extends Controller
{
    // 🔥 AMBIL DATA
    public function index()
    {
        $data = Informasi::latest()->get();
        return view('admin.dashboard', compact('data'));
    }

    // 🔥 SIMPAN DATA
    public function store(Request $request)
    {
        Informasi::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Data berhasil disimpan');
    }

    // 🔥 DELETE (PINDAH KE DALAM CLASS)
    public function delete($id)
    {
        Informasi::find($id)->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}