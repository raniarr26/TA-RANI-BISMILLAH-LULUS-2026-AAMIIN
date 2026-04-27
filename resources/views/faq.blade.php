    <!DOCTYPE html>
    <html lang="id">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background-color: #f4f8ff;
        }

        /* ===== NAVBAR ===== */
        header {
            background-color: #0d47a1;
            padding: 0 60px;
            height: 80px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Logo */
        .logo img {
            height: 55px;
            width: auto;
        }

        /* Navigation */
        nav {
            display: flex;
            align-items: center;
        }

        nav a {
            text-decoration: none;
            color: white;
            margin-left: 30px;
            font-weight: 500;
            transition: 0.3s;
        }

        nav a:hover {
            color: #bbdefb;
        }

        .active {
            border-bottom: 2px solid white;
            padding-bottom: 4px;
        }

        /* Button Daftar */
        .btn-daftar {
            background-color: white;
            color: #0d47a1 !important;
            padding: 8px 18px;
            border-radius: 6px;
            font-weight: 600;
        }

        .btn-daftar:hover {
            background-color: #e3f2fd;
        }

        /* ===== TITLE ===== */
        .title {
            text-align: center;
            margin: 60px 0 40px;
        }

        .title h1 {
            color: #0d47a1;
            font-size: px;
        }
        /* ===== LAYOUT KIRI KANAN ===== */
         ..wrapper{
    display:flex;
    gap:40px;
    align-items:flex-start; /* biar sejajar atas */
    padding:40px 60px;
         }

         /* gambar kanan */
        .visual {
            width:40%;
            display:flex;
            align-items:center;
            justify-content:center;
        }
        .visual img {
            flex:1;
            width:100%;
            max-width:350px;
        }

        /* ===== FAQ ===== */

        .faq-container {
            flex: 2;
            width: 700px;
            padding: 20px;
        }

        .faq-item {
            background: white;
            margin-bottom: 15px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .faq-question {
            width: 100%;
            padding: 18px;
            border: none;
            background: #1565c0;
            color: white;
            font-size: 16px;
            text-align: left;
            cursor: pointer;
        }

        .faq-answer {
            display: none;
            padding: 15px;
            background: #f4f8ff;
        }


        
    </style>
    </head>
    <body>

    <header>
        <div class="logo">
            <img src="{{ asset('images/logo-polibatam.png') }}" alt="Logo">
        </div>

        <nav>
            <a href="#" class="active">Beranda</a>
            <a href="#">FAQ</a>
            <a href="#">Kuesioner</a>
            <a href="#" class="btn-daftar">Helpdesk</a>
        </nav>
    </header>

    <section class="title">
        <h1>Frequently Asked Questions (FAQ)</h1>
    </section>

    <section class="wrapper">

    <section class="faq-container">

        <div class="faq-item">
            <button class="faq-question">Apa saja syarat pendaftaran PMB?</button>
            <div class="faq-answer">
                <p>Syarat pendaftaran meliputi ijazah SMA/SMK, KTP, pas foto, dan mengisi formulir online.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">Berapa biaya pendaftaran?</button>
            <div class="faq-answer">
                <p>Biaya pendaftaran sebesar Rp250.000 dan dibayarkan melalui bank mitra.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">Bagaimana cara memilih jurusan?</button>
            <div class="faq-answer">
                <p>Kamu bisa memilih jurusan saat mengisi formulir pendaftaran online.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">Kapan pengumuman hasil seleksi?</button>
            <div class="faq-answer">
                <p>Pengumuman hasil seleksi akan diumumkan di website resmi PMB.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">Kapan pengumuman hasil seleksi?</button>
            <div class="faq-answer">
                <p>Pengumuman hasil seleksi akan diumumkan di website resmi PMB.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">Kapan pengumuman hasil seleksi?</button>
            <div class="faq-answer">
                <p>Pengumuman hasil seleksi akan diumumkan di website resmi PMB.</p>
            </div>
        </div>

    <!-- Gambar kanan -->
         <div class="visual">
        <img src="{{ asset('images/faq-mahasiswa.png') }}">
        </div>

    </section>
    </section>

    <script>
    const questions = document.querySelectorAll(".faq-question");

    questions.forEach(q => {
        q.addEventListener("click", () => {
            const answer = q.nextElementSibling;
            answer.style.display =
                answer.style.display === "block" ? "none" : "block";
        });
    });
    </script>

    </body>
    </html>

    </body>
    </html>
