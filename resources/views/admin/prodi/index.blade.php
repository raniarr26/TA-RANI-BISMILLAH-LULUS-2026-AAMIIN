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
</style>

<div class="content">
    <h1>Kelola Program Studi</h1>

    <button class="add-btn" onclick="openModal()">+ Tambah Prodi</button>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th width="8%">No</th>
                    <th width="22%">Kategori</th>
                    <th>Nama Prodi</th>
                    <th width="28%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="left">{{ $item->kategori }}</td>
                    <td class="left">{{ $item->nama_prodi }}</td>
                    <td>
                        <div class="action-group">
                            <a href="/prodi/detail/{{ $item->id }}" class="btn-detail">Detail</a>
                            <button type="button" class="btn-edit" onclick='openEditModal(
                                {{ json_encode($item->id) }},
                                {{ json_encode($item->nama_prodi) }},
                                {{ json_encode($item->kategori) }},
                                {{ json_encode($item->deskripsi) }},
                                {{ json_encode($item->akreditasi) }},
                                {{ json_encode($item->tentang_prodi) }},
                                {{ json_encode($item->profil_lulusan) }},
                                {{ json_encode($item->lainnya) }}
                            )'>Edit</button>
                            <form action="/prodi/delete/{{ $item->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus program studi ini?')" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="empty">📊 Belum ada data program studi</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal()">&times;</span>
        <h2>Tambah Program Studi</h2>
        <form action="/prodi/store" method="POST">
            @csrf
            <input type="text" name="nama_prodi" placeholder="Nama Prodi" required>
            <select name="kategori" required>
                <option value="">Pilih Kategori</option>
                <option value="Diploma 2">Diploma 2</option>
                <option value="Diploma 3">Diploma 3</option>
                <option value="Diploma 4">Diploma 4</option>
                <option value="Magister">Magister</option>
                <option value="PSPPI">PSPPI</option>
            </select>
            <textarea name="deskripsi" placeholder="Deskripsi" required></textarea>
            <textarea name="akreditasi" placeholder="Akreditasi" required></textarea>
            <textarea name="tentang_prodi" placeholder="Tentang Prodi" required></textarea>
            <textarea name="profil_lulusan" placeholder="Profil Lulusan" required></textarea>
            <textarea name="lainnya" placeholder="Lainnya" required></textarea>
            <button type="submit" class="save-btn">Simpan Data</button>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeEditModal()">&times;</span>
        <h2>Edit Program Studi</h2>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="nama_prodi" id="editNamaProdi" placeholder="Nama Prodi" required>
            <select name="kategori" id="editKategori" required>
                <option value="Diploma 2">Diploma 2</option>
                <option value="Diploma 3">Diploma 3</option>
                <option value="Diploma 4">Diploma 4</option>
                <option value="Magister">Magister</option>
                <option value="PSPPI">PSPPI</option>
            </select>
            <textarea name="deskripsi" id="editDeskripsi" placeholder="Deskripsi" required></textarea>
            <textarea name="akreditasi" id="editAkreditasi" placeholder="Akreditasi" required></textarea>
            <textarea name="tentang_prodi" id="editTentangProdi" placeholder="Tentang Prodi" required></textarea>
            <textarea name="profil_lulusan" id="editProfilLulusan" placeholder="Profil Lulusan" required></textarea>
            <textarea name="lainnya" id="editLainnya" placeholder="Lainnya" required></textarea>
            <button type="submit" class="save-btn">Update Data</button>
        </form>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('modal').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('modal').style.display = 'none';
    }

    function openEditModal(id, nama_prodi, kategori, deskripsi, akreditasi, tentang_prodi, profil_lulusan, lainnya) {
        document.getElementById('editModal').style.display = 'flex';
        document.getElementById('editNamaProdi').value = nama_prodi ?? '';
        document.getElementById('editKategori').value = kategori ?? '';
        document.getElementById('editDeskripsi').value = deskripsi ?? '';
        document.getElementById('editAkreditasi').value = akreditasi ?? '';
        document.getElementById('editTentangProdi').value = tentang_prodi ?? '';
        document.getElementById('editProfilLulusan').value = profil_lulusan ?? '';
        document.getElementById('editLainnya').value = lainnya ?? '';
        document.getElementById('editForm').action = '/prodi/update/' + id;
    }

    function closeEditModal() {
        document.getElementById('editModal').style.display = 'none';
    }

    window.onclick = function(event) {
        const modal = document.getElementById('modal');
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