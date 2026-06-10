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

    .foto-preview {
        width: 80px;
        height: 60px;
        object-fit: contain;
        border-radius: 6px;
        border: 1px solid #ddd;
        padding: 4px;
        background: white;
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
    .modal-content select,
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
    .modal-content select:focus,
    .modal-content textarea:focus {
        border-color: #1565c0;
    }

    .modal-content textarea {
        height: 100px;
        resize: vertical;
    }

    .modal-content label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #333;
        font-size: 13px;
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

    small {
        display: block;
        margin-top: -10px;
        margin-bottom: 15px;
        color: #666;
        font-size: 12px;
    }
</style>

<div class="content">
    <h1>Kelola Jalur Pendaftaran</h1>

    <button class="add-btn" onclick="openModal()">+ Tambah Jalur</button>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th width="8%">No</th>
                    <th width="25%">Nama Jalur</th>
                    <th width="20%">Kategori</th>
                    <th width="20%">Flowchart</th>
                    <th width="27%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="left">{{ $item->nama_jalur }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>
                        @if($item->flowchart)
                        <img src="{{ asset('uploads/flowchart/'.$item->flowchart) }}" class="foto-preview">
                        @else
                        <span style="color:#999;">-</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-group">
                            <a href="/jalur/detail/{{ $item->id }}" class="btn-detail">Detail</a>
                            <button type="button" class="btn-edit" onclick='openEditModal(
                                {{ json_encode($item->id) }},
                                {{ json_encode($item->nama_jalur) }},
                                {{ json_encode($item->kategori) }},
                                {{ json_encode($item->deskripsi) }},
                                {{ json_encode($item->persyaratan) }},
                                {{ json_encode($item->mekanisme) }}
                            )'>Edit</button>
                            <form action="/jalur/delete/{{ $item->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus jalur pendaftaran ini?')" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="empty">📊 Belum ada data jalur pendaftaran</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah -->
<div id="modalJalur" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal()">&times;</span>
        <h2>Tambah Jalur Pendaftaran</h2>
        <form action="/jalur/store" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="nama_jalur" placeholder="Nama Jalur" required>
            <select name="kategori" required>
                <option value="">Pilih Kategori</option>
                <option value="Jalur Nasional">Jalur Nasional</option>
                <option value="Jalur Mandiri">Jalur Mandiri</option>
                <option value="Jalur Lainnya">Jalur Lainnya</option>
            </select>
            <textarea name="deskripsi" placeholder="Gambaran Umum" required></textarea>
            <textarea name="persyaratan" placeholder="Persyaratan" required></textarea>
            <textarea name="mekanisme" placeholder="Mekanisme Pendaftaran" required></textarea>
            <label>📷 Flowchart Pendaftaran</label>
            <input type="file" name="flowchart" accept=".jpg,.jpeg,.png,image/jpeg,image/png">
            <small>Format: JPG, JPEG, PNG (Maks. 2 MB)</small>
            <button type="submit" class="save-btn">Simpan Data</button>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeEditModal()">&times;</span>
        <h2>Edit Jalur Pendaftaran</h2>
        <form id="editForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" name="nama_jalur" id="editNama" placeholder="Nama Jalur" required>
            <select name="kategori" id="editKategori" required>
                <option value="Jalur Nasional">Jalur Nasional</option>
                <option value="Jalur Mandiri">Jalur Mandiri</option>
                <option value="Jalur Lainnya">Jalur Lainnya</option>
            </select>
            <textarea name="deskripsi" id="editDeskripsi" placeholder="Gambaran Umum" required></textarea>
            <textarea name="persyaratan" id="editPersyaratan" placeholder="Persyaratan" required></textarea>
            <textarea name="mekanisme" id="editMekanisme" placeholder="Mekanisme Pendaftaran" required></textarea>
            <label>📷 Ganti Flowchart</label>
            <input type="file" name="flowchart" accept=".jpg,.jpeg,.png,image/jpeg,image/png">
            <small>Format: JPG, JPEG, PNG (Maks. 2 MB) - Kosongkan jika tidak ingin mengganti</small>
            <button type="submit" class="save-btn">Update Data</button>
        </form>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('modalJalur').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('modalJalur').style.display = 'none';
    }

    function openEditModal(id, nama_jalur, kategori, deskripsi, persyaratan, mekanisme) {
        document.getElementById('editModal').style.display = 'flex';
        document.getElementById('editNama').value = nama_jalur ?? '';
        document.getElementById('editKategori').value = kategori ?? '';
        document.getElementById('editDeskripsi').value = deskripsi ?? '';
        document.getElementById('editPersyaratan').value = persyaratan ?? '';
        document.getElementById('editMekanisme').value = mekanisme ?? '';
        document.getElementById('editForm').action = '/jalur/update/' + id;
    }

    function closeEditModal() {
        document.getElementById('editModal').style.display = 'none';
    }

    window.onclick = function(event) {
        const modal = document.getElementById('modalJalur');
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