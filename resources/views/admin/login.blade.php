<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

/* ===== BACKGROUND ===== */
body{
    min-height:100vh;
    background:url("{{ asset('images/bg-polibatam.jpg') }}") no-repeat center center/cover;
    position:relative;
}

/* Blur overlay */
body::before{
    content:"";
    position:absolute;
    inset:0;
    backdrop-filter:blur(10px);
    background:rgba(13,71,161,0.25);
    z-index:0;
}

/* ===== NAVBAR ===== */
header{
    position:relative;
    z-index:2;
    background:#0d47a1;
    padding:0 60px;
    height:80px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.logo img{
    height:55px;
}

nav a{
    color:white;
    margin-left:25px;
    text-decoration:none;
}

nav a:hover{
    color:#bbdefb;
}

.btn-helpdesk{
    background:white;
    color:#0d47a1 !important;
    padding:8px 18px;
    border-radius:8px;
    font-weight:600;
}

/* ===== LOGIN SECTION ===== */
.login-section{
    position:relative;
    z-index:1;
    display:flex;
    justify-content:center;
    align-items:center;
    height:calc(100vh - 80px);
}

.login-card{
    width:400px;
    background:white;
    padding:40px;
    border-radius:16px;
    box-shadow:0 15px 35px rgba(0,0,0,0.2);
}

.login-card h2{
    text-align:center;
    margin-bottom:30px;
    color:#0d47a1;
}

.form-group{
    margin-bottom:20px;
}

.form-group label{
    display:block;
    margin-bottom:8px;
}

.form-group input{
    width:100%;
    padding:12px;
    border:1px solid #ccc;
    border-radius:8px;
}

.login-btn{
    width:100%;
    padding:12px;
    background:#1565c0;
    color:white;
    border:none;
    border-radius:10px;
    cursor:pointer;
}

.login-btn:hover{
    background:#0d47a1;
}
</style>
</head>

<body>

<header>
    <div class="logo">
        <img src="{{ asset('images/logo-polibatam.png') }}">
    </div>
    <nav>
        <a href="/">Beranda</a>
        <a href="/faq">FAQ</a>
        <a href="/kuesioner">Kuesioner</a>
        <a href="/helpdesk" class="btn-helpdesk">Helpdesk</a>
    </nav>
</header>

<section class="login-section">
    <div class="login-card">
        <h2>Admin Login</h2>
        <form>
            <div class="form-group">
                <label>Username</label>
                <input type="text" placeholder="Masukkan username">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" placeholder="Masukkan password">
            </div>

            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>
</section>

</body>
</html>