
<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>

{{ $data->judul }}

</title>

<style>

body{

    background:#f4f8ff;

    font-family:'Segoe UI',sans-serif;

    margin:0;
}

.container{

    max-width:1000px;

    margin:50px auto;

    padding:30px;
}

.card{

    background:white;

    padding:35px;

    border-radius:15px;

    box-shadow:
    0 8px 20px rgba(0,0,0,.08);
}

h1{

    color:#1565c0;

    margin-bottom:15px;
}

.badge{

    display:inline-block;

    background:#1565c0;

    color:white;

    padding:8px 15px;

    border-radius:20px;

    margin-bottom:20px;
}

p{

    line-height:2;

    color:#555;
}

.back-btn{

    display:inline-block;

    margin-top:25px;

    text-decoration:none;

    background:#1565c0;

    color:white;

    padding:10px 20px;

    border-radius:8px;
}

</style>

</head>

<body>

@include('layouts.header')

<div class="container">

    <div class="card">

        <h1>

            {{ $data->judul }}

            @if($data->foto)

             <img
              src="{{ asset('uploads/informasi/'.$data->foto) }}" 
             
             style=" 
             max-width:100%;
            height:auto;
            display:block;
            margin:20px auto;
            border-radius:12px; 
             "> 
             
             @endif

        </h1>


        <div class="badge">

            {{ $data->kategori }}

        </div>

        <p style="
        font-size:14px;
        color:#888;
        margin-bottom:20px;
        ">

        Upload :
        {{ $data->created_at->format('d M Y H:i') }}

        </p>


        <p>
            {!! nl2br(e($data->deskripsi)) !!}
        </p>

            @if($data->file_pdf)
            
            <a href="{{ asset('uploads/informasi/'.$data->file_pdf) }}" 
                target="_blank" 
                
                style=" 
                display:inline-block; 
                margin-top:15px; 
                margin-botton:10px;
                padding:8px 12px; 
                background:#ff9800; 
                color:white; 
                text-decoration:none; 
                border-radius:8px; 
                "> 
                📄 Download PDF 
            </a>

        <br>
        @endif

        <a href="/"
        class="back-btn">
            Kembali
        </a>
        

    </div>

</div>

@include('layouts.footer')

</body>

</html>