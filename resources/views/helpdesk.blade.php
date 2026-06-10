<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helpdesk PMB</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: #f4f8ff;
        }

        .container {
            max-width: 1100px;
            margin: 70px auto;
            display: flex;
            gap: 40px;
            align-items: flex-start;
            padding: 20px;
        }

        .left {
            flex: 1;
        }

        .left h1 {
            color: #0d47a1;
            font-size: 100px;
            line-height: 1.3;
            margin-bottom: 20px;
        }

        .left p {
            color: #555;
            line-height: 1.8;
        }

        .card {
            flex: 2;
            background: white;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .card h2 {
            color: #0d47a1;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 13px;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 15px;
        }

        .form-group textarea {
            height: 150px;
            resize: none;
        }

        .submit-btn {
            width: 100%;
            padding: 14px;
            background: #1565c0;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: .3s;
        }

        .submit-btn:hover {
            background: #0d47a1;
        }

        .success {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .error-text {
            color: #d32f2f;
            font-size: 12px;
            margin-top: 5px;
            display: block;
        }

        input.error, select.error, textarea.error {
            border-color: #d32f2f;
            background-color: #ffebee;
        }
    </style>
</head>

<body>
    @include('layouts.header')

    <section class="container">
        <div class="left">
            <h1>Helpdesk PMB</h1>
            <p>
                Silakan kirim pertanyaan, kendala, atau keluhan terkait
                PMB Polibatam melalui form helpdesk berikut.
            </p>
        </div>

        <div class="card">
            <h2>Form Helpdesk</h2>

            @if(session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="/helpdesk/store" method="POST" enctype="multipart/form-data" id="helpdeskForm">
                @csrf

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" required pattern="[A-Za-z\s]+" title="Nama hanya boleh huruf">
                    <small class="error-text" id="namaError"></small>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" id="email" required>
                    <small class="error-text" id="emailError"></small>
                </div>

                <div class="form-group">
                    <label>Nomor HP</label>
                    <input type="text" name="nohp" id="nohp" required maxlength="15" title="Nomor HP hanya boleh angka">
                    <small class="error-text" id="nohpError"></small>
                </div>

                <div class="form-group">
                    <label>Subject / Kategori</label>
                    <select name="kategori" id="kategori" required>
                        <option value="">Pilih Subject</option>
                        <option value="Pendaftaran Akun">Pendaftaran Akun</option>
                        <option value="Pendaftaran Jalur">Pendaftaran Jalur</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    <small class="error-text" id="kategoriError"></small>
                </div>

                <div class="form-group">
                    <label>Keluhan / Pesan</label>
                    <textarea name="pesan" id="pesan" required></textarea>
                    <small class="error-text" id="pesanError"></small>

                    <label style="display: block; margin-top: 15px; margin-bottom: 8px; font-weight: 600;">
                        Lampiran Foto (Opsional)
                    </label>

                    <input type="file" name="foto" id="foto" accept=".jpg,.jpeg,.png,image/jpeg,image/png"
                        style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 8px; margin-bottom: 10px;">

                    <small style="color: #666;">Format: JPG, JPEG, PNG (Maks. 5 MB)</small>
                    <small class="error-text" id="fotoError"></small>
                </div>

                <button type="submit" class="submit-btn">Kirim Tiket</button>
            </form>
        </div>
    </section>

    @include('layouts.footer')

    <script>
        (function() {
            // Validasi Nama: hanya huruf dan spasi
            const namaInput = document.getElementById('nama');
            const namaError = document.getElementById('namaError');

            namaInput.addEventListener('input', function(e) {
                let value = this.value;
                let filtered = value.replace(/[^A-Za-z\s]/g, '');
                if (value !== filtered) {
                    this.value = filtered;
                    namaError.textContent = '❌ Nama hanya boleh mengandung huruf dan spasi!';
                    this.classList.add('error');
                } else {
                    namaError.textContent = '';
                    this.classList.remove('error');
                }
            });

            // Validasi Nomor HP: hanya angka
            const nohpInput = document.getElementById('nohp');
            const nohpError = document.getElementById('nohpError');

            nohpInput.addEventListener('input', function(e) {
                let value = this.value;
                let filtered = value.replace(/[^0-9]/g, '');
                if (value !== filtered) {
                    this.value = filtered;
                    nohpError.textContent = '❌ Nomor HP hanya boleh mengandung angka 0-9!';
                    this.classList.add('error');
                } else {
                    nohpError.textContent = '';
                    this.classList.remove('error');
                }
            });

            // Validasi Email: format email yang benar
            const emailInput = document.getElementById('email');
            const emailError = document.getElementById('emailError');

            emailInput.addEventListener('input', function(e) {
                const email = this.value;
                const emailPattern = /^[^\s@]+@([^\s@.,]+\.)+[^\s@.,]{2,}$/;
                if (email !== '' && !emailPattern.test(email)) {
                    emailError.textContent = '❌ Format email tidak valid! Contoh: nama@domain.com';
                    this.classList.add('error');
                } else {
                    emailError.textContent = '';
                    this.classList.remove('error');
                }
            });

            // Validasi Kategori: tidak boleh kosong
            const kategoriSelect = document.getElementById('kategori');
            const kategoriError = document.getElementById('kategoriError');

            kategoriSelect.addEventListener('change', function() {
                if (this.value === '') {
                    kategoriError.textContent = '❌ Silakan pilih subject/kategori!';
                    this.classList.add('error');
                } else {
                    kategoriError.textContent = '';
                    this.classList.remove('error');
                }
            });

            // Validasi Pesan: tidak boleh kosong
            const pesanTextarea = document.getElementById('pesan');
            const pesanError = document.getElementById('pesanError');

            pesanTextarea.addEventListener('input', function() {
                if (this.value.trim() === '') {
                    pesanError.textContent = '❌ Pesan/keluhan tidak boleh kosong!';
                    this.classList.add('error');
                } else {
                    pesanError.textContent = '';
                    this.classList.remove('error');
                }
            });

            // Validasi File Foto: ukuran dan tipe
            const fotoInput = document.getElementById('foto');
            const fotoError = document.getElementById('fotoError');

            fotoInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                    const maxSize = 5 * 1024 * 1024;

                    if (!allowedTypes.includes(file.type)) {
                        fotoError.textContent = '❌ Tipe file tidak diizinkan! Hanya JPG, JPEG, PNG.';
                        this.value = '';
                        this.classList.add('error');
                    } else if (file.size > maxSize) {
                        fotoError.textContent = '❌ Ukuran file terlalu besar! Maksimal 5 MB.';
                        this.value = '';
                        this.classList.add('error');
                    } else {
                        fotoError.textContent = '✓ File valid';
                        fotoError.style.color = '#2e7d32';
                        this.classList.remove('error');
                    }
                } else {
                    fotoError.textContent = '';
                    this.classList.remove('error');
                }
            });

            // Validasi sebelum submit
            const form = document.getElementById('helpdeskForm');
            form.addEventListener('submit', function(e) {
                let isValid = true;

                const nama = namaInput.value.trim();
                if (nama === '' || !/^[A-Za-z\s]+$/.test(nama)) {
                    namaError.textContent = '❌ Nama lengkap wajib diisi (hanya huruf dan spasi)!';
                    namaInput.classList.add('error');
                    isValid = false;
                }

                const nohp = nohpInput.value.trim();
                if (nohp === '' || !/^[0-9]+$/.test(nohp)) {
                    nohpError.textContent = '❌ Nomor HP wajib diisi (hanya angka 0-9)!';
                    nohpInput.classList.add('error');
                    isValid = false;
                }

                const email = emailInput.value.trim();
                const emailPattern = /^[^\s@]+@([^\s@.,]+\.)+[^\s@.,]{2,}$/;
                if (email === '' || !emailPattern.test(email)) {
                    emailError.textContent = '❌ Email wajib diisi dengan format yang valid!';
                    emailInput.classList.add('error');
                    isValid = false;
                }

                if (kategoriSelect.value === '') {
                    kategoriError.textContent = '❌ Silakan pilih subject/kategori!';
                    kategoriSelect.classList.add('error');
                    isValid = false;
                }

                if (pesanTextarea.value.trim() === '') {
                    pesanError.textContent = '❌ Pesan/keluhan tidak boleh kosong!';
                    pesanTextarea.classList.add('error');
                    isValid = false;
                }

                if (!isValid) {
                    e.preventDefault();
                    const firstError = document.querySelector('.error');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        firstError.focus();
                    }
                }
            });
        })();
    </script>
</body>

</html>