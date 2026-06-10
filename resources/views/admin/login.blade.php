<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>
Admin Login
</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

/* ===== BODY ===== */

body{

    min-height:100vh;

    background:url("{{ asset('images/bg-polibatam.jpg') }}")
    no-repeat center center/cover;

    position:relative;
}

/* ===== OVERLAY ===== */

body::before{

    content:"";

    position:absolute;

    inset:0;

    backdrop-filter:blur(10px);

    background:
    rgba(13,71,161,0.25);

    z-index:0;
}

/* ===== HEADER ===== */

header{

    position:relative;

    z-index:2;

    background:white;

    padding:18px 60px;

    display:flex;

    justify-content:space-between;

    align-items:center;

    box-shadow:
    0 2px 12px rgba(0,0,0,0.08);
}

/* ===== LOGO ===== */

.logo img{

    width:70px;
}

/* ===== NAVBAR ===== */

nav{

    display:flex;

    align-items:center;

    gap:35px;
}

nav a{

    text-decoration:none;

    color:#222;

    font-weight:600;

    transition:.3s;
}

nav a:hover{

    color:#ff9800;
}

/* ===== ACTIVE ===== */

.active{

    color:#ff9800;
}

/* ===== BUTTON ===== */

.btn-helpdesk{

    background:#fb8c00;

    color:white !important;

    padding:12px 22px;

    border-radius:10px;
}

.btn-helpdesk:hover{

    background:#e67e00;
}

/* ===== LOGIN SECTION ===== */

.login-section{

    position:relative;

    z-index:1;

    display:flex;

    justify-content:center;

    align-items:center;

    height:calc(100vh - 95px);
}

/* ===== CARD ===== */

.login-card{

    width:400px;

    background:white;

    padding:40px;

    border-radius:18px;

    box-shadow:
    0 15px 35px rgba(0,0,0,0.2);
}

/* ===== TITLE ===== */

.login-card h2{

    text-align:center;

    margin-bottom:30px;

    color:#1f4fa3;

    font-size:32px;
}

/* ===== FORM ===== */

.form-group{

    margin-bottom:20px;
}

.form-group label{

    display:block;

    margin-bottom:8px;

    font-weight:500;
}

.form-group input{

    width:100%;

    padding:12px;

    border:1px solid #ccc;

    border-radius:10px;

    outline:none;
}

.form-group input:focus{

    border-color:#1565c0;
}

/* ===== BUTTON LOGIN ===== */

.login-btn{

    width:100%;

    padding:12px;

    background:#1565c0;

    color:white;

    border:none;

    border-radius:10px;

    cursor:pointer;

    font-size:15px;

    transition:.3s;
}

.login-btn:hover{

    background:#0d47a1;
}

/* ===== ERROR ===== */

.error{

    background:#ffebee;

    color:#c62828;

    padding:12px;

    border-radius:10px;

    margin-bottom:15px;

    font-size:14px;
}

/* ===== RESPONSIVE ===== */

@media(max-width:768px){

    header{

        flex-direction:column;

        gap:20px;

        padding:20px;
    }

    nav{

        flex-wrap:wrap;

        justify-content:center;
    }

    .login-card{

        width:90%;
    }

}

</style>

</head>

<body>

<!-- ===== HEADER ===== -->

<header>

    <div class="logo">

        <img src="{{ asset('images/logo-polibatam.png') }}">

    </div>

    <nav>

    <a href="/">
        Beranda
    </a>

    <a href="/prodi">
        Program Studi
    </a>

    <a href="/jalur-pendaftaran">
        Jalur Pendaftaran
    </a>

    <a href="/faq">
        FAQ
    </a>

    <a href="/kuesioner">
        Kuesioner
    </a>

    <a href="/helpdesk"
    class="btn-helpdesk">

        Helpdesk

    </a>

</nav>

</header>

<!-- ===== LOGIN ===== -->

<section class="login-section">

    <div class="login-card">

        <h2>
            Admin Login
        </h2>

        {{-- ERROR LOGIN --}}

        @if(session('error'))

            <div class="error">

                {{ session('error') }}

            </div>

        @endif

        <form action="/admin/login"
        method="POST">

            @csrf

            <!-- EMAIL -->

            <div class="form-group">

                <label>
                    Email
                </label>

                <input type="email"
                name="email"
                placeholder="Masukkan email">

            </div>

            <!-- PASSWORD -->

            <div class="form-group">

                <label>
                    Password
                </label>

                <input type="password"
                name="password"
                placeholder="Masukkan password">

            </div>

            <!-- BUTTON -->

            <button type="submit"
            class="login-btn">

                Login

            </button>

        </form>

    </div>

</section>

</body>
</html>