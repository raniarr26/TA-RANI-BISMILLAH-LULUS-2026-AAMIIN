<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>
Admin Panel
</title>

<style>

/* ===== GLOBAL ===== */

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{

    background:#f4f8ff;

    display:flex;

    min-height:100vh;
}

/* ===== SIDEBAR ===== */

.sidebar{

    width:260px;

    min-height:100vh;

    position:fixed;

    top:0;
    left:0;

    background:#1f4fa3;

    color:white;

    padding-top:40px;
}

/* ===== PROFILE ===== */

.admin-profile{

    text-align:center;

    margin-bottom:40px;
}

.admin-profile img{

    width:90px;
    height:90px;

    border-radius:50%;

    background:white;

    margin-bottom:12px;

    object-fit:cover;
}

.admin-profile p{

    font-size:22px;

    font-weight:bold;
}

/* ===== MENU ===== */

.sidebar a{

    display:block;

    padding:16px 30px;

    color:white;

    text-decoration:none;

    transition:.3s;

    font-size:17px;
}

.sidebar a:hover{

    background:#2d66c3;
}

/* ===== ACTIVE MENU ===== */

.active-menu{

    background:#ff9800;
}

/* ===== MAIN ===== */

.main{

    margin-left:260px;

    width:calc(100% - 260px);

    padding:45px;
}

/* ===== RESPONSIVE ===== */

@media(max-width:900px){

    .sidebar{

        width:220px;
    }

    .main{

        margin-left:220px;

        width:calc(100% - 220px);

        padding:30px;
    }

}

</style>

</head>

<body>

<!-- ===== SIDEBAR ===== -->

<div class="sidebar">

    <div class="admin-profile">

        <img src="{{ asset('images/profile.png') }}">

        <p>
            Admin 1
        </p>

    </div>


    <a href="/admin/dashboard"
    class="{{ request()->is('admin/dashboard') ? 'active-menu' : '' }}">

        Kelola Informasi

    </a>

    <a href="/admin/prodi"
    class="{{ request()->is('admin/prodi') ? 'active-menu' : '' }}">

        Kelola Program Studi

    </a>

    <a href="/admin/jalur"
    class="{{ request()->is('admin/jalur') ? 'active-menu' : '' }}">

        Kelola Jalur Pendaftaran

    </a>

    <a href="/admin/faq"
    class="{{ request()->is('admin/faq') ? 'active-menu' : '' }}">

        Kelola FAQ

    </a>

    <a href="/admin/kuesioner"
    class="{{ request()->is('admin/kuesioner') ? 'active-menu' : '' }}">

        Kelola Kuesioner

    </a>

    <a href="/admin/helpdesk"
    class="{{ request()->is('admin/helpdesk') ? 'active-menu' : '' }}">

        Kelola Helpdesk

    </a>

    <a href="/logout">

        Logout

    </a>

</div>

<!-- ===== CONTENT ===== -->

<div class="main">

    @yield('content')

</div>

</body>
</html>