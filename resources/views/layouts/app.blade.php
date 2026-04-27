<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Informasi PMB</title>

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

    /* ===== NAVBAR ===== */
    header {
        background-color: #0d47a1;
        padding: 0 60px;
        height: 80px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Logo */
    .logo img {
        height: 55px;
        width: auto;
    }

    /* Navigation */
    nav {
        display: flex;
        align-items: center;
    }

    nav a {
        text-decoration: none;
        color: white;
        margin-left: 30px;
        font-weight: 500;
        transition: 0.3s;
    }

    nav a:hover {
        color: #bbdefb;
    }

    .active {
        border-bottom: 2px solid white;
        padding-bottom: 4px;
    }

    /* Button Daftar */
    .btn-daftar {
        background-color: white;
        color: #0d47a1 !important;
        padding: 8px 18px;
        border-radius: 6px;
        font-weight: 600;
    }

    .btn-daftar:hover {
        background-color: #e3f2fd;
    }

    /* ===== TITLE ===== */
    .title {
        text-align: center;
        margin: 60px 0 40px;
    }

    .title h1 {
        color: #0d47a1;
        font-size: 32px;
    }

    /* ===== CARD SECTION ===== */
    .container {
        display: flex;
        justify-content: center;
        gap: 40px;
        padding: 20px 40px 80px;
        flex-wrap: wrap;
    }

    .card {
        background-color: white;
        width: 300px;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(13, 71, 161, 0.1);
        text-align: center;
        transition: 0.3s;
        cursor: pointer;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 25px rgba(13, 71, 161, 0.2);
    }

    .card h2 {
        color: #1565c0;
        margin-bottom: 20px;
    }

    .card img {
        width: 80px;
        margin-bottom: 20px;
    }

    .card p {
        font-size: 14px;
        color: #555;
        line-height: 1.6;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 900px) {
        .container {
            flex-direction: column;
            align-items: center;
        }

        header {
            padding: 0 20px;
        }

        nav a {
            margin-left: 15px;
        }
    }

</style>
</head>
<body>

<header>
    <div class="logo">
        <img src="{{ asset('images/logo-polibatam.png') }}" alt="Logo">
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

<section class="container">
    <div class="card">
        <h2>Jurusan dan Prodi</h2>
        <img src="https://cdn-icons-png.flaticon.com/512/2991/2991148.png" alt="icon">
        <p>
            Informasi lengkap mengenai jurusan dan program studi yang tersedia 
            di kampus beserta akreditasinya.
        </p>
    </div>

    <div class="card">
        <h2>Jalur Masuk</h2>
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png" alt="icon">
        <p>
            Berbagai jalur penerimaan mahasiswa baru yang dapat dipilih sesuai 
            dengan ketentuan dan persyaratan.
        </p>
    </div>

    <div class="card">
        <h2>Tata Cara Pendaftaran</h2>
        <img src="https://cdn-icons-png.flaticon.com/512/2920/2920277.png" alt="icon">
        <p>
            Panduan lengkap proses pendaftaran mulai dari registrasi akun 
            hingga tahap finalisasi berkas.
        </p>
    </div>
</section>

</body>
</html>
