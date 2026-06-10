<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

</head>

<body
style="
font-family:Segoe UI;
background:#f4f8ff;
padding:30px;
">

<div
style="
background:white;
padding:30px;
border-radius:15px;
max-width:700px;
margin:auto;
">

<h2
style="
color:#0d47a1;
margin-bottom:20px;
">

    Helpdesk Sudah Dijawab

</h2>

<p>

    Halo <b>{{ $data->nama }}</b>,

</p>

<p>

    Helpdesk kamu sudah dijawab admin PMB.

</p>

<p>

    Klik tombol berikut untuk melihat balasan:

</p>

<a href="{{ url('/helpdesk/detail/'.$data->id) }}"

style="
display:inline-block;
padding:14px 24px;
background:#1565c0;
color:white;
text-decoration:none;
border-radius:10px;
margin-top:20px;
">

    Lihat Balasan

</a>

</div>

</body>

</html>