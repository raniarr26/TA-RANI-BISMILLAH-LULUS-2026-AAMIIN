@extends('layouts.admin')

@section('content')

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', sans-serif;
    }

    .content {
        padding: 40px;
    }

    .content h1 {
        margin-bottom: 30px;
        color: #0d47a1;
        font-size: 34px;
    }

    .export-btn {
        margin-bottom: 20px;
        padding: 12px 22px;
        background: #1565c0;
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-size: 15px;
        transition: .3s;
    }

    .export-btn:hover {
        background: #0d47a1;
    }

    .table-container {
        background: white;
        padding: 25px;
        border-radius: 18px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        background: #1565c0;
        color: white;
        padding: 14px;
        text-align: center;
        font-size: 15px;
    }

    td {
        padding: 14px;
        border: 1px solid #eee;
        text-align: center;
        font-size: 14px;
    }

    tr:hover {
        background: #f4f8ff;
    }

    .left {
        text-align: left;
    }

    .empty {
        text-align: center;
        padding: 20px;
        color: #777;
    }
</style>

<div class="content">
    <h1>Data Responden Kuesioner</h1>

    <a href="/export-kuesioner">
        <button class="export-btn">📥 Download Excel</button>
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
                    <th>Tanggal Isi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="left">{{ $item->nama }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->nohp }}</td>
                    <td>{{ $item->sekolah }}</td>
                    <td>{{ $item->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td>{{ $item->q1 }}</td>
                    <td>{{ $item->q2 }}</td>
                    <td>{{ $item->q3 }}</td>
                    <td>{{ $item->created_at ? $item->created_at->format('d-m-Y H:i') : '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="empty">📊 Belum ada data responden</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection