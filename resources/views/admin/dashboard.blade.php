<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin - Kelola Informasi PMB</title>

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}
body{background:#f4f8ff;}

/* SIDEBAR */
.sidebar{
    width:260px;height:100vh;position:fixed;
    background:#1f4fa3;color:white;padding-top:40px;
}
.admin-profile{text-align:center;margin-bottom:40px;}
.admin-profile img{
    width:80px;height:80px;border-radius:50%;background:white;margin-bottom:10px;
}
.sidebar a{display:block;padding:15px 30px;color:white;text-decoration:none;}
.sidebar a:hover{background:#2d66c3;}

/* MAIN */
.main{margin-left:260px;padding:40px;}
.add-btn{
    margin-bottom:20px;padding:10px 18px;
    background:#1565c0;color:white;border:none;border-radius:8px;cursor:pointer;
}

/* TABLE FIX */
.table-container{
    background:white;
    padding:25px;
    border-radius:12px;
    box-shadow:0 8px 20px rgba(0,0,0,0.1);
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse;
    table-layout:fixed;
}

th, td{
    padding:12px;
    border-bottom:1px solid #ddd;
    text-align:left;
    vertical-align:middle;
    word-wrap:break-word;
}

/* LEBAR KOLOM */
th:nth-child(1), td:nth-child(1){width:20%;}
th:nth-child(2), td:nth-child(2){width:35%;}
th:nth-child(3), td:nth-child(3){width:15%;}
th:nth-child(4), td:nth-child(4){width:10%;}
th:nth-child(5), td:nth-child(5){width:20%;}

th{
    background:#1565c0;
    color:white;
}

/* STATUS */
.status{
    padding:5px 10px;
    border-radius:6px;
    font-size:12px;
}
.active{background:#28a745;color:white;}
.inactive{background:#6c757d;color:white;}

/* AKSI FIX */
.aksi-col{
    display:flex;
    gap:8px;
    align-items:center;
    justify-content:flex-start;
    flex-wrap:nowrap;
}

/* BUTTON */
.action-btn{
    padding:6px 12px;
    border:none;
    border-radius:6px;
    cursor:pointer;
    font-size:12px;
    white-space:nowrap;
}

.edit-btn{background:#ffc107;}
.delete-btn{background:#dc3545;color:white;}

/* MODAL */
.modal{
    display:none;
    position:fixed;
    top:0;left:0;
    width:100%;height:100%;
    background:rgba(0,0,0,0.5);
    justify-content:center;
    align-items:center;
}

.modal-content{
    background:white;
    padding:25px;
    border-radius:10px;
    width:400px;
    position:relative;
}

.close-btn{
    position:absolute;
    top:10px;
    right:15px;
    cursor:pointer;
}

.modal-content input,
.modal-content textarea,
.modal-content select{
    width:100%;
    padding:10px;
    margin-top:10px;
    border-radius:6px;
    border:1px solid #ccc;
}

.save-btn{
    margin-top:15px;
    width:100%;
    padding:10px;
    background:#1565c0;
    color:white;
    border:none;
    border-radius:8px;
}
</style>
</head>

<body>

<div class="sidebar">
    <div class="admin-profile">
        <img src="{{ asset('images/profile.png') }}">
        <p>Admin</p>
    </div>

    <a href="/admin/dashboard">Dashboard</a>
    <a href="#">Kelola Informasi</a>
    <a href="/admin/faq">Kelola FAQ</a>
    <a href="/admin/kuesioner">Kelola Kuesioner</a>
    <a href="#">Logout</a>
</div>

<div class="main">
    <h1>Kelola Informasi PMB</h1>

    <button class="add-btn" onclick="openModal()">+ Tambah Informasi</button>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{ $item->judul }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($item->deskripsi, 100) }}</td>
                    <td>{{ $item->kategori }}</td>

                    <td>
                        @if($item->status == 'Aktif')
                            <span class="status active">Aktif</span>
                        @else
                            <span class="status inactive">Tidak Aktif</span>
                        @endif
                    </td>

                    <td class="aksi-col">
                        <button class="action-btn edit-btn">Edit</button>

                        <a href="/informasi/delete/{{ $item->id }}" onclick="return confirm('Yakin hapus?')">
                            <button class="action-btn delete-btn">Hapus</button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- MODAL -->
<div class="modal" id="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal()">×</span>
        <h3>Tambah Informasi</h3>

        <form action="/informasi/store" method="POST">
            @csrf
            <input type="text" name="judul" placeholder="Judul">
            <textarea name="deskripsi" placeholder="Deskripsi"></textarea>

            <select name="kategori">
                <option value="Informasi">Informasi</option>
                <option value="Pengumuman">Pengumuman</option>
            </select>

            <select name="status">
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>

            <button type="submit" class="save-btn">Simpan</button>
        </form>
    </div>
</div>

<script>
function openModal(){
    document.getElementById("modal").style.display="flex";
}
function closeModal(){
    document.getElementById("modal").style.display="none";
}
</script>

</body>
</html>