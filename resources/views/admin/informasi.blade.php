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

    .status-aktif {
        background: #28a745;
        color: white;
        padding: 5px 10px;
        border-radius: 6px;
        font-size: 12px;
        display: inline-block;
    }

    .status-tidak-aktif {
        background: #6c757d;
        color: white;
        padding: 5px 10px;
        border-radius: 6px;
        font-size: 12px;
        display: inline-block;
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

    .btn-pdf {
        background: #ff9800;
        color: white;
        padding: 6px 12px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 12px;
        display: inline-block;
    }

    .btn-pdf:hover {
        background: #e68900;
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
        padding: 6px 12px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 12px;
        display: inline-block;
    }

    .btn-delete:hover {
        background: #c82333;
    }

    .action-group {
        display: flex;
        gap: 8px;
        justify-content: center;
        align-items: center;
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

    .error-box {
        background: #ffebee;
        border: 1px solid #ef5350;
        color: #c62828;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 8px;
    }

    .success-box {
        background: #e8f5e9;
        border: 1px solid #4caf50;
        color: #2e7d32;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 8px;
    }
</style>

<div class="content">
    <h1>Kelola Informasi PMB</h1>

    @if ($errors->any())
    <div class="error-box">
        <ul style="margin:0;padding-left:20px;">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session('success'))
    <div class="success-box">
        {{ session('success') }}
    </div>
    @endif

    <button class="add-btn" onclick="openModal()">+ Tambah Informasi</button>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Foto</th>
                    <th>PDF</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="left">{{ $item->judul }}</td>
                    <td>
                        @if($item->foto)
                        <img src="{{ asset('uploads/informasi/'.$item->foto) }}" class="foto-preview">
                        @else
                        <span style="color:#999;">-</span>
                        @endif
                    </td>
                    <td>
                        @if($item->file_pdf)
                        <a href="{{ asset('uploads/informasi/'.$item->file_pdf) }}" target="_blank" class="btn-pdf">📄 Lihat PDF</a>
                        @else
                        <span style="color:#999;">-</span>
                        @endif
                    </td>
                    <td>{{ $item->kategori }}</td>
                    <td>
                        @if($item->status == 'Aktif')
                        <span class="status-aktif">Aktif</span>
                        @else
                        <span class="status-tidak-aktif">Tidak Aktif</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-group">
                            <a href="{{ url('/informasi/detail/' . $item->id) }}" class="btn-detail">Detail</a>
                            <button type="button" class="btn-edit" onclick='openEditModal(
                                @json($item->id),
                                @json($item->judul),
                                @json($item->deskripsi),
                                @json($item->kategori),
                                @json($item->status)
                            )'>Edit</button>
                            <a href="{{ url('/informasi/delete/' . $item->id) }}" class="btn-delete" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="empty">📊 Belum ada data informasi</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- MODAL TAMBAH -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal()">&times;</span>
        <h2>Tambah Informasi</h2>
        <form action="{{ url('/informasi/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="judul" placeholder="Judul" required>
            <textarea name="deskripsi" placeholder="Deskripsi" required></textarea>
            <select name="kategori" required>
                <option value="Informasi">Informasi</option>
                <option value="Pengumuman">Pengumuman</option>
            </select>
            <select name="status" required>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
            <label>📷 Pilih Foto (JPG/JPEG/PNG, maks. 2 MB)</label>
            <input type="file" name="foto" accept=".jpg,.jpeg,.png">
            <label>📄 Pilih File PDF</label>
            <input type="file" name="file_pdf" accept=".pdf">
            <button type="submit" class="save-btn">Simpan Data</button>
        </form>
    </div>
</div>

<!-- MODAL EDIT -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeEditModal()">&times;</span>
        <h2>Edit Informasi</h2>
        <form id="editForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" name="judul" id="editJudul" required>
            <textarea name="deskripsi" id="editDeskripsi" required></textarea>
            <select name="kategori" id="editKategori" required>
                <option value="Informasi">Informasi</option>
                <option value="Pengumuman">Pengumuman</option>
            </select>
            <select name="status" id="editStatus" required>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
            <label>📷 Ganti Foto (JPG/JPEG/PNG, maks. 2 MB)</label>
            <input type="file" name="foto" accept=".jpg,.jpeg,.png">
            <label>📄 Ganti File PDF</label>
            <input type="file" name="file_pdf" accept=".pdf">
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

    function openEditModal(id, judul, deskripsi, kategori, status) {
        document.getElementById('editModal').style.display = 'flex';
        document.getElementById('editJudul').value = judul;
        document.getElementById('editDeskripsi').value = deskripsi;
        document.getElementById('editKategori').value = kategori;
        document.getElementById('editStatus').value = status;
        document.getElementById('editForm').action = '/informasi/update/' + id;
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