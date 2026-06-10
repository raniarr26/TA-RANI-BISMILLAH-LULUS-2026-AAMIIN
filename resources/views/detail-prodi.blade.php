
<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>

{{ $data->nama_prodi }}

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

/* ===== HERO ===== */

.hero{

    background:
    linear-gradient(
    rgba(0,0,0,0.6),
    rgba(0,0,0,0.6)
    ),
    url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1');

    background-size:cover;

    background-position:center;

    padding:90px 40px;

    color:white;
}

.hero h1{

    font-size:50px;

    margin-bottom:15px;
}

.hero p{

    font-size:18px;

    opacity:.9;
}

/* ===== CONTAINER ===== */

.container{

    display:flex;

    gap:30px;

    padding:40px;

    align-items:flex-start;
}

/* ===== SIDEBAR ===== */

.sidebar{

    width:280px;

    background:white;

    border-radius:18px;

    padding:25px;

    box-shadow:
    0 8px 20px rgba(0,0,0,0.08);

    position:sticky;

    top:20px;
}

.sidebar h3{

    color:#1565c0;

    margin-bottom:20px;
}

.sidebar a{

    display:block;

    text-decoration:none;

    padding:12px;

    border-radius:10px;

    margin-bottom:10px;

    color:#333;

    transition:.3s;
}

.sidebar a:hover{

    background:#e3f2fd;

    color:#1565c0;
}

.active-sidebar{ 
    background:#1565c0 !important; 
    color:white !important; 
}

/* ===== CONTENT ===== */

.content{

    flex:1;
}

/* ===== CARD ===== */

.card{

    background:white;

    padding:30px;

    border-radius:20px;

    margin-bottom:25px;

    box-shadow:
    0 8px 20px rgba(0,0,0,0.08);
}

.card h2{

    color:#1565c0;

    margin-bottom:18px;

    font-size:28px;
}

.card p{

    line-height:1.9;

    color:#444;
}

/* ===== RESPONSIVE ===== */

@media(max-width:900px){

    .container{

        flex-direction:column;
    }

    .sidebar{

        width:100%;

        position:relative;
    }

    .hero h1{

        font-size:38px;
    }

}

</style>

</head>

<body>

@include('layouts.header')

<!-- ===== HERO ===== -->

<section class="hero">

    <h1>

        {{ $data->nama_prodi }}

    </h1>

    <p>

        Detail Informasi Program Studi

    </p>

</section>

<!-- ===== CONTAINER ===== -->

<section class="container">

    <!-- ===== SIDEBAR ===== -->

    <div class="sidebar">

        <h3>
            Program Studi
        </h3>

        @foreach($prodis as $item) 
        <a href="/prodi/detail/{{ $item->id }}"
             class=" 
             {{ $data->id == $item->id 
             ? 'active-sidebar' 
             : '' 
             }} 
             "> 
                    {{ $item->nama_prodi }} 
            </a> 
        @endforeach

    </div>

    <!-- ===== CONTENT ===== -->

    <div class="content">

        <!-- ===== TENTANG ===== -->

        <div class="card">

            <h2>
                Tentang Prodi
            </h2>

            <p>

                {!! nl2br(e($data->tentang_prodi)) !!}

            </p>

        </div>

        <!-- ===== AKREDITASI ===== -->

        <div class="card">

            <h2>
                Akreditasi
            </h2>

            <p>

                {!! nl2br(e($data->akreditasi)) !!}

            </p>

        </div>

        <!-- ===== PROFIL ===== -->

        <div class="card">

            <h2>
                Profil Lulusan
            </h2>

            <p>

                {!! nl2br(e($data->profil_lulusan)) !!}

            </p>

        </div>

        <!-- ===== LAINNYA ===== -->

        <div class="card">

            <h2>
                Informasi Lainnya
            </h2>

            <p>

                {!! nl2br(e($data->lainnya)) !!}

            </p>

        </div>

    </div>

</section>

@include('layouts.footer')

</body>

</html>