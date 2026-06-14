<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PMB Polibatam</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
}

body {
    background: #f4f8ff;
    overflow-x: hidden;
}

header {
    width: 100%;
    background: white;
    padding: 18px 60px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: sticky;
    top: 0;
    z-index: 999;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
}

.logo img {
    width: 70px;
}

nav {
    display: flex;
    align-items: center;
    gap: 35px;
}

nav a {
    text-decoration: none;
    color: #222;
    font-weight: 600;
    transition: .3s;
}

nav a:hover {
    color: #ff9800;
}

.active {
    color: #ff9800;
}

.menu-item {
    position: relative;
    display: flex;
    align-items: center;
    height: 80px;
}

.mega-menu {
    position: absolute;
    top: 80px;
    left: 50%;
    transform: translateX(-60%);
    width: 1700px;
    background: #0d47a1;
    padding: 45px 55px;
    border-radius: 0 0 22px 22px;
    display: none;
    grid-template-columns: repeat(5, 1fr);
    align-items: flex-start;
    gap: 50px;
    z-index: 999;
    transition: .3s;
    box-shadow: 0 18px 35px rgba(0, 0, 0, 0.25);
}

.search-box {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 30px;
}

.search-box input {
    width: 450px;
    padding: 14px;
    border: none;
    border-radius: 10px;
    font-size: 15px;
}

.search-box button {
    padding: 14px 25px;
    border: none;
    border-radius: 10px;
    background: #1565c0;
    color: white;
    cursor: pointer;
}

.search-box button:hover {
    background: #0d47a1;
}

.menu-item:hover .mega-menu,
.mega-menu:hover {
    display: grid;
}

.mega-column h3 {
    color: white;
    margin-bottom: 22px;
    font-size: 24px;
    position: relative;
    padding-bottom: 12px;
}

.mega-column h3::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    width: 90px;
    height: 4px;
    background: #ff9800;
    border-radius: 10px;
}

.mega-column button {
    width: 100%;
    background: none;
    border: none;
    color: white;
    text-align: left;
    margin-bottom: 2px;
    cursor: pointer;
    font-size: 16px;
    transition: .3s;
    padding: 8px 0;
}

.mega-column button:hover {
    color: #ff9800;
    transform: translateX(5px);
}

.helpdesk-btn {
    background: #fb8c00;
    color: white;
    padding: 12px 22px;
    border-radius: 10px;
}

.helpdesk-btn:hover {
    background: #fb8c00;
    color: white;
}

.hero {
    width: 100%;
    min-height: 100vh;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 80px 70px;
    background: linear-gradient(135deg, #0d47a1, #1565c0);
    position: relative;
    overflow: hidden;
    color: white;
}

.hero::before {
    content: "";
    position: absolute;
    width: 700px;
    height: 700px;
    background: rgba(255, 255, 255, 0.08);
    border-radius: 50%;
    top: -250px;
    right: -150px;
    filter: blur(100px);
}

.hero::after {
    content: "";
    position: absolute;
    width: 500px;
    height: 500px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 50%;
    bottom: -200px;
    left: -100px;
    filter: blur(100px);
}

.hero-text {
    width: 50%;
    position: relative;
    z-index: 5;
}

.hero-text h1 {
    font-size: 68px;
    line-height: 1.2;
    margin-bottom: 25px;
}

.hero-text p {
    font-size: 20px;
    line-height: 1.9;
    margin-bottom: 40px;
    opacity: .95;
}

.hero-btn {
    display: inline-block;
    padding: 16px 34px;
    background: #ff9800;
    color: white;
    text-decoration: none;
    border-radius: 14px;
    font-weight: bold;
    transition: .3s;
    box-shadow: 0 10px 25px rgba(255, 152, 0, 0.35);
}

.hero-btn:hover {
    background: #fb8c00;
    transform: translateY(-4px);
}

.hero-image {
    width: 50%;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}

.hero-image::before {
    content: "";
    position: absolute;
    width: 1200px;
    height: 1200px;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.55) 0%, rgba(255, 255, 255, 0.25) 30%, rgba(255, 255, 255, 0.08) 55%, rgba(255, 255, 255, 0) 80%);
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 50%;
    filter: blur(140px);
    z-index: 1;
    animation: heroGlow 6s ease-in-out infinite;
}

