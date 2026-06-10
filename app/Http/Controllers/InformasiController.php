<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;

class InformasiController extends Controller
{
    // ===== LIST DATA =====

    public function index()
    {
        $data = Informasi::latest()->get();

        return view(
            'admin.informasi',
            compact('data')
        );
    }

    // ===== SIMPAN =====

    public function store(Request $request)
    {
        $request->validate([
        
        'judul' => 'required',
        'deskripsi' => 'required',
        'kategori' => 'required',
        'status' => 'required',
        'foto' => 'nullable|mimes:jpg,jpeg,png|max:500',
        'file_pdf' => 'nullable|mimes:pdf'
        ]);

        $foto = null;
        $pdf = null;

        // ===== UPLOAD FOTO ===== 
        
        if($request->hasFile('foto')){ 
            $foto = time().'_'.$request 
            ->foto ->
            getClientOriginalName(); 
            $request->foto->move(
             public_path('uploads/informasi'),
             $foto 
             ); 
             }

          // ===== UPLOAD PDF ===== 

        if($request->hasFile('file_pdf')){ 
            $pdf = time().'_'.$request 
            ->file_pdf ->
            getClientOriginalName(); 
            $request->file_pdf->move(
                 public_path('uploads/informasi'),
                  $pdf ); }   

        Informasi::create([

            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'status' => $request->status,
            'foto' => $foto,
            'file_pdf' => $pdf
        ]);

       return back()->with(
'success',
'Informasi berhasil ditambahkan'
);
    }

    // ===== DETAIL =====

    public function detail($id)
    {
        $data = Informasi::findOrFail($id);

        return view(
            'detail-informasi',
            compact('data')
        );
    }

    // ===== UPDATE =====

    public function update(Request $request, $id)
    {
        $request->validate([
        'judul' => 'required',
        'deskripsi' => 'required',
        'kategori' => 'required',
        'status' => 'required',
        'foto' => 'nullable|mimes:jpg,jpeg,png|max:500',
        'file_pdf' => 'nullable|mimes:pdf'
        ]);


        $informasi = Informasi::findOrFail($id);
        $foto = $informasi->foto;
        $pdf = $informasi->file_pdf;

        // FOTO BARU 
        
        if($request->hasFile('foto')){
             $foto = time().'_'.$request 
             ->foto 
             ->getClientOriginalName();
              $request->foto->move(
                 public_path('uploads/informasi'), 
                 $foto 
                 ); }

        // PDF BARU 
        
        if($request->hasFile('file_pdf')){
             $pdf = time().'_'.$request
              ->file_pdf 
              ->getClientOriginalName();
               $request->file_pdf->move(
                 public_path('uploads/informasi'), 
                 $pdf 
                 ); }
        

        $informasi->update([

            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'status' => $request->status,
            'foto' => $foto,
            'file_pdf' => $pdf

        ]);

        return redirect('/admin/dashboard')
->with(
'success',
'Informasi berhasil diperbarui'
);
    }

    // ===== DELETE =====

    public function delete($id)
    {
        Informasi::findOrFail($id)->delete();

       return back()->with(
'success',
'Informasi berhasil dihapus'
);
    }
}