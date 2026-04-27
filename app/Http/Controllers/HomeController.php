<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;

class HomeController extends Controller
{
    public function index()
    {
        $informasi = Informasi::where('status', 'Aktif')->latest()->get();

        return view('beranda', compact('informasi'));
    }
}
