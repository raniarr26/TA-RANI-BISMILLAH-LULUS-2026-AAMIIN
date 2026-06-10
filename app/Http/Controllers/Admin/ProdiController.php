<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prodi;

class ProdiController extends Controller
{

    // =========================
    // HALAMAN LIST PRODI
    // =========================

    public function index()
    {

        $data = Prodi::all();

        return view(
            'admin.prodi.index',
            compact('data')
        );

    }

    // =========================
    // SIMPAN DATA PRODI
    // =========================

    public function store(Request $request)
    {

        Prodi::create([

        'akreditasi'
         => $request->akreditasi, 
        'tentang_prodi'
         => $request->tentang_prodi,
        'profil_lulusan'
         => $request->profil_lulusan, 
        'lainnya' 
        => $request->lainnya,

        ]);

        return redirect('/admin/prodi');

    }

    public function delete($id)
{

    Prodi::find($id)->delete();

    return redirect('/admin/prodi');

}

    // =========================
    // HALAMAN DETAIL PRODI
    // =========================

    public function detail($id) 
    { $data = Prodi::find($id); 
    $prodis = Prodi::all(); 
    return view( 
        'detail-prodi', 
        compact(
                'data', 
                'prodis' )
        );

    }

    public function update(Request $request, $id)
{

    $prodi = Prodi::find($id);

    $prodi->update([

        'akreditasi'
         => $request->akreditasi, 
        'tentang_prodi'
         => $request->tentang_prodi,
        'profil_lulusan'
         => $request->profil_lulusan, 
        'lainnya' 
        => $request->lainnya,

    ]);

    return redirect('/admin/prodi');

}
    

}