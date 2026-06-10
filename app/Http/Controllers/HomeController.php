<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\Prodi;
use App\Models\Faq;
use App\Models\Jalur;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $informasi = Informasi::where('status', 'Aktif')
            ->latest()
            ->get();

        $faq = Faq::where('status', 'Aktif')
            ->latest()
            ->get();

        $prodis = Prodi::all();
        $jalurs = Jalur::all();

        $searchProdis = collect();
        $searchJalurs = collect();
        $informasiSearch = collect();

        if ($search) {
            $searchProdis = Prodi::where('nama_prodi', 'like', "%{$search}%")
                ->orWhere('kategori', 'like', "%{$search}%")
                ->get();

            $searchJalurs = Jalur::where('nama_jalur', 'like', "%{$search}%")
                ->orWhere('kategori', 'like', "%{$search}%")
                ->get();

            $informasiSearch = Informasi::where('judul', 'like', "%{$search}%")
                ->orWhere('deskripsi', 'like', "%{$search}%")
                ->get();
        }

        return view('beranda', compact(
            'informasi',
            'faq',
            'prodis',
            'jalurs',
            'search',
            'searchProdis',
            'searchJalurs',
            'informasiSearch'
        ));
    }
}