<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

use App\Mail\HelpdeskReplyMail;

use Illuminate\Http\Request;

use App\Models\Helpdesk;

use App\Models\HelpdeskChat;

class HelpdeskController extends Controller
{

    // =========================
    // USER HELPDESK
    // =========================

    public function index()
    {

        return view(
            'helpdesk'
        );

    }

    // =========================
    // STORE TIKET
    // =========================

    public function store(Request $request)
{
    $request->validate([

        'nama' => 'required|max:100|regex:/^[a-zA-Z\s]+$/',

        'email' => 'required|email',

        'nohp' => 'required|numeric|digits_between:10,15',

        'kategori' => 'required',

        'pesan' => 'required|min:3',

        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:5120'

    ]);

    $foto = null;

    if ($request->hasFile('foto')) {

        $file = $request->file('foto');

        $foto = time().'_'.$file->getClientOriginalName();

        $file->move(
            public_path('uploads/helpdesk'),
            $foto
        );
    }

    $helpdesk = Helpdesk::create([

        'nama' => $request->nama,

        'email' => $request->email,

        'nohp' => $request->nohp,

        'kategori' => $request->kategori,

        'pesan' => $request->pesan,

        'status' => 'Pending',

        'foto' => $foto

    ]);

    HelpdeskChat::create([

        'helpdesk_id' => $helpdesk->id,

        'sender' => 'user',

        'message' => $request->pesan,

        'foto' => $foto

    ]);

    return back()->with(
        'success',
        'Tiket berhasil dikirim'
    );
}

    // =========================
    // DETAIL USER
    // =========================

    public function detail($id)
    {

        $data = Helpdesk::find($id);

        $chats = HelpdeskChat::where(
            'helpdesk_id',
            $id
        )->get();

        return view(

            'detail-helpdesk',

            compact(
                'data',
                'chats'
            )

        );

    }

    // =========================
    // ADMIN LIST
    // =========================

    public function admin()
    {

        $data = Helpdesk::orderBy(
            'id',
            'desc'
        )->get();

        return view(

            'admin.helpdesk.index',

            compact('data')

        );

    }

    // =========================
    // ADMIN DETAIL
    // =========================

    public function adminDetail($id)
    {

        $data = Helpdesk::find($id);

        $chats = HelpdeskChat::where(
            'helpdesk_id',
            $id
        )->get();

        return view(

            'admin.helpdesk.detail',

            compact(
                'data',
                'chats'
            )

        );

    }

    // =========================
    // BALAS HELPDESK
    // =========================

    public function balas(
    Request $request,
    $id
    ){

        $helpdesk = Helpdesk::find($id);

        // ===== CHAT ADMIN =====

        HelpdeskChat::create([

            'helpdesk_id' =>
            $helpdesk->id,

            'sender' =>
            'admin',

            'message' =>
            $request->balasan

        ]);

        // ===== UPDATE STATUS =====

        $helpdesk->update([

            'status' =>
            'Dijawab'

        ]);

        // ===== KIRIM EMAIL =====

         Mail::to($helpdesk->email)
         ->send(
             new HelpdeskReplyMail($helpdesk)
         );

        return redirect(
            '/admin/helpdesk'
        );

    }

    // =========================
    // USER REPLY
    // =========================

    public function reply(
    Request $request,
    $id
    ){

        HelpdeskChat::create([

            'helpdesk_id' =>
            $id,

            'sender' =>
            'user',

            'message' =>
            $request->pesan

        ]);

        Helpdesk::find($id)->update([

            'status' =>
            'Pending'

        ]);

        return back();

    }

    public function close($id)
{

    Helpdesk::find($id)->update([

        'status' => 'Closed'

    ]);

    return back()->with(

        'success',

        'Tiket berhasil ditutup'

    );

}

}