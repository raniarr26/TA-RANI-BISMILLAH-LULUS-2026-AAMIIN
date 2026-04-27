<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin - Kelola Kuesioner</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    display:flex;
    background:#f4f8ff;
}

/* ===== SIDEBAR ===== */
.sidebar{
    width:260px;
    height:100vh;
    background:#1f4fa3;
    color:white;
    padding-top:40px;
}

/* PROFILE */
.profile{
    text-align:center;
    margin-bottom:40px;
}

.profile img{
    width:70px;
    height:70px;
    border-radius:50%;
    background:white;
    margin-bottom:10px;
}

.profile p{
    font-size:18px;
}

/* MENU */
.menu a{
    display:block;
    padding:15px 30px;
    color:white;
    text-decoration:none;
    font-size:16px;
}

.menu a:hover{
    background:#1565c0;
}

/* ===== MAIN ===== */

.main{
    flex:1;
    padding:40px;
}

.main h1{
    margin-bottom:30px;
    color:#0d47a1;
}

/* BUTTON EXPORT */
.export-btn{
    margin-bottom:20px;
    padding:10px 20px;
    background:#1565c0;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
}

/* TABLE */
.table-container{
    background:white;
    padding:20px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#1565c0;
    color:white;
    padding:12px;
}

td{
    padding:10px;
    border:1px solid #ddd;
    text-align:center;
}

.left{
    text-align:left;
}
</style>
</head>

<body>

<!-- ===== SIDEBAR ===== -->
<div class="sidebar">

    <div class="profile">
        <img src="{{ asset('images/profile.png') }}">
        <p>Admin 1</p>
    </div>

    <div class="menu">
        <a href="/admin/dashboard">Dashboard</a>
        <a href="#">Kelola Informasi</a>
        <a href="#">Kelola FAQ</a>
        <a href="/admin/kuesioner">Kelola Kuesioner</a>
        <a href="#">Logout</a>
    </div>

</div>

<!-- ===== MAIN ===== -->

<div class="main">

    <h1>Data Responden</h1>

    <a href="/export-kuesioner">
        <button class="export-btn">Download Excel</button>
    </a>

    <div class="table-container">

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Sekolah</th>
                    <th>JK</th>
                    <th>Q1</th>
                    <th>Q2</th>
                    <th>Q3</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td class="left">Rania</td>
                    <td>rania@email.com</td>
                    <td>08123456789</td>
                    <td>SMA 1 Batam</td>
                    <td>P</td>
                    <td>Sangat Baik</td>
                    <td>Baik</td>
                    <td>Cukup</td>
                </tr>

                <tr>
                    <td>2</td>
                    <td class="left">Andi</td>
                    <td>andi@email.com</td>
                    <td>08129876543</td>
                    <td>SMK 2 Batam</td>
                    <td>L</td>
                    <td>Baik</td>
                    <td>Baik</td>
                    <td>Kurang</td>
                </tr>
            </tbody>
        </table>

    </div>

</div>

</body>
</html>