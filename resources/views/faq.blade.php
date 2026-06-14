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
            background: linear-gradient(135deg, #f4f8ff 0%, #e8f0fe 100%);
            min-height: 100vh;
        }

        .title {
            text-align: center;
            margin: 60px 0 40px;
            position: relative;
        }

        .title h1 {
            color: #0d47a1;
            font-size: 42px;
            font-weight: 700;
            position: relative;
            display: inline-block;
        }

        .title h1:after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, #1565c0, #42a5f5);
            border-radius: 2px;
        }

        .wrapper {
            display: flex;
            gap: 40px;
            align-items: flex-start;
            padding: 40px 60px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .visual {
            width: 40%;
            position: sticky;
            top: 100px;
        }

        .visual-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .visual-card:hover {
            transform: translateY(-5px);
        }

        .visual img {
            width: 100%;
            max-width: 280px;
            margin-bottom: 20px;
        }

        .visual h3 {
            color: #0d47a1;
            font-size: 24px;
            margin: 20px 0 10px;
        }

        .visual p {
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .stat-box {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid #e0e0e0;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 28px;
            font-weight: bold;
            color: #1565c0;
        }

        .stat-label {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
        }

        .contact-support {
            background: linear-gradient(135deg, #1565c0, #0d47a1);
            border-radius: 15px;
            padding: 20px;
            margin-top: 20px;
            color: white;
        }

        .contact-support h4 {
            margin-bottom: 10px;
            font-size: 18px;
        }

        .contact-support p {
            font-size: 14px;
            margin-bottom: 15px;
        }

        .contact-btn {
    display: inline-block;
    background: white;
    color: #0d47a1;
    border: none;
    padding: 12px 24px;
    border-radius: 30px;
    cursor: pointer;
    font-weight: bold;
    text-decoration: none;
    margin-top: 10px;
    transition: all 0.3s ease;
        }

        .contact-btn:hover {
            transform: scale(1.05);
            background: #e3f2fd;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .faq-container {
            flex: 2;
            width: 700px;
            padding: 20px;
        }

        .faq-item {
            background: white;
            margin-bottom: 15px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .faq-question {
            width: 100%;
            padding: 18px 20px;
            border: none;
            background: linear-gradient(135deg, #1565c0, #1976d2);
            color: white;
            font-size: 16px;
            font-weight: 500;
            text-align: left;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
        }

        .faq-question:hover {
            background: linear-gradient(135deg, #0d47a1, #1565c0);
        }

        .faq-question:after {
            content: '+';
            font-size: 24px;
            font-weight: bold;
            transition: transform 0.3s ease;
        }

        .faq-question.active:after {
            transform: rotate(45deg);
        }

        .faq-answer {
            display: none;
            padding: 20px;
            background: #f8f9fa;
            line-height: 1.8;
            color: #333;
            border-left: 4px solid #1565c0;
        }

        .search-box {
            margin-bottom: 30px;
            position: relative;
        }

        .search-box input {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 50px;
            font-size: 16px;
            transition: all 0.3s ease;
            outline: none;
        }

        .search-box input:focus {
            border-color: #1565c0;
            box-shadow: 0 0 0 3px rgba(21, 101, 192, 0.1);
        }

        .search-box input::placeholder {
            color: #999;
        }

        .faq-stats {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            padding: 15px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .stat-badge {
            background: #e3f2fd;
            color: #1565c0;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
        }

        @media(max-width: 950px) {
            .wrapper {
                flex-direction: column;
                padding: 30px;
            }
            .visual {
                width: 100%;
                position: static;
            }
            .faq-container {
                width: 100%;
            }
            .title h1 {
                font-size: 32px;
            }
        }
    </style>
</head>

<body>

@include('layouts.header')

<section class="title">
    <h1>Frequently Asked Questions (FAQ)</h1>
</section>

<section class="wrapper">
    <section class="faq-container">
        <div class="search-box">
            <input type="text" id="searchInput" placeholder="🔍 Cari pertanyaan...">
        </div>
        
        <div class="faq-stats" id="faqStats">
            <div class="stat-badge" id="totalFaq">Total: 0 FAQ</div>
            <div class="stat-badge" id="visibleFaq">Ditampilkan: 0</div>
        </div>
        
        <div id="faqList">
            @foreach($faq->reverse() as $item)
            <div class="faq-item" data-question="{{ strtolower($item->pertanyaan) }}" data-answer="{{ strtolower($item->jawaban) }}">
                <button class="faq-question">{{ $item->pertanyaan }}</button>
                <div class="faq-answer">
                    <p style="white-space: pre-line;">{{ $item->jawaban }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>
<div class="visual">
    <div class="visual-card">
        <img src="{{ asset('images/faq-mahasiswa.png') }}" alt="FAQ Illustration">
        <h3>Ada Pertanyaan Lain?</h3>

        <div class="contact-support">
            <h4>💬 Butuh Bantuan Langsung?</h4>
            <p>Hubungi kami langsung melalui Helpdesk</p>
            <a href="https://link-helpdesk-anda.com" target="_blank" class="contact-btn">
                🎫 Buka Helpdesk
            </a>
        </div>
    </div>
</div>
    
          
</section>

@include('layouts.footer')

<script>
    // FAQ toggle dengan animasi ikon
    const questions = document.querySelectorAll(".faq-question");
    questions.forEach(btn => {
        btn.addEventListener("click", () => {
            const answer = btn.nextElementSibling;
            const isActive = btn.classList.contains('active');
            
            // Tutup semua FAQ lainnya (opsional - untuk accordion style)
            questions.forEach(otherBtn => {
                if (otherBtn !== btn && otherBtn.classList.contains('active')) {
                    otherBtn.classList.remove('active');
                    otherBtn.nextElementSibling.style.display = "none";
                }
            });
            
            // Toggle yang diklik
            btn.classList.toggle('active');
            answer.style.display = isActive ? "none" : "block";
        });
    });
    
    // Update jumlah FAQ
    const faqItems = document.querySelectorAll('.faq-item');
    const faqCount = document.getElementById('faqCount');
    const totalFaqSpan = document.getElementById('totalFaq');
    const visibleFaqSpan = document.getElementById('visibleFaq');
    
    function updateStats() {
        const total = faqItems.length;
        const visible = Array.from(faqItems).filter(item => item.style.display !== 'none').length;
        
        if (faqCount) faqCount.textContent = total;
        if (totalFaqSpan) totalFaqSpan.textContent = `Total: ${total} FAQ`;
        if (visibleFaqSpan) visibleFaqSpan.textContent = `Ditampilkan: ${visible}`;
    }
    
    updateStats();
    
    // Fitur pencarian
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            
            faqItems.forEach(item => {
                const question = item.getAttribute('data-question') || '';
                const answer = item.getAttribute('data-answer') || '';
                
                if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
            
            updateStats();
        });
    }
    
    // Animasi counter untuk response time
    let count = 0;
    const responseTimeSpan = document.getElementById('responseTime');
    if (responseTimeSpan) {
        const interval = setInterval(() => {
            if (count < 5) {
                count++;
                responseTimeSpan.textContent = count;
            } else {
                clearInterval(interval);
            }
        }, 50);
    }
</script>

</body>
</html>