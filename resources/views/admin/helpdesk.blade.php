<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kelola Pertanyaan Helpdesk</title>

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

/* ===== SIDEBAR ===== */
.sidebar{
    width:260px;
    height:100vh;
    position:fixed;
    top:0;
    left:0;
    background:#1f4fa3;
    color:white;
    padding-top:40px;
}

.admin-profile{
    text-align:center;
    margin-bottom:40px;
}

.admin-profile img{
    width:80px;
    height:80px;
    border-radius:50%;
    display:block;
    margin:0 auto 10px;
    background:white;
}

.sidebar a{
    display:block;
    padding:15px 30px;
    color:white;
    text-decoration:none;
}

.sidebar a:hover{
    background:#2d66c3;
}

/* ===== MAIN ===== */
.main{
    margin-left:260px;
    padding:40px;
}

.main h1{
    font-size:32px;
    color:#0d47a1;
    margin-bottom:30px;
}

/* ===== CARD ===== */
.ticket-container{
    display:flex;
    gap:20px;
}

/* LIST TIKET */
.ticket-list{
    width:35%;
    background:white;
    padding:20px;
    border-radius:10px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.ticket-item{
    padding:15px;
    border-bottom:1px solid #ddd;
    cursor:pointer;
}

.ticket-item:hover{
    background:#f4f8ff;
}

/* DETAIL */
.ticket-detail{
    flex:1;
    background:white;
    padding:25px;
    border-radius:10px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.ticket-detail h3{
    margin-bottom:15px;
}

/* FORM */
textarea{
    width:100%;
    height:120px;
    margin-top:10px;
    padding:10px;
    border-radius:8px;
    border:1px solid #ccc;
}

.reply-btn{
    margin-top:15px;
    padding:10px 20px;
    background:#1565c0;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="admin-profile">
        <img src="{{ asset('images/profile.png') }}">
        <p>Admin 1</p>
    </div>

    <a href="/admin/dashboard">Dashboard</a>
    <a href="#">Kelola Informasi</a>
    <a href="/admin/faq">Kelola FAQ</a>
    <a href="/admin/kuesioner">Kelola Kuesioner</a>
    <a href="/admin/helpdesk">Helpdesk</a>
    <a href="#">Logout</a>
</div>

<!-- MAIN -->
<div class="main">

    <h1>Kelola Pertanyaan</h1>

    <div class="ticket-container">

        <!-- LIST TIKET -->
        <div class="ticket-list">

            <div class="ticket-item">
                <strong>Rania</strong><br>
                <small>Tidak bisa login</small>
            </div>

            <div class="ticket-item">
                <strong>Andi</strong><br>
                <small>Pertanyaan biaya kuliah</small>
            </div>

        </div>

        <!-- DETAIL & BALAS -->
        <div class="ticket-detail">

            <h3>Detail Pesan</h3>

            <p><strong>Nama:</strong> Rania</p>
            <p><strong>Email:</strong> rania@email.com</p>
            <p><strong>No HP:</strong> 08123456789</p>

            <br>

            <p><strong>Pesan:</strong></p>
            <p>Saya tidak bisa login ke sistem PMB, mohon bantuan.</p>

            <hr style="margin:20px 0;">

            <h3>Balas Pesan</h3>

            <textarea placeholder="Tulis balasan..."></textarea>

            <button class="reply-btn">Kirim Balasan</button>

        </div>

    </div>

</div>

</body>
</html>