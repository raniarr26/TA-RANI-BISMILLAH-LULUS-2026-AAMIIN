@extends('layouts.admin')

@section('content')

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', sans-serif;
    }

    .content {
        padding: 40px;
    }

    .content h1 {
        margin-bottom: 30px;
        color: #0d47a1;
        font-size: 34px;
    }

    .table-container {
        background: white;
        padding: 25px;
        border-radius: 18px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        background: #1565c0;
        color: white;
        padding: 14px;
        text-align: center;
        font-size: 15px;
    }

    td {
        padding: 14px;
        border: 1px solid #eee;
        text-align: center;
        font-size: 14px;
        vertical-align: middle;
    }

    tr:hover {
        background: #f4f8ff;
    }

    .left {
        text-align: left;
    }

    .empty {
        text-align: center;
        padding: 20px;
        color: #777;
    }

    .status-pending {
        background: #fff3cd;
        color: #856404;
        padding: 5px 10px;
        border-radius: 6px;
        font-size: 12px;
        display: inline-block;
    }

    .status-dijawab {
        background: #d4edda;
        color: #155724;
        padding: 5px 10px;
        border-radius: 6px;
        font-size: 12px;
        display: inline-block;
    }

    .status-closed {
        background: #e0e0e0;
        color: #333;
        padding: 5px 10px;
        border-radius: 6px;
        font-size: 12px;
        display: inline-block;
    }

    .action-group {
        display: flex;
        gap: 8px;
        justify-content: center;
        align-items: center;
    }

    .btn-detail {
        background: #17a2b8;
        color: white;
        padding: 6px 12px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 12px;
        display: inline-block;
    }

    .btn-detail:hover {
        background: #138496;
    }

    /* Modal */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .modal-content {
        background: white;
        width: 500px;
        padding: 30px;
        border-radius: 12px;
        position: relative;
        max-height: 90vh;
        overflow-y: auto;
    }

    .close-btn {
        position: absolute;
        right: 18px;
        top: 12px;
        font-size: 28px;
        font-weight: bold;
        color: #333;
        cursor: pointer;
    }

    .close-btn:hover {
        color: #dc3545;
    }

    .modal-content h2 {
        color: #1f4fa3;
        margin-bottom: 20px;
    }

    .modal-content textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 14px;
        margin-bottom: 15px;
        outline: none;
        resize: vertical;
        height: 120px;
    }

    .modal-content textarea:focus {
        border-color: #1565c0;
    }

    .save-btn {
        width: 100%;
        padding: 12px;
        background: #1565c0;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 15px;
        transition: .3s;
    }

    .save-btn:hover {
        background: #0d47a1;
    }
</style>

<div class="content">
    <h1>Kelola Pertanyaan Helpdesk</h1>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="15%">Nama</th>
                    <th width="20%">Email</th>
                    <th width="12%">No HP</th>
                    <th width="15%">Kategori</th>
                    <th width="15%">Status</th>
                    <th width="18%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="left">{{ $item->nama }}</td>
                    <td class="left">{{ $item->email }}</td>
                    <td class="left">{{ $item->nohp }}</td>
                    <td class="left">{{ $item->kategori }}</td>
                    <td>
                        @if($item->status == 'Pending')
                            <span class="status-pending">Pending</span>
                        @elseif($item->status == 'Dijawab')
                            <span class="status-dijawab">Dijawab</span>
                        @else
                            <span class="status-closed">Closed</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-group">
                            <button type="button" class="btn-detail" onclick="openModal({{ json_encode($item) }})">Detail & Balas</button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="empty">📊 Belum ada pertanyaan helpdesk</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Detail & Balas -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal()">&times;</span>
        <h2 id="modalTitle">Detail & Balas Pesan</h2>
        
        <div style="margin-bottom: 20px;">
            <p><strong>Nama:</strong> <span id="detailNama"></span></p>
            <p><strong>Email:</strong> <span id="detailEmail"></span></p>
            <p><strong>No HP:</strong> <span id="detailNohp"></span></p>
            <p><strong>Kategori:</strong> <span id="detailKategori"></span></p>
            <p><strong>Status:</strong> <span id="detailStatus"></span></p>
            <p><strong>Pesan:</strong></p>
            <p style="background:#f4f8ff; padding:12px; border-radius:8px;" id="detailPesan"></p>
        </div>

        <hr style="margin: 15px 0; border-color: #eee;">

        <h3 style="margin-bottom: 15px; color:#0d47a1;">Balas Pesan</h3>
        <form id="replyForm" method="POST">
            @csrf
            <textarea name="balasan" id="balasanText" placeholder="Tulis balasan..." required></textarea>
            <button type="submit" class="save-btn">Kirim Balasan</button>
        </form>
    </div>
</div>

<script>
    function openModal(item) {
        document.getElementById('modal').style.display = 'flex';
        document.getElementById('detailNama').innerText = item.nama;
        document.getElementById('detailEmail').innerText = item.email;
        document.getElementById('detailNohp').innerText = item.nohp;
        document.getElementById('detailKategori').innerText = item.kategori;
        
        let statusHtml = '';
        if (item.status == 'Pending') statusHtml = '<span class="status-pending">Pending</span>';
        else if (item.status == 'Dijawab') statusHtml = '<span class="status-dijawab">Dijawab</span>';
        else statusHtml = '<span class="status-closed">Closed</span>';
        document.getElementById('detailStatus').innerHTML = statusHtml;
        
        document.getElementById('detailPesan').innerText = item.pesan || item.message || '-';
        document.getElementById('replyForm').action = '/admin/helpdesk/balas/' + item.id;
    }

    function closeModal() {
        document.getElementById('modal').style.display = 'none';
        document.getElementById('balasanText').value = '';
    }

    window.onclick = function(event) {
        const modal = document.getElementById('modal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
</script>

@endsection