.hero-image::after {
    content: "";
    position: absolute;
    top: -90px;
    width: 650px;
    height: 280px;
    background: linear-gradient(to bottom, rgba(255, 255, 255, 0.45), rgba(255, 255, 255, 0));
    filter: blur(90px);
    z-index: 2;
}

.hero-image img {
    width: 100%;
    max-width: 950px;
    position: relative;
    z-index: 3;
    animation: floatImage 5s ease-in-out infinite;
    transition: 1s;
    filter: drop-shadow(0 35px 45px rgba(0, 0, 0, 0.35));
}

.section {
    padding: 90px 70px;
}

.section-title {
    text-align: center;
    margin-bottom: 60px;
}

.section-title h2 {
    color: #0d47a1;
    font-size: 42px;
    margin-bottom: 15px;
}

.section-title p {
    color: #666;
    font-size: 18px;
}

.card-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 30px;
    align-items: stretch;
}

.card {
    background: white;
    padding: 35px;
    border-radius: 18px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    transition: .3s;
    display: flex;
    flex-direction: column;
    height: 100%;
    overflow: hidden;
}

.card:hover {
    transform: translateY(-8px);
}

.card h3 {
    color: #0d47a1;
    margin-bottom: 18px;
    font-size: 24px;
}

.card p {
    color: #555;
    line-height: 1.9;
}

.card .hero-btn {
    margin-top: auto;
    align-self: flex-start;
}

.faq-item {
    background: white;
    margin-bottom: 20px;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
}

.faq-question {
    width: 100%;
    padding: 22px;
    border: none;
    background: #1565c0;
    color: white;
    text-align: left;
    cursor: pointer;
    font-size: 17px;
}

.faq-answer {
    display: none;
    padding: 22px;
    line-height: 1.9;
}

footer {
    background: #0d47a1;
    color: white;
    padding: 70px 70px 30px;
}

.footer-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 40px;
}

.footer-box h3 {
    margin-bottom: 20px;
    font-size: 24px;
}

.footer-box p,
.footer-box a {
    line-height: 2;
    color: white;
    text-decoration: none;
}

.footer-box a:hover {
    color: #ff9800;
}

.footer-bottom {
    margin-top: 45px;
    padding-top: 20px;
    border-top: 1px solid rgba(255, 255, 255, 0.2);
    text-align: center;
}

