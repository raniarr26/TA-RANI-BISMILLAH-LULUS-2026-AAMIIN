<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin - Kelola FAQ</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:#f4f8ff;
}

/* ===== SIDEBAR ===== */
.sidebar{
    width:260px;
    height:100vh;
    position:fixed;
    top:0;
    left:0;
    background:#1f4fa3;
    color:white;
    padding-top:40px;
}

.admin-profile{
    text-align:center;
    margin-bottom:40px;
}

.admin-profile img{
    width:80px;
    height:80px;
    border-radius:50%;
    display:block;
    margin:0 auto 10px;
    background:white;
}

.sidebar a{
    display:block;
    padding:15px 30px;
    color:white;
    text-decoration:none;
}

.sidebar a:hover{
    background:#2d66c3;
}

/* ===== MAIN ===== */
.main{
    margin-left:260px;
    padding:40px;
}

.main h1{
    font-size:32px;
     color:#0d47a1;
    margin-bottom:30px;
}

/* ===== BUTTON ===== */
.add-btn{
    margin-bottom:20px;
    padding:10px 20px;
    background:#1565c0;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
}

/* ===== TABLE ===== */
.table-container{
    background:white;
    padding:20px;
    border-radius:10px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#1565c0;
    color:white;
    padding:15px;
    text-align:left;
}

td{
    padding:15px;
    border-bottom:1px solid #ddd;
}

.action-btn{
    padding:6px 12px;
    border:none;
    border-radius:6px;
    cursor:pointer;
    margin-right:5px;
}

.edit-btn{
    background:#ffc107;
}

.delete-btn{
    background:#dc3545;
    color:white;
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="admin-profile">
        <img src="{{ asset('images/profile.png') }}">
        <p>Admin 1</p>
    </div>

    <a href="/admin/dashboard">Dashboard</a>
    <a href="#">Kelola Informasi</a>
    <a href="/admin/faq">Kelola FAQ</a>
    <a href="/admin/kuesioner">Kelola Kuesioner</a>
    <a href="#">Logout</a>
</div>

<!-- MAIN -->
<div class="main">

    <h1>Kelola Frequently Asked Questions (FAQ)</h1>

    <!-- TOMBOL TAMBAH -->
    <button class="add-btn">+ Tambah FAQ</button>

    <!-- TABEL FAQ -->
    <div class="table-container">

        <table>
            <thead>
                <tr>
                    <th>Pertanyaan</th>
                    <th>Jawaban</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td>Apa saja syarat pendaftaran PMB?</td>
                    <td>Ijazah, KTP, pas foto, dan isi formulir online.</td>
                    <td>
                        <button class="action-btn edit-btn">Edit</button>
                        <button class="action-btn delete-btn">Hapus</button>
                    </td>
                </tr>

                <tr>
                    <td>Berapa biaya pendaftaran?</td>
                    <td>Rp250.000 melalui bank mitra.</td>
                    <td>
                        <button class="action-btn edit-btn">Edit</button>
                        <button class="action-btn delete-btn">Hapus</button>
                    </td>
                </tr>

            </tbody>
        </table>

    </div>

</div>

</body>
</html>