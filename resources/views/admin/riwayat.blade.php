<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Riwayat Pertanyaan</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:#f4f7fb;
    display:flex;
}

/* SIDEBAR */

.sidebar{
    width:250px;
    height:100vh;
    background:#1f4fa3;
    color:white;
    position:fixed;
    left:0;
    top:0;
    padding:30px 20px;
}

.profile{
    text-align:center;
    margin-bottom:40px;
}

.profile img{
    width:90px;
    height:90px;
    border-radius:50%;
    background:white;
    margin-bottom:10px;
}

.profile h3{
    font-size:18px;
}

.menu a{
    display:block;
    padding:14px 18px;
    margin-bottom:10px;
    border-radius:10px;
    text-decoration:none;
    color:white;
    transition:0.3s;
}

.menu a:hover{
    background:#2d66c3;
}

/* MAIN */

.main{
    margin-left:250px;
    width:100%;
    padding:40px;
}

.header{
    margin-bottom:30px;
}

.header h1{
    font-size:42px;
    color:#111;
}

/* SEARCH */

.search-box{
    margin-bottom:25px;
}

.search-box input{
    width:320px;
    padding:12px 15px;
    border:none;
    border-radius:10px;
    background:white;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
    outline:none;
}

/* CARD */

.card{
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 8px 20px rgba(0,0,0,0.08);
}

/* TABLE */

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#1565c0;
    color:white;
    padding:15px;
    text-align:left;
    font-size:14px;
}

td{
    padding:15px;
    border-bottom:1px solid #ddd;
    font-size:14px;
    vertical-align:top;
}

tr:hover{
    background:#f5f8ff;
}

/* STATUS */

.status{
    padding:6px 12px;
    border-radius:20px;
    font-size:12px;
    font-weight:bold;
}

.selesai{
    background:#d4edda;
    color:#155724;
}

.proses{
    background:#fff3cd;
    color:#856404;
}

/* BUTTON */

.detail-btn{
    padding:8px 14px;
    border:none;
    border-radius:8px;
    background:#1565c0;
    color:white;
    cursor:pointer;
    transition:0.3s;
}

.detail-btn:hover{
    background:#0d47a1;
}

/* LINK NAMA */

.nama-link{
    color:#1565c0;
    text-decoration:none;
    font-weight:600;
}

.nama-link:hover{
    text-decoration:underline;
}

/* RESPONSIVE */

@media(max-width:768px){

.sidebar{
    width:100%;
    height:auto;
    position:relative;
}

.main{
    margin-left:0;
}

.search-box input{
    width:100%;
}

}

</style>
</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

    <div class="profile">
        <img src="{{ asset('images/profile.png') }}">
        <h3>Admin 1</h3>
    </div>

    <div class="menu">
        <a href="#">Dashboard</a>
        <a href="#">Riwayat Pertanyaan</a>
        <a href="#">Kelola FAQ</a>
        <a href="#">Logout</a>
    </div>

</div>

<!-- MAIN -->

<div class="main">

    <div class="header">
        <h1>Daftar Riwayat Pertanyaan</h1>
    </div>

    <!-- SEARCH -->

    <div class="search-box">
        <input type="text" placeholder="Cari pertanyaan...">
    </div>

    <!-- TABLE -->

    <div class="card">

        <table>

            <thead>

                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Isi Tiket</th>
                    <th>Status</th>
                </tr>

            </thead>

            <tbody>

                @foreach($tickets as $item)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <!-- TANGGAL OTOMATIS -->
                    <td>
                        {{ $item->created_at->format('d M Y') }}
                    </td>

                    <!-- JAM OTOMATIS SESUAI DETIK -->
                    <td>
                        {{ $item->created_at->format('H:i:s') }} WIB
                    </td>

                    <td>
                        {{ $item->email }}
                    </td>

                    <!-- NAMA BISA DIKLIK -->
                    <td>
                        <a href="/ticket/detail/{{ $item->id }}" class="nama-link">
                            {{ $item->nama }}
                        </a>
                    </td>

                    <td>
                        {{ $item->isi_tiket }}
                    </td>

                    <td>

                        @if($item->status == 'Selesai')

                            <span class="status selesai">
                                Selesai
                            </span>

                        @else

                            <span class="status proses">
                                Diproses
                            </span>

                        @endif

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

</body>
</html>