.modal {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.modal-content {
    width: 90%;
    max-width: 700px;
    background: white;
    padding: 40px;
    border-radius: 20px;
    animation: popup .3s ease;
}

.modal-content h2 {
    color: #0d47a1;
    margin-bottom: 20px;
}

.modal-content p {
    line-height: 2;
    color: #555;
    margin-bottom: 25px;
}

.modal-content button {
    padding: 12px 24px;
    background: #0d47a1;
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;
}

@keyframes heroGlow {
    0% { transform: translate(-50%, -50%) scale(1); opacity: .8; }
    50% { transform: translate(-50%, -50%) scale(1.08); opacity: 1; }
    100% { transform: translate(-50%, -50%) scale(1); opacity: .8; }
}

@keyframes floatImage {
    0% { transform: translateY(0px) translateX(0px); }
    25% { transform: translateY(-10px) translateX(-10px); }
    50% { transform: translateY(-18px) translateX(10px); }
    75% { transform: translateY(-10px) translateX(-8px); }
    100% { transform: translateY(0px) translateX(0px); }
}

@keyframes popup {
    from { transform: scale(.8); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}

@media(max-width: 950px) {
    header { flex-direction: column; gap: 20px; }
    nav { flex-wrap: wrap; justify-content: center; }
    .hero { flex-direction: column; text-align: center; padding: 70px 30px; }
    .hero-text { width: 100%; margin-bottom: 50px; }
    .hero-image { width: 100%; }
    .hero-text h1 { font-size: 46px; }
    .hero-text p { font-size: 17px; }
    .hero-image img { max-width: 550px; }
    .mega-menu { width: 100%; left: 0; grid-template-columns: 1fr; }
}
</style>
</head>

<body>

@include('layouts.header')

<section class="hero">
    <div class="hero-text">
        <h1>Sistem Layanan Informasi dan Helpdesk</h1>
        <p>Membantu calon mahasiswa memperoleh informasi penerimaan mahasiswa baru secara cepat, mudah, dan modern.</p>
        <a href="/helpdesk" class="hero-btn">Helpdesk</a>
    </div>
    <div class="hero-image">
        <img id="heroSlider" src="{{ asset('images/hero1.png') }}">
    </div>
</section>

<form action="/" method="GET" class="search-box">
    <input type="text" name="search" placeholder="Cari program studi atau jalur pendaftaran..." value="{{ request('search') }}">
    <button type="submit">Cari</button>
</form>

<section class="section">
    <div class="section-title">
        <h2>Informasi Umum</h2>
    </div>
    <div class="card-container">
        @foreach($informasi as $item)
        <div class="card">
            <h3>{{ $item->judul }}</h3>
            <p>{{ \Illuminate\Support\Str::limit($item->deskripsi, 120) }}</p>
            <p style="font-size:13px;color:#777;margin-top:10px;">Upload: {{ $item->created_at->format('d M Y H:i') }}</p>
            <a href="/informasi/detail/{{ $item->id }}" class="hero-btn">Detail</a>
        </div>
        @endforeach
    </div>
</section>

@if(request('search'))
<section class="section">
    <div class="section-title">
        <h2>Hasil Pencarian</h2>
    </div>
    <div class="card-container">
        @foreach($searchProdis as $prodi)
        <div class="card">
            <h3>{{ $prodi->nama_prodi }}</h3>
            <p>Program Studi</p>
            <a href="/prodi/detail/{{ $prodi->id }}" class="hero-btn">Detail</a>
        </div>
        @endforeach
        @foreach($searchJalurs as $jalur)
        <div class="card">
            <h3>{{ $jalur->nama_jalur }}</h3>
            <p>Jalur Pendaftaran</p>
            <a href="/jalur/detail/{{ $jalur->id }}" class="hero-btn">Detail</a>
        </div>
        @endforeach
        @foreach($informasiSearch as $info)
        <div class="card">
            <h3>{{ $info->judul }}</h3>
            <p>Informasi PMB</p>
            <p style="font-size:13px;color:#777;margin-top:10px;">Upload: {{ $info->created_at->format('d M Y H:i') }}</p>
            <a href="/informasi/detail/{{ $info->id }}" class="hero-btn">Detail</a>
        </div>
        @endforeach
    </div>
</section>
@endif

<section class="section">
    <div class="section-title">
        <h2>Frequently Asked Questions</h2>
    </div>
    @foreach($faq as $item)
    <div class="faq-item">
        <button class="faq-question">{{ $item->pertanyaan }}</button>
        <div class="faq-answer"><p>{{ $item->jawaban }}</p></div>
    </div>
    @endforeach
</section>

<div class="modal" id="prodiModal">
    <div class="modal-content">
        <h2 id="prodiTitle">Nama Prodi</h2>
        <p id="prodiDesc">Deskripsi prodi</p>
        <button onclick="closeProdi()">Tutup</button>
    </div>
</div>

<script>
const questions = document.querySelectorAll(".faq-question");
questions.forEach(q => {
    q.addEventListener("click", () => {
        const answer = q.nextElementSibling;
        answer.style.display = answer.style.display === "block" ? "none" : "block";
    });
});

const heroImages = [
    "{{ asset('images/hero1.png') }}",
    "{{ asset('images/hero2.png') }}",
    "{{ asset('images/hero3.png') }}"
];
let currentImage = 0;
const heroSlider = document.getElementById("heroSlider");
setInterval(() => {
    currentImage++;
    if(currentImage >= heroImages.length) currentImage = 0;
    heroSlider.style.opacity = 0;
    setTimeout(() => {
        heroSlider.src = heroImages[currentImage];
        heroSlider.style.opacity = 1;
    }, 500);
}, 3000);

function showProdi(title, desc) {
    document.getElementById("prodiTitle").innerHTML = title;
    document.getElementById("prodiDesc").innerHTML = desc;
    document.getElementById("prodiModal").style.display = "flex";
}

function closeProdi() {
    document.getElementById("prodiModal").style.display = "none";
}
</script>

@include('layouts.footer')
</body>
</html>