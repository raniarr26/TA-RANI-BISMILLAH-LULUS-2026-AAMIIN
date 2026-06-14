<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>

About Us

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

/* HERO */

.hero{

height:80vh;

background:
linear-gradient(
rgba(13,71,161,.75),
rgba(13,71,161,.75)
),
url('{{ asset("images/bg-polibatam.jpg") }}');

background-size:cover;
background-position:center;

display:flex;

justify-content:center;

align-items:center;

text-align:center;

color:white;
}

.hero-content{

max-width:800px;

padding:20px;
}

.hero h1{

font-size:60px;

margin-bottom:15px;
}

.hero p{

font-size:22px;

line-height:1.8;
}

.hero-btn{

display:inline-block;

margin-top:30px;

padding:14px 28px;

background:#ff9800;

color:white;

text-decoration:none;

border-radius:10px;

font-weight:bold;
}

.hero-btn:hover{

background:#e68900;
}

/* SECTION */

.section{

max-width:1200px;

margin:auto;

padding:80px 30px;
}

.section-title{

text-align:center;

color:#0d47a1;

font-size:42px;

margin-bottom:50px;
}

/* ABOUT */

.about-container{

display:grid;

grid-template-columns:
1fr 1fr;

gap:50px;

align-items:center;
}

.about-image img{

width:100%;

border-radius:15px;

box-shadow:
0 10px 25px rgba(0,0,0,.15);
}

.about-text h3{

font-size:34px;

color:#1565c0;

margin-bottom:20px;
}

.about-text p{

font-size:18px;

line-height:2;

color:#555;
}

/* VISI MISI */

.vm-container{

display:grid;

grid-template-columns:
repeat(auto-fit,minmax(300px,1fr));

gap:30px;
}

.vm-card{

background:white;

padding:35px;

border-radius:15px;

box-shadow:
0 10px 25px rgba(0,0,0,.08);

transition:.3s;
}

.vm-card:hover{

transform:translateY(-5px);
}

.vm-card h3{

color:#1565c0;

font-size:30px;

margin-bottom:20px;

text-align:center;
}

.vm-card p{

line-height:2;

font-size:17px;

color:#555;
}

.vm-card ul{

padding-left:20px;
}

.vm-card li{

margin-bottom:12px;

line-height:1.8;

color:#555;
}

/* STATISTIK */

.stats-section{

background:#1565c0;

padding:80px 30px;

margin-top:30px;
}

.stats-title{

text-align:center;

color:white;

font-size:42px;

margin-bottom:50px;
}

.stats-container{

max-width:1200px;

margin:auto;

display:grid;

grid-template-columns:
repeat(auto-fit,minmax(220px,1fr));

gap:30px;
}

.stat-card{

background:white;

padding:35px;

border-radius:15px;

text-align:center;

box-shadow:
0 10px 25px rgba(0,0,0,.15);

transition:.3s;
}

.stat-card:hover{

transform:translateY(-8px);
}

.stat-number{

font-size:50px;

font-weight:bold;

color:#ff9800;

margin-bottom:10px;
}

.stat-label{

font-size:18px;

color:#555;
}


/* ALUR SISTEM */

.flow-container{

max-width:1400px;

margin:auto;

display:flex;

justify-content:center;

align-items:flex-start;

gap:15px;

flex-wrap:nowrap;
}


.flow-card{

background:white;

width:180px;

height:280px;

padding:25px 15px;

border-radius:15px;

text-align:center;

box-shadow:
0 10px 25px rgba(0,0,0,.08);

transition:.3s;

display:flex;

flex-direction:column;
}

.flow-title{

height:50px;

font-size:17px;

font-weight:bold;

color:#1565c0;

margin-bottom:10px;
}

.flow-desc{

height:100px;

font-size:14px;

line-height:1.7;

color:#555;
}

.flow-card:hover{

transform:translateY(-5px);
}

.flow-number{

width:55px;
height:55px;

background:#ff9800;

color:white;

border-radius:50%;

display:flex;

justify-content:center;

align-items:center;

margin:auto;

font-size:24px;

font-weight:bold;

margin-bottom:15px;
}

.flow-title{

font-size:17px;

font-weight:bold;

color:#1565c0;

margin-bottom:10px;
}

.flow-desc{

font-size:14px;

line-height:1.7;

color:#555;
}

.arrow{

font-size:28px;

color:#ff9800;

font-weight:bold;

margin-top:60px;
}


/* CTA HELPDESK */

.cta-section{

background:
linear-gradient(
135deg,
#1565c0,
#0d47a1
);

padding:90px 30px;

text-align:center;

color:white;

margin-top:50px;
}

.cta-section h2{

font-size:42px;

margin-bottom:20px;
}

.cta-section p{

font-size:20px;

line-height:1.8;

max-width:800px;

margin:auto;
}

.cta-btn{

display:inline-block;

margin-top:35px;

padding:15px 35px;

background:#ff9800;

color:white;

text-decoration:none;

border-radius:12px;

font-size:18px;

font-weight:bold;

transition:.3s;
}

.cta-btn:hover{

background:#e68900;

transform:translateY(-3px);
}

@media(max-width:900px){

    


.about-container{

grid-template-columns:1fr;

}

}

</style>

</head>

<body>

@include('layouts.header')

<section class="hero">

<div class="hero-content">

<h1>

About Us

</h1>

<p>

Pusat Layanan Informasi
Politeknik Negeri Batam

Satu Klik untuk Semua Informasi Polibatam

