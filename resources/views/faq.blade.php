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
            background: #f4f8ff;
        }

        .title {
            text-align: center;
            margin: 60px 0 40px;
        }

        .title h1 {
            color: #0d47a1;
            font-size: 32px;
        }

        .wrapper {
            display: flex;
            gap: 40px;
            align-items: flex-start;
            padding: 40px 60px;
        }

        .visual {
            width: 40%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .visual img {
            width: 100%;
            max-width: 350px;
        }

        .faq-container {
            flex: 2;
            width: 700px;
            padding: 20px;
        }

        .faq-item {
            background: white;
            margin-bottom: 15px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
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
            line-height: 1.8;
        }

        @media(max-width: 950px) {
            .wrapper {
                flex-direction: column;
                padding: 30px;
            }
            .visual {
                width: 100%;
            }
            .faq-container {
                width: 100%;
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
        @foreach($faq as $item)
        <div class="faq-item">
            <button class="faq-question">{{ $item->pertanyaan }}</button>
            <div class="faq-answer">
                <p>{{ $item->jawaban }}</p>
            </div>
        </div>
        @endforeach
    </section>

    <div class="visual">
        <img src="{{ asset('images/faq-mahasiswa.png') }}">
    </div>
</section>

@include('layouts.footer')

<script>
    const questions = document.querySelectorAll(".faq-question");
    questions.forEach(q => {
        q.addEventListener("click", () => {
            const answer = q.nextElementSibling;
            answer.style.display = answer.style.display === "block" ? "none" : "block";
        });
    });
</script>

</body>
</html>