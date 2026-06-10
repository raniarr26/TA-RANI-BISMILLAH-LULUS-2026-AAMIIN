<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>

{{ $data->nama_jalur }}

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

    font-size:48px;

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

        {{ $data->nama_jalur }}

    </h1>

    <p>

        Detail Jalur Pendaftaran

    </p>

</section>

<!-- ===== CONTAINER ===== -->

<section class="container">

    <!-- ===== SIDEBAR ===== -->

    <div class="sidebar">

        <h3>
            Jalur Pendaftaran
        </h3>

        @foreach($jalurs as $item) 
        <a href="/jalur/detail/{{ $item->id }}"
             class=" 
             {{ $data->id == $item->id 
             ? 'active-sidebar'
              : ''
             }}
             "> 
             
             {{ $item->nama_jalur }} 
            
            </a>
         @endforeach

    </div>

    <!-- ===== CONTENT ===== -->

    <div class="content">

        <!-- ===== GAMBARAN UMUM ===== -->

        <div class="card">

            <h2>
                Gambaran Umum
            </h2>

            <p>

                {!! nl2br(e($data->deskripsi)) !!}

            </p>

        </div>

        <!-- ===== PERSYARATAN ===== -->

        <div class="card">

            <h2>
                Persyaratan
            </h2>

            <p>

                {!! nl2br(e($data->persyaratan)) !!}

            </p>

        </div>

        <!-- ===== MEKANISME ===== -->

        <div class="card">

            <h2>
                Mekanisme Pendaftaran
            </h2>

            <p>

                {!! nl2br(e($data->mekanisme)) !!}

                @if($data->flowchart)

<div style="
margin-top:30px;
text-align:center;
">

<h3 style="
color:#1565c0;
margin-bottom:20px;
">

Flowchart Pendaftaran

</h3>

<img
src="{{ asset('uploads/flowchart/'.$data->flowchart) }}"

alt="Flowchart"

style="
max-width:100%;
height:auto;
border-radius:12px;
box-shadow:0 5px 15px rgba(0,0,0,.1);
">

</div>

@endif
            </p>

        </div>

    </div>

</section>

@include('layouts.footer')

</body>

</html>