</p>

<a href="/"
class="hero-btn">

Jelajahi Informasi

</a>

</div>

</section>

<section class="section">

<h2 class="section-title">

Tentang Pusat Informasi Polibatam

</h2>

<div class="about-container">

<div class="about-image">

<img
src="{{ asset('images/Foto PI.jPEG') }}"
alt="Polibatam">

</div>

<div class="about-text">

<h3>

Apa itu Pusat Informasi Polibatam?

</h3>

<p>

Pusat Layanan Informasi Politeknik Negeri Batam
 adalah layanan yang berfungsi sebagai pusat
  penyedia informasi resmi terkait kegiatan,
   layanan, dan penerimaan mahasiswa baru di
    Politeknik Negeri Batam.

</p>

</div>

</div>

</section>

<section class="section">

<h2 class="section-title">

Visi, Misi & Moto

</h2>

<div class="vm-container">

<!-- VISI -->

<div class="vm-card">

<h3>

Visi

</h3>

<p>

Terwujudnya Pelayanan Prima Di Bidang Pendidikan, 
Kebudayaan, Ilmu Pengetahuan, dan Teknologi sebagai 
Langkah Utama Menuju Indonesia Maju.

</p>

</div>

<!-- MISI -->

<div class="vm-card">

<h3>

Misi

</h3>

<ul>

<li>
Memberikan pelayanan dengan tuntas sesuai peraturan perundag- undangan.
</li>

<li>
Meningkatkan profesional dan integritas sumber daya manusia untuk 
pelayanan publik yang berkualitas.
</li>

<li>
Menyelenggarakan layanan yang cepat, tepat, terjangkau dan 
transparan dengan memanfaatkan kemajuan teknologi informasi.
</li>

<li>
Meningkatkan kepercayaan masyarakat terhadap 
aparatur penyelenggara pelayanan publik.
</li>

</ul>

</div>

<!-- MOTO -->

<div class="vm-card">

<h3>

Moto

</h3>

<p style="
text-align:center;
font-size:22px;
font-weight:bold;
color:#ff9800;
">

"Mudah, Efektif, Ramah
Disiplin, Efisiensi,
Kolaboratif, dan Akuntabel 
dalam Melayani
(Meredeka Melayani)"

</p>

</div>

</div>

</section>



<section class="stats-section">

<h2 class="stats-title">

Statistik Sistem

</h2>

<div class="stats-container">

<!-- PRODI -->

<div class="stat-card">

<div class="stat-number">

24+

</div>

<div class="stat-label">

Program Studi

</div>

</div>

<!-- JALUR -->

<div class="stat-card">

<div class="stat-number">

3+

</div>

<div class="stat-label">

Jalur Pendaftaran

</div>

</div>

<!-- FITUR -->

<div class="stat-card">

<div class="stat-number">

8

</div>

<div class="stat-label">

Fitur Utama Sistem

</div>

</div>

<!-- HELPDESK -->

<div class="stat-card">

<div class="stat-number">

08.00-16.00

</div>

<div class="stat-label">

Layanan Helpdesk

</div>

</div>

</div>

</section>


<section class="section">

<h2 class="section-title">

Alur Penggunaan Sistem

</h2>

<div class="flow-container">

<!-- 1 -->

<div class="flow-card">

<div class="flow-number">
1
</div>

<div class="flow-title">
Informasi PMB
</div>

<div class="flow-desc">

Pengguna melihat informasi,
pengumuman.
</div>

</div>

<div class="arrow">→</div>

<!-- 2 -->

<div class="flow-card">

<div class="flow-number">
2
</div>

<div class="flow-title">
Program Studi
</div>

<div class="flow-desc">

Pengguna melihat informasi
mengenai program studi
yang tersedia.

</div>

</div>

<div class="arrow">→</div>

<!-- 3 -->

<div class="flow-card">

<div class="flow-number">
3
</div>

<div class="flow-title">
Jalur Pendaftaran
</div>

<div class="flow-desc">

Pengguna mempelajari
jalur pendaftaran yang
sesuai dengan kebutuhan.

</div>

</div>

<div class="arrow">→</div>

<!-- 4 -->

<div class="flow-card">

<div class="flow-number">
4
</div>

<div class="flow-title">
FAQ
</div>

<div class="flow-desc">

Melihat pertanyaan yang
sering diajukan beserta
jawabannya.

</div>

</div>

<div class="arrow">→</div>

<!-- 5 -->

<div class="flow-card">

<div class="flow-number">
5
</div>

<div class="flow-title">
Helpdesk
</div>

<div class="flow-desc">

Menghubungi admin apabila
masih memiliki pertanyaan
atau kendala.

</div>

</div>

<div class="arrow">→</div>

<!-- 6 -->

<div class="flow-card">

<div class="flow-number">
6
</div>

<div class="flow-title">
Kuesioner
</div>

<div class="flow-desc">

Memberikan penilaian dan
masukan terhadap layanan
yang telah digunakan.

</div>

</div>

</div>

</section>

<section class="cta-section">

<h2>

Masih Memiliki Pertanyaan?

</h2>

<p>

Tim Pusat Informasi PMB
Politeknik Negeri Batam siap membantu
Anda mendapatkan informasi yang
dibutuhkan melalui layanan Helpdesk.

</p>

<a
href="/helpdesk"
class="cta-btn">

Hubungi Helpdesk

</a>

</section>

@include('layouts.footer')

</body>

</html>
