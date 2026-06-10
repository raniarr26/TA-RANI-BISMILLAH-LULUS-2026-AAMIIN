<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit FAQ</title>

<style>

body{
    font-family:'Segoe UI';
    background:#f4f8ff;
    padding:50px;
}

.container{
    background:white;
    max-width:600px;
    margin:auto;
    padding:30px;
    border-radius:10px;
}

input, textarea{
    width:100%;
    padding:12px;
    margin-bottom:15px;
    border:1px solid #ccc;
    border-radius:8px;
}

button{
    background:#1565c0;
    color:white;
    border:none;
    padding:12px 20px;
    border-radius:8px;
    cursor:pointer;
}

</style>
</head>

<body>

<div class="container">

    <h2>Edit FAQ</h2>

    <form action="/faq/update/{{ $faq->id }}" method="POST">

        @csrf
        @method('PUT')

        <input type="text"
               name="pertanyaan"
               value="{{ $faq->pertanyaan }}">

        <textarea name="jawaban">{{ $faq->jawaban }}</textarea>

        <button type="submit">
            Update FAQ
        </button>

    </form>

</div>

</body>
</html>