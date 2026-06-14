<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Helpdesk</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: #f4f8ff;
        }

        .container {
            max-width: 900px;
            margin: 60px auto;
            padding: 20px;
        }

        .title {
            margin-bottom: 30px;
        }

        .title h1 {
            color: #0d47a1;
            font-size: 40px;
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
        }

        .chat {
            margin-bottom: 25px;
            display: flex;
            flex-direction: column;
        }

        .user-chat {
            align-items: flex-end;
        }

        .user-bubble {
            background: #1565c0;
            color: white;
            padding: 15px 18px;
            border-radius: 18px 18px 0 18px;
            max-width: 70%;
            line-height: 1.7;
        }

        .admin-chat {
            align-items: flex-start;
        }

        .admin-bubble {
            background: #e3f2fd;
            color: #333;
            padding: 15px 18px;
            border-radius: 18px 18px 18px 0;
            max-width: 70%;
            line-height: 1.7;
        }

        .label {
            font-size: 13px;
            margin-bottom: 6px;
            color: #666;
        }

        .reply-box {
            margin-top: 25px;
        }

        .reply-box textarea {
            width: 100%;
            height: 120px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 12px;
            resize: none;
            font-size: 15px;
            margin-bottom: 15px;
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

        /* ===== MODAL PREVIEW FOTO ===== */
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
            z-index: 10000;
        }

        .close-modal:hover {
            color: #ccc;
        }

        .preview-link {
            display: inline-block;
            margin-top: 10px;
            color: #1565c0;
            text-decoration: none;
            font-size: 13px;
            cursor: pointer;
        }

        .preview-link:hover {
            text-decoration: underline;
        }

        .success-alert {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .closed-info {
            margin-top: 15px;
            padding: 12px;
            background: #e8f5e9;
            border-radius: 8px;
            color: #2e7d32;
            line-height: 1.6;
        }
    </style>
</head>

<body>
    @include('layouts.header')

    <section class="container">
        <div class="title">
            @if(session('success'))
                <div class="success-alert">
                    {{ session('success') }}
                </div>
            @endif

            <h1>Detail Helpdesk</h1>
            <p>Riwayat percakapan helpdesk</p>
        </div>

        <!-- Tombol Preview Foto Tiket (jika ada foto) -->
        @if($data->foto)
            <div style="margin-bottom: 20px;">
                <span class="preview-link" onclick="openModal('{{ asset('uploads/helpdesk/'.$data->foto) }}')">
                    📷 Klik untuk preview foto tiket
                </span>
            </div>
        @endif

        <div class="chat-box" style="margin-bottom:20px;">
            <strong>Status :</strong>
            @if($data->status == 'Pending')
                <span style="color:orange;">Pending</span>
            @elseif($data->status == 'Dijawab')
                <span style="color:#1565c0;">Dijawab</span>
            @else
                <span style="color:green;">Closed</span>
            @endif

            <br><br>

            <strong>ID Tiket :</strong>
            #{{ $data->id }}

            <br><br>

            <strong>Dibuat :</strong> {{ $data->created_at->format('d-m-Y H:i:s') }}
        </div>

        <div class="chat-box">
            @foreach($chats as $chat)
                @if($chat->sender == 'user')
                    <div class="chat user-chat">
                        <div class="label">
                            Anda • {{ $chat->created_at->format('d-m-Y H:i') }}
                        </div>
                        <div class="user-bubble">
                            {{ $chat->message }}
                            @if($chat->foto)
                                <br><br>
                                <img src="{{ asset('uploads/helpdesk/'.$chat->foto) }}"
                                    style="max-width:200px; border-radius:10px; border:1px solid #ddd; cursor:pointer;"
                                    onclick="openModal('{{ asset('uploads/helpdesk/'.$chat->foto) }}')">
                                <br>
                                <span class="preview-link" onclick="openModal('{{ asset('uploads/helpdesk/'.$chat->foto) }}')">
                                    🔍 Klik untuk perbesar
                                </span>
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
                                <br><br>
                                <img src="{{ asset('uploads/helpdesk/'.$chat->foto) }}"
                                    style="max-width:200px; border-radius:10px; border:1px solid #ddd; cursor:pointer;"
                                    onclick="openModal('{{ asset('uploads/helpdesk/'.$chat->foto) }}')">
                                <br>
                                <span class="preview-link" onclick="openModal('{{ asset('uploads/helpdesk/'.$chat->foto) }}')">
                                    🔍 Klik untuk perbesar
                                </span>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        @if($data->status != 'Closed')
            <div class="chat-box reply-box">
                <form action="/helpdesk/reply/{{ $data->id }}" method="POST">
                    @csrf
                    <div class="label" style="margin-bottom:10px; font-size:15px; font-weight:bold; color:#0d47a1;">
                        Balas Pesan
                    </div>
                    <textarea name="pesan" placeholder="Tulis pesan kembali ke admin..." required></textarea>
                    <button type="submit" class="reply-btn">Kirim Pesan</button>
                </form>
            </div>
        @endif

        @if($data->status == 'Closed')
            <div class="closed-info">
                🔒 Tiket telah ditutup oleh Admin PMB.<br>
                Permasalahan dianggap telah selesai.<br><br>
                Jika masih terdapat kendala baru,<br>
                silakan membuat tiket Helpdesk baru.
            </div>
        @endif
    </section>

    @include('layouts.footer')

    <!-- MODAL PREVIEW FOTO -->
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

        // Tekan ESC untuk tutup modal
        document.addEventListener('keydown', function(event) {
            if (event.key === "Escape") {
                closeModal();
            }
        });
    </script>
</body>

</html>