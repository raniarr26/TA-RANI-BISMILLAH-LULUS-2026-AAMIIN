<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jalur;

class JalurController extends Controller
{
    public function user()
{

    $jalur = Jalur::latest()->get();

    return view(
        'jalur',
        compact('jalur')
    );

}

public function detail($id) 
{
     $data = Jalur::findOrFail($id);
      $jalurs = Jalur::all(); 
      return view( 
        'detail-jalur',
         compact( 
         'data', 
         'jalurs' 
         ) 
         );
}

// ===== ADMIN ===== //

    public function index()
    {

        $data = Jalur::orderBy('id', 'asc')->get();

        return view(
            'admin.jalur.index',
            compact('data')
        );

    }

    // ===== STORE ===== //

    public function store(Request $request)
    {
        $request->validate([

        'flowchart' =>
        'nullable|image|mimes:jpg,jpeg,png'
          ]);

          $flowchart = null;

    if($request->hasFile('flowchart'))
    {

        $file = $request->file('flowchart');

        $flowchart = time().'_'.$file->getClientOriginalName();

        $file->move(

            public_path('uploads/flowchart'),

            $flowchart

        );

    }

        Jalur::create([

            'nama_jalur' => $request->nama_jalur, 
            'kategori' => $request->kategori, 
            'deskripsi' => $request->deskripsi, 
            'persyaratan' => $request->persyaratan, 
            'mekanisme' => $request->mekanisme, 
            'flowchart' => $flowchart
            ]);

    
        return back()->with(
        'success',
        'Jalur berhasil ditambahkan'
    );

    }

    // ===== UPDATE ===== //

    public function update(Request $request,$id)
    {
         $jalur = Jalur::findOrFail($id);

    $request->validate([

        'flowchart' =>
        'nullable|image|mimes:jpg,jpeg,png'

    ]);

     $flowchart = $jalur->flowchart;

    if($request->hasFile('flowchart'))
    {

     $file = $request->file('flowchart');

        $flowchart = time().'_'.$file->getClientOriginalName();

        $file->move(

            public_path('uploads/flowchart'),

            $flowchart

        );

    }

        Jalur::find($id)->update([ 
            'nama_jalur' => $request->nama_jalur, 
            'kategori' => $request->kategori, 
            'deskripsi' => $request->deskripsi, 
            'persyaratan' => $request->persyaratan, 
            'mekanisme' => $request->mekanisme, 
            'flowchart' => $flowchart
            ]);

         return back()->with(
        'success',
        'Jalur berhasil diperbarui'
    );

    }

    // ===== DELETE ===== //

    public function delete($id)
    {

        Jalur::find($id)->delete();

        return back();

    }

}