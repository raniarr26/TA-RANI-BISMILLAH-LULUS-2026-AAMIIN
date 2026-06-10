<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>
Jalur Pendaftaran
</title>

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

/* ===== TITLE ===== */

.title{

    text-align:center;

    margin:70px 0 50px;
}

.title h1{

    color:#0d47a1;

    font-size:42px;

    margin-bottom:15px;
}

.title p{

    color:#666;

    font-size:18px;
}

/* ===== CONTAINER ===== */

.container{

    max-width:1200px;

    margin:auto;

    padding:20px;

    display:grid;

    grid-template-columns:
    repeat(auto-fit,minmax(320px,1fr));

    gap:30px;
}

/* ===== CARD ===== */

.card{

    background:white;

    padding:30px;

    border-radius:18px;

    box-shadow:
    0 8px 20px rgba(0,0,0,0.08);

    transition:.3s;
}

.card:hover{

    transform:translateY(-8px);
}

/* ===== TITLE ===== */

.card h2{

    color:#1565c0;

    margin-bottom:18px;

    font-size:26px;
}

/* ===== DESC ===== */

.card p{

    color:#555;

    line-height:1.9;

    margin-bottom:20px;
}

/* ===== BADGE ===== */

.badge{

    display:inline-block;

    padding:10px 18px;

    background:#e3f2fd;

    color:#1565c0;

    border-radius:30px;

    font-weight:600;
}

</style>

</head>

<body>

@include('layouts.header')

<!-- ===== TITLE ===== -->

<section class="title">

    <h1>
        Jalur Pendaftaran
    </h1>

    <p>
        Informasi jalur penerimaan mahasiswa baru
    </p>

</section>

<!-- ===== LIST ===== -->

<section class="container">

@foreach($jalur as $item)

<div class="card">

    <a href="/jalur/detail/{{ $item->id }}"
    style="text-decoration:none;">

        <h2>

            {{ $item->nama_jalur }}

        </h2>

    </a>

    <p>

        {{ $item->deskripsi }}

    </p>

    <div class="badge">

        {{ $item->kategori }}

    </div>

</div>

@endforeach

</section>

@include('layouts.footer')

</body>

</html>