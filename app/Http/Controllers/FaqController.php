<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Prodi;

class FaqController extends Controller
{

    // TAMPIL ADMIN

    public function index()
    {

        $data = Faq::latest()->get();

        return view(
            'admin.faq',
            compact('data')
        );

    }

    // SIMPAN FAQ

    public function store(Request $request)
    {

        Faq::create([

            'pertanyaan' =>
            $request->pertanyaan,

            'jawaban' =>
            $request->jawaban,

            'status' =>
            $request->status,

        ]);

        return back()->with(
            'success',
            'FAQ berhasil ditambahkan'
        );

    }

    // HAPUS FAQ

    public function delete($id)
    {

        Faq::find($id)->delete();

        return back()->with(
            'success',
            'FAQ berhasil dihapus'
        );

    }

    // FORM EDIT

    public function edit($id)
    {

        $faq = Faq::find($id);

        return view(
            'admin.editfaq',
            compact('faq')
        );

    }

    // UPDATE FAQ

    public function update(Request $request, $id)
    {

        $faq = Faq::find($id);

        $faq->update([

            'pertanyaan' =>
            $request->pertanyaan,

            'jawaban' =>
            $request->jawaban,

        ]);

        return back()->with(
            'success',
            'FAQ berhasil diupdate'
        );

    }

    // USER FAQ

    public function userFaq()
    {

        $faq = Faq::where(
            'status',
            'Aktif'
        )->orderBy('created_at', 'asc')->get(); // ASCENDING = lama ke baru
        
        $prodis = Prodi::all();

        return view(
            'faq',
            compact(
                'faq',
                'prodis'
            )
        );

    }

}