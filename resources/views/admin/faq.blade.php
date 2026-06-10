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

    .add-btn {
        margin-bottom: 20px;
        padding: 12px 22px;
        background: #1565c0;
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-size: 15px;
        transition: .3s;
    }

    .add-btn:hover {
        background: #0d47a1;
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

    .action-group {
        display: flex;
        gap: 8px;
        justify-content: center;
        align-items: center;
    }

    .btn-edit {
        background: #ffc107;
        color: #333;
        border: none;
        padding: 6px 12px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 12px;
    }

    .btn-edit:hover {
        background: #e0a800;
    }

    .btn-delete {
        background: #dc3545;
        color: white;
        border: none;
        padding: 6px 12px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 12px;
    }

    .btn-delete:hover {
        background: #c82333;
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

    .modal-content input,
    .modal-content textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 14px;
        margin-bottom: 15px;
        outline: none;
    }

    .modal-content input:focus,
    .modal-content textarea:focus {
        border-color: #1565c0;
    }

    .modal-content textarea {
        height: 120px;
        resize: vertical;
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
    <h1>Kelola Frequently Asked Questions (FAQ)</h1>

    <button class="add-btn" onclick="openModal()">+ Tambah FAQ</button>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th width="8%">No</th>
                    <th width="35%">Pertanyaan</th>
                    <th width="37%">Jawaban</th>
                    <th width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="left">{{ $item->pertanyaan }}</td>
                    <td class="left">{{ $item->jawaban }}</td>
                    <td>
                        <div class="action-group">
                            <button type="button" class="btn-edit" onclick='openEditModal(
                                {{ json_encode($item->id) }},
                                {{ json_encode($item->pertanyaan) }},
                                {{ json_encode($item->jawaban) }}
                            )'>Edit</button>
                            <form action="/faq/delete/{{ $item->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus FAQ ini?')" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="empty">📊 Belum ada data FAQ</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah -->
<div id="modalFaq" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal()">&times;</span>
        <h2>Tambah FAQ</h2>
        <form action="/faq/store" method="POST">
            @csrf
            <input type="text" name="pertanyaan" placeholder="Masukkan pertanyaan" required>
            <textarea name="jawaban" placeholder="Masukkan jawaban" required></textarea>
            <input type="hidden" name="status" value="Aktif">
            <button type="submit" class="save-btn">Simpan FAQ</button>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeEditModal()">&times;</span>
        <h2>Edit FAQ</h2>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="pertanyaan" id="editPertanyaan" required>
            <textarea name="jawaban" id="editJawaban" required></textarea>
            <button type="submit" class="save-btn">Update FAQ</button>
        </form>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('modalFaq').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('modalFaq').style.display = 'none';
    }

    function openEditModal(id, pertanyaan, jawaban) {
        document.getElementById('editModal').style.display = 'flex';
        document.getElementById('editPertanyaan').value = pertanyaan ?? '';
        document.getElementById('editJawaban').value = jawaban ?? '';
        document.getElementById('editForm').action = '/faq/update/' + id;
    }

    function closeEditModal() {
        document.getElementById('editModal').style.display = 'none';
    }

    window.onclick = function(event) {
        const modal = document.getElementById('modalFaq');
        const editModal = document.getElementById('editModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
        if (event.target == editModal) {
            editModal.style.display = 'none';
        }
    }
</script>

@endsection