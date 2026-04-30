<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Helpdesk PMB</title>

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

/* ===== NAVBAR ===== */
header{
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

nav{
    display:flex;
    align-items:center;
}

nav a{
    color:white;
    margin-left:25px;
    text-decoration:none;
    font-weight:500;
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

/* ===== LAYOUT ===== */
.main-container{
    width:90%;
    margin:80px auto;
    display:flex;
    gap:60px;
    align-items:flex-start;
    flex-wrap:wrap;
}

/* LEFT TEXT */
.left-text{
    flex:1;
    font-size:50px;
}

.left-text h1{
    font-size:50px;
    color:#0d47a1;
    line-height:1.2;
}

/* RIGHT CARD */
.card{
    flex:2;
    background:white;
    padding:40px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
}

.card h2{
    margin-bottom:20px;
    color:#1565c0;
}

/* FORM */
.form-group{
    margin-bottom:20px;
}

.form-group label{
    display:block;
    margin-bottom:8px;
    font-weight:500;
}

.form-group input,
.form-group textarea{
    width:100%;
    padding:10px;
    border:1px solid #ccc;
    border-radius:6px;
}

.form-group textarea{
    height:130px;
}

/* BUTTON */
.submit-btn{
    margin-top:10px;
    padding:12px 25px;
    background:#1565c0;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
    font-size:16px;
}

.submit-btn:hover{
    background:#0d47a1;
}

/* RESPONSIVE */
@media(max-width:900px){
    .main-container{
        flex-direction:column;
    }

    .left-text h1{
        font-size:36px;
    }
}
</style>
</head>

<body>

@include('layouts.header')

<section class="main-container">

    <!-- LEFT SIDE -->
    <div class="left-text">
        <h1>Open a<br>New Ticket?</h1>
    </div>

    <!-- RIGHT SIDE -->
    <div class="card">
        <h2>Informasi Kontak</h2>

        <p><strong>Email:</strong> pmb@polibatam.ac.id</p>
        <p><strong>Telepon:</strong> +62 8888-8888-8888</p>
        <p><strong>Jam Layanan:</strong> Senin - Jumat (08.00 - 15.00)</p>

        <hr style="margin:25px 0;">

        <h2>Buat Tiket Baru</h2>

        <form>
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" placeholder="Masukkan nama">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" placeholder="Masukkan email">
            </div>

            <div class="form-group">
                <label>Nomor Hp</label>
                <input type="email" placeholder="Masukkan nomor Hp">
            </div>

            <div class="form-group">
                <label>Pesan / Keluhan</label>
                <textarea placeholder="Tulis pesan kamu..."></textarea>
            </div>

            <button type="submit" class="submit-btn">Kirim Tiket</button>
        </form>
    </div>

</section>

</body>
</html>