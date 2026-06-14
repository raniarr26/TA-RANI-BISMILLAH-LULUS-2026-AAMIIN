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

.title{
    text-align:center;
    margin:40px 0 30px;
}

.title h1{
    color:#0d47a1;
}

.wrapper{
    display:flex;
    gap:30px;
    width:90%;
    margin:auto;
    align-items:flex-start;
}

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
    font-weight:600;
    color:#333;
}

input[type=text],
input[type=email],
select{
    width:100%;
    padding:10px;
    border:1px solid #ccc;
    border-radius:6px;
}

input.error, select.error{
    border-color:#d32f2f;
    background-color:#ffebee;
}

.error-text{
    color:#d32f2f;
    font-size:12px;
    margin-top:5px;
    display:block;
}

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

.submit-btn{
    margin-top:20px;
    padding:12px 30px;
    background:#1565c0;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
    transition:.3s;
}

.submit-btn:hover{
    background:#0d47a1;
}

.success{
    width:90%;
    margin:20px auto;
    background:#d4edda;
    color:#155724;
    padding:15px;
    border-radius:8px;
}

@media(max-width:900px){
    .wrapper{
        flex-direction:column;
    }
    .form-container,
    .table-container{
        width:100%;
    }
}
</style>
</head>

<body>

@include('layouts.header')

<section class="title">
    <h1>Kuesioner Layanan Penerimaan Mahasiswa Baru</h1>
</section>

@if(session('success'))
<div class="success">
    {{ session('success') }}
</div>
@endif

<form action="/kuesioner/store" method="POST" id="kuesionerForm">
@csrf

<div class="wrapper">
    <div class="form-container">
        <h3>Data Diri</h3>
        <br>

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" id="nama" required pattern="[A-Za-z\s]+" title="Nama hanya boleh huruf">
            <small class="error-text" id="namaError"></small>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" id="email" required>
            <small class="error-text" id="emailError"></small>
        </div>

        <div class="form-group">
            <label>No HP</label>
            <input type="text" name="nohp" id="nohp" required maxlength="15" title="Nomor HP hanya boleh angka">
            <small class="error-text" id="nohpError"></small>
        </div>

        <div class="form-group">
            <label>Asal Sekolah</label>
            <input type="text" name="sekolah" id="sekolah" required>
            <small class="error-text" id="sekolahError"></small>
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jk" id="jk" required>
                <option value="">-- Pilih --</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
            <small class="error-text" id="jkError"></small>
        </div>
    </div>

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
                    <td class="question-col">Bagaimana kualitas pelayanan informasi ?</td>
                    <td><input type="radio" name="q1" value="Sangat Baik" required></td>
                    <td><input type="radio" name="q1" value="Baik"></td>
                    <td><input type="radio" name="q1" value="Cukup"></td>
                    <td><input type="radio" name="q1" value="Kurang"></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td class="question-col">Apakah website mudah digunakan?</td>
                    <td><input type="radio" name="q2" value="Sangat Baik" required></td>
                    <td><input type="radio" name="q2" value="Baik"></td>
                    <td><input type="radio" name="q2" value="Cukup"></td>
                    <td><input type="radio" name="q2" value="Kurang"></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td class="question-col">Seberapa cepat respon layanan Helpdesk?</td>
                    <td><input type="radio" name="q3" value="Sangat Baik" required></td>
                    <td><input type="radio" name="q3" value="Baik"></td>
                    <td><input type="radio" name="q3" value="Cukup"></td>
                    <td><input type="radio" name="q3" value="Kurang"></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td class="question-col">Layanan informasi pada website memberikan jawaban yang relevan dengan pertanyaan?</td>
                    <td><input type="radio" name="q3" value="Sangat Baik" required></td>
                    <td><input type="radio" name="q3" value="Baik"></td>
                    <td><input type="radio" name="q3" value="Cukup"></td>
                    <td><input type="radio" name="q3" value="Kurang"></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td class="question-col">Informasi mengenai program studi dan jalur masuk yang tersedia sudah lengkap?</td>
                    <td><input type="radio" name="q3" value="Sangat Baik" required></td>
                    <td><input type="radio" name="q3" value="Baik"></td>
                    <td><input type="radio" name="q3" value="Cukup"></td>
                    <td><input type="radio" name="q3" value="Kurang"></td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="submit-btn">Kirim Kuesioner</button>
    </div>
