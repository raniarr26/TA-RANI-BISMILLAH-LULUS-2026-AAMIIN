@extends('layouts.admin')

@section('content')

<style>
    .title {
        margin-bottom: 30px;
    }

    .title h1 {
        color: #0d47a1;
        font-size: 38px;
        margin-bottom: 10px;
    }

    .title p {
        color: #666;
    }

    .chat-box {
        background: white;
        padding: 30px;
        border-radius: 18px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 25px;
    }

    .chat {
        margin-bottom: 25px;
        display: flex;
        flex-direction: column;
    }

    .user-chat {
        align-items: flex-start;
    }

    .user-bubble {
        background: #e3f2fd;
        color: #333;
        padding: 15px 18px;
        border-radius: 18px 18px 18px 0;
        max-width: 70%;
        line-height: 1.7;
    }

    .admin-chat {
        align-items: flex-end;
    }

    .admin-bubble {
        background: #1565c0;
        color: white;
        padding: 15px 18px;
        border-radius: 18px 18px 0 18px;
        max-width: 70%;
        line-height: 1.7;
    }

    .label {
        font-size: 13px;
        margin-bottom: 6px;
        color: #666;
    }

    .info-box {
        background: white;
        padding: 25px;
        border-radius: 18px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 25px;
    }

    .info-item {
        margin-bottom: 15px;
    }

    .info-item strong {
        color: #0d47a1;
        display: inline-block;
        width: 100px;
    }

    .status-badge {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
    }

    .status-pending {
        background: #fff3cd;
        color: #856404;
    }

    .status-dijawab {
        background: #d4edda;
        color: #155724;
    }

    .status-closed {
        background: #e0e0e0;
        color: #333;
    }

    .reply-box {
        background: white;
        padding: 25px;
        border-radius: 18px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    .reply-box textarea {
        width: 100%;
        height: 140px;
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 12px;
        resize: none;
        margin-bottom: 15px;
        font-size: 15px;
    }

    .reply-btn {
        width: 100%;
        padding: 14px;
        background: #1565c0;
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        cursor: pointer;
        transition: .3s;
    }

    .reply-btn:hover {
        background: #0d47a1;
    }

    .btn-back {
        display: inline-block;
        margin-top: 20px;
        background: #666;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        transition: .3s;
    }

    .btn-back:hover {
        background: #555;
    }

    .foto-preview {
        max-width: 200px;
        border-radius: 10px;
        margin-top: 10px;
        cursor: pointer;
        border: 1px solid #ddd;
    }

    /* Modal */
    .modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
        cursor: pointer;
    }

    .modal-content {
        margin: auto;
        display: block;
        max-width: 90%;
        max-height: 90%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .close-modal {
        position: absolute;
        top: 20px;
        right: 35px;
        color: white;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
    }

    .close-modal:hover {
        color: #ccc;
    }
</style>

<div class="title">
    <h1>Detail Helpdesk</h1>
    <p>Riwayat percakapan user dan admin</p>
</div>

<div class="info-box">
    <div class="info-item">
        <strong>Nama :</strong> {{ $data->nama }}
    </div>
    <div class="info-item">
        <strong>Email :</strong> {{ $data->email }}
    </div>
    <div class="info-item">
        <strong>No HP :</strong> {{ $data->nohp }}
    </div>
    <div class="info-item">
        <strong>Kategori :</strong> {{ $data->kategori }}
    </div>
    <div class="info-item">
        <strong>Status :</strong>
        @if($data->status == 'Pending')
            <span class="status-badge status-pending">Pending</span>
        @elseif($data->status == 'Dijawab')
            <span class="status-badge status-dijawab">Dijawab</span>
        @else
            <span class="status-badge status-closed">Closed</span>
        @endif
    </div>
    @if($data->foto)
    <div class="info-item">
        <strong>Foto Tiket :</strong>
        <br>
        <img src="{{ asset('uploads/helpdesk/'.$data->foto) }}"
            class="foto-preview"
            onclick="openModal('{{ asset('uploads/helpdesk/'.$data->foto) }}')">
        <br>
        <small style="color:#666;">↳ Klik gambar untuk memperbesar</small>
    </div>
    @endif
</div>

<div class="chat-box">
    @foreach($chats as $chat)
        @if($chat->sender == 'user')
            <div class="chat user-chat">
                <div class="label">
                    User • {{ $chat->created_at->format('d-m-Y H:i') }}
                </div>
                <div class="user-bubble">
                    {{ $chat->message }}
                    @if($chat->foto)
                        <br>
                        <img src="{{ asset('uploads/helpdesk/'.$chat->foto) }}"
                            class="foto-preview"
                            onclick="openModal('{{ asset('uploads/helpdesk/'.$chat->foto) }}')">
                    @endif
                </div>
            </div>
        @else
            <div class="chat admin-chat">
                <div class="label">
                    Admin PMB • {{ $chat->created_at->format('d-m-Y H:i') }}
                </div>
                <div class="admin-bubble">
                    {{ $chat->message }}
                    @if($chat->foto)
                        <br>
                        <img src="{{ asset('uploads/helpdesk/'.$chat->foto) }}"
                            class="foto-preview"
                            onclick="openModal('{{ asset('uploads/helpdesk/'.$chat->foto) }}')">
                    @endif
                </div>
            </div>
        @endif
    @endforeach
</div>

@if($data->status != 'Closed')
    <div class="reply-box">
        <form action="/admin/helpdesk/balas/{{ $data->id }}" method="POST">
            @csrf
            <textarea name="balasan" placeholder="Tulis balasan admin..." required></textarea>
            <button type="submit" class="reply-btn">Kirim Balasan</button>
        </form>
    </div>
@else
    <div class="reply-box" style="text-align:center; background:#f8f9fa;">
        <p style="color:#666;">✖ Tiket ini sudah ditutup. Tidak bisa membalas pesan lagi.</p>
    </div>
@endif

<a href="/admin/helpdesk" class="btn-back">← Kembali ke Daftar Helpdesk</a>

<!-- Modal Preview Foto -->
<div id="imageModal" class="modal" onclick="closeModal()">
    <span class="close-modal">&times;</span>
    <img class="modal-content" id="modalImage">
</div>

<script>
    function openModal(imageSrc) {
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImage');
        modal.style.display = "block";
        modalImg.src = imageSrc;
    }

    function closeModal() {
        const modal = document.getElementById('imageModal');
        modal.style.display = "none";
    }

    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape") {
            closeModal();
        }
    });
</script>

@endsection