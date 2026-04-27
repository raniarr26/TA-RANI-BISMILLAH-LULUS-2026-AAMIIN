<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Informasi Penerimaan Mahasiswa Baru</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
}

body {
    background-color: #f4f8ff;
}

/* NAVBAR */
header {
    background-color: #0d47a1;
    padding: 0 60px;
    height: 80px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo img {
    height: 55px;
}

nav a {
    text-decoration: none;
    color: white;
    margin-left: 30px;
}

nav a:hover {
    color: #bbdefb;
}

.active {
    border-bottom: 2px solid white;
}

.btn-daftar {
    background: white;
    color: #0d47a1 !important;
    padding: 8px 18px;
    border-radius: 6px;
}

/* TITLE */
.title {
    text-align: center;
    margin: 60px 0 40px;
}

.title h1 {
    color: #0d47a1;
}

/* CONTAINER FIX */
.container {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    gap: 30px;
    padding: 20px 40px 80px;
    flex-wrap: wrap;
}

/* CARD FIX */
.card {
    background: white;
    width: 300px;
    height: 260px; /* 🔥 biar semua sama */
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    text-align: center;
    overflow: hidden; /* 🔥 penting */
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-8px);
}

/* TEXT */
.card h2 {
    color: #1565c0;
    font-size: 18px;
    margin-bottom: 10px;
}

.card img {
    width: 60px;
    margin-bottom: 10px;
}

.card p {
    font-size: 14px;
    color: #555;
    line-height: 1.5;
    word-wrap: break-word;
}
</style>
</head>

<body>

<header>
    <div class="logo">
        <img src="{{ asset('images/logo-polibatam.png') }}">
    </div>

    <nav>
        <a href="#" class="active">Beranda</a>
            <a href="#">FAQ</a>
            <a href="#">Kuesioner</a>
            <a href="#" class="btn-daftar">Helpdesk</a>
    </nav>
</header>

<section class="title">
    <h1>Informasi Penerimaan Mahasiswa Baru</h1>
</section>

<!-- 🔥 DATA DARI DATABASE -->
<section class="container">

    @php use Illuminate\Support\Str; @endphp

    @forelse($informasi as $item)
        <div class="card">
            <h2>{{ $item->judul }}</h2>

            <img src="https://cdn-icons-png.flaticon.com/512/2991/2991148.png">

            <!-- 🔥 BATASI DESKRIPSI -->
            <p>{{ Str::limit($item->deskripsi, 90) }}</p>
        </div>
    @empty
        <p style="text-align:center; width:100%;">
            Belum ada informasi tersedia
        </p>
    @endforelse

</section>

</body>
</html>