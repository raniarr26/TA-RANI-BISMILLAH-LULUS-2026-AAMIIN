<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Responden;
use App\Models\Prodi;

use App\Exports\RespondenExport;

use Maatwebsite\Excel\Facades\Excel;

class KuesionerController extends Controller
{

    // =========================
    // USER
    // =========================

    public function index()
    {

        $prodis = Prodi::all();

        return view(
            'kuesioner',
            compact('prodis')
        );

    }

    // =========================
    // SIMPAN DATA USER
    // =========================

    public function store(Request $request)
{

    $request->validate([

        'nama' => [
            'required',
            'max:100',
            'regex:/^[a-zA-Z\s]+$/'
        ],

        'email' => [
            'required',
            'email',
            'unique:respondens,email'
        ],

        'nohp' => [
            'required',
            'numeric',
            'digits_between:10,15',
            'unique:respondens,nohp'
        ],

        'sekolah' => 'required',

        'jk' => 'required',

        'q1' => 'required',

        'q2' => 'required',

        'q3' => 'required',

    ],[

        'nama.required' =>
        'Nama wajib diisi',

        'nama.regex' =>
        'Nama hanya boleh berisi huruf',

        'email.required' =>
        'Email wajib diisi',

        'email.email' =>
        'Format email tidak valid',

        'email.unique' =>
        'Email sudah pernah mengisi kuesioner',

        'nohp.required' =>
        'Nomor HP wajib diisi',

        'nohp.numeric' =>
        'Nomor HP hanya boleh angka',

        'nohp.unique' =>
        'Nomor HP sudah pernah digunakan',

        'nohp.digits_between' =>
        'Nomor HP harus 10-15 digit',

    ]);

    Responden::create([

        'nama' => $request->nama,

        'email' => $request->email,

        'nohp' => $request->nohp,

        'sekolah' => $request->sekolah,

        'jk' => $request->jk,

        'q1' => $request->q1,

        'q2' => $request->q2,

        'q3' => $request->q3,

    ]);

    return back()->with(
        'success',
        'Kuesioner berhasil dikirim'
    );

}

    // =========================
    // ADMIN
    // =========================

    public function admin() 
    { $data = Responden::latest()->get(); 
    return view( 'admin.kuesioner.index',
     compact('data') ); }

    // =========================
    // EXPORT EXCEL
    // =========================

    public function export()
    {

        return Excel::download(

            new RespondenExport,

            'data_responden.xlsx'

        );

    }

}