</div>

</form>

@include('layouts.footer')

<script>
(function() {
    // ===== VALIDASI NAMA: hanya huruf dan spasi =====
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

    // ===== VALIDASI NOMOR HP: hanya angka =====
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

    // ===== VALIDASI EMAIL =====
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

    // ===== VALIDASI ASAL SEKOLAH: tidak boleh kosong =====
    const sekolahInput = document.getElementById('sekolah');
    const sekolahError = document.getElementById('sekolahError');

    sekolahInput.addEventListener('input', function() {
        if (this.value.trim() === '') {
            sekolahError.textContent = '❌ Asal sekolah tidak boleh kosong!';
            this.classList.add('error');
        } else {
            sekolahError.textContent = '';
            this.classList.remove('error');
        }
    });

    // ===== VALIDASI JENIS KELAMIN: tidak boleh kosong =====
    const jkSelect = document.getElementById('jk');
    const jkError = document.getElementById('jkError');

    jkSelect.addEventListener('change', function() {
        if (this.value === '') {
            jkError.textContent = '❌ Silakan pilih jenis kelamin!';
            this.classList.add('error');
        } else {
            jkError.textContent = '';
            this.classList.remove('error');
        }
    });

    // ===== VALIDASI RADIO BUTTON KUESIONER =====
    function validateRadios() {
        let allValid = true;
        for (let i = 1; i <= 3; i++) {
            const radios = document.getElementsByName('q' + i);
            let isChecked = false;
            for (let j = 0; j < radios.length; j++) {
                if (radios[j].checked) {
                    isChecked = true;
                    break;
                }
            }
            if (!isChecked) {
                allValid = false;
                alert('❌ Pertanyaan ' + i + ' wajib diisi!');
                return false;
            }
        }
        return true;
    }

    // ===== VALIDASI SEBELUM SUBMIT =====
    const form = document.getElementById('kuesionerForm');
    form.addEventListener('submit', function(e) {
        let isValid = true;

        // Validasi Nama
        const nama = namaInput.value.trim();
        if (nama === '' || !/^[A-Za-z\s]+$/.test(nama)) {
            namaError.textContent = '❌ Nama lengkap wajib diisi (hanya huruf dan spasi)!';
            namaInput.classList.add('error');
            isValid = false;
        }

        // Validasi Email
        const email = emailInput.value.trim();
        const emailPattern = /^[^\s@]+@([^\s@.,]+\.)+[^\s@.,]{2,}$/;
        if (email === '' || !emailPattern.test(email)) {
            emailError.textContent = '❌ Email wajib diisi dengan format yang valid!';
            emailInput.classList.add('error');
            isValid = false;
        }

        // Validasi No HP
        const nohp = nohpInput.value.trim();
        if (nohp === '' || !/^[0-9]+$/.test(nohp)) {
            nohpError.textContent = '❌ Nomor HP wajib diisi (hanya angka 0-9)!';
            nohpInput.classList.add('error');
            isValid = false;
        }

        // Validasi Asal Sekolah
        if (sekolahInput.value.trim() === '') {
            sekolahError.textContent = '❌ Asal sekolah tidak boleh kosong!';
            sekolahInput.classList.add('error');
            isValid = false;
        }

        // Validasi Jenis Kelamin
        if (jkSelect.value === '') {
            jkError.textContent = '❌ Silakan pilih jenis kelamin!';
            jkSelect.classList.add('error');
            isValid = false;
        }

        // Validasi Radio Kuesioner
        if (!validateRadios()) {
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