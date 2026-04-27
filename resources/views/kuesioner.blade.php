<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kuesioner Layanan</title>

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

.logo img{height:55px;}

nav a{
    color:white;
    margin-left:25px;
    text-decoration:none;
}

.active{
    border-bottom:2px solid white;
}

.btn-helpdesk{
    background:white;
    color:#0d47a1 !important;
    padding:8px 18px;
    border-radius:8px;
}

/* ===== TITLE ===== */
.title{
    text-align:center;
    margin:40px 0 30px;
}

.title h1{
    color:#0d47a1;
}

/* ===== WRAPPER ===== */
.wrapper{
    display:flex;
    gap:30px;
    width:90%;
    margin:auto;
    align-items:flex-start;
}

/* ===== DATA DIRI ===== */
.form-container{
    flex:1;
    background:white;
    padding:25px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.form-group{
    margin-bottom:15px;
}

label{
    display:block;
    margin-bottom:5px;
}

input, select{
    width:100%;
    padding:10px;
    border:1px solid #ccc;
    border-radius:6px;
}

/* ===== KUESIONER ===== */
.table-container{
    flex:2;
    background:white;
    padding:25px;
    border-radius:12px;
    box-shadow:0 8px 20px rgba(0,0,0,0.1);
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse;
    text-align:center;
}

thead{
    background:#1565c0;
    color:white;
}

th, td{
    padding:15px;
    border:1px solid #ddd;
}

.question-col{
    text-align:left;
}

/* ===== BUTTON ===== */
.submit-btn{
    margin-top:20px;
    padding:12px 30px;
    background:#1565c0;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
}

/* ===== RESPONSIVE ===== */
@media(max-width:900px){
    .wrapper{
        flex-direction:column;
    }
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
        <a href="/kuesioner" class="active">Kuesioner</a>
        <a href="/helpdesk" class="btn-helpdesk">Helpdesk</a>
    </nav>
</header>

<section class="title">
    <h1>Kuesioner Layanan Penerimaan Mahasiswa Baru</h1>
</section>

<form>

<div class="wrapper">

    <!-- ===== DATA DIRI (KIRI) ===== -->
    <div class="form-container">

        <h3>Data Diri</h3>

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-group">
            <label>No HP</label>
            <input type="text" name="nohp" required>
        </div>

        <div class="form-group">
            <label>Asal Sekolah</label>
            <input type="text" name="sekolah">
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jk">
                <option value="">-- Pilih --</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

    </div>

    <!-- ===== KUESIONER (KANAN) ===== -->
    <div class="table-container">

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pertanyaan</th>
                    <th>Sangat Baik</th>
                    <th>Baik</th>
                    <th>Cukup</th>
                    <th>Kurang</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td>1</td>
                    <td class="question-col">Bagaimana kualitas pelayanan informasi PMB?</td>
                    <td><input type="radio" name="q1" value="4"></td>
                    <td><input type="radio" name="q1" value="3"></td>
                    <td><input type="radio" name="q1" value="2"></td>
                    <td><input type="radio" name="q1" value="1"></td>
                </tr>

                <tr>
                    <td>2</td>
                    <td class="question-col">Apakah website mudah digunakan?</td>
                    <td><input type="radio" name="q2" value="4"></td>
                    <td><input type="radio" name="q2" value="3"></td>
                    <td><input type="radio" name="q2" value="2"></td>
                    <td><input type="radio" name="q2" value="1"></td>
                </tr>

                
                <tr>
                    <td>3</td>
                    <td class="question-col">Seberapa cepat respon layanan Helpdesk?</td>
                    <td><input type="radio" name="q3" value="4"></td>
                    <td><input type="radio" name="q3" value="3"></td>
                    <td><input type="radio" name="q3" value="2"></td>
                    <td><input type="radio" name="q3" value="1"></td>
                </tr>

                <tr>
                    <td>4</td>
                    <td class="question-col">Seberapa cepat respon layanan Helpdesk?</td>
                    <td><input type="radio" name="q3" value="4"></td>
                    <td><input type="radio" name="q3" value="3"></td>
                    <td><input type="radio" name="q3" value="2"></td>
                    <td><input type="radio" name="q3" value="1"></td>
                </tr>

                <tr>
                    <td>5</td>
                    <td class="question-col">Seberapa cepat respon layanan Helpdesk?</td>
                    <td><input type="radio" name="q3" value="4"></td>
                    <td><input type="radio" name="q3" value="3"></td>
                    <td><input type="radio" name="q3" value="2"></td>
                    <td><input type="radio" name="q3" value="1"></td>
                </tr>

                <tr>
                    <td>6    </td>
                    <td class="question-col">Seberapa cepat respon layanan Helpdesk?</td>
                    <td><input type="radio" name="q3" value="4"></td>
                    <td><input type="radio" name="q3" value="3"></td>
                    <td><input type="radio" name="q3" value="2"></td>
                    <td><input type="radio" name="q3" value="1"></td>
                </tr>

            </tbody>
        </table>

        <button type="submit" class="submit-btn">Kirim Kuesioner</button>

    </div>

</div>

</form>

</body>
</html>