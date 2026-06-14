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
        vertical-align: middle;
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

    .status-pending {
        background: #fff3cd;
        color: #856404;
        padding: 5px 10px;
        border-radius: 6px;
        font-size: 12px;
        display: inline-block;
    }

    .status-dijawab {
        background: #d4edda;
        color: #155724;
        padding: 5px 10px;
        border-radius: 6px;
        font-size: 12px;
        display: inline-block;
    }

    .status-closed {
        background: #e0e0e0;
        color: #333;
        padding: 5px 10px;
        border-radius: 6px;
        font-size: 12px;
        display: inline-block;
    }

    .action-group {
        display: flex;
        gap: 8px;
        justify-content: center;
        align-items: center;
    }

    .btn-detail {
        background: #17a2b8;
        color: white;
        padding: 6px 12px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 12px;
        display: inline-block;
        border: none;
        cursor: pointer;
    }

    .btn-detail:hover {
        background: #138496;
    }
</style>

<div class="content">
    <h1>Kelola Pertanyaan Helpdesk</h1>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="left">{{ $item->nama }}</td>
                    <td class="left">{{ $item->email }}</td>
                    <td class="left">{{ $item->nohp }}</td>
                    <td class="left">{{ $item->kategori }}</td>
                    <td>
                        @if($item->status == 'Pending')
                            <span class="status-pending">Pending</span>
                        @elseif($item->status == 'Dijawab')
                            <span class="status-dijawab">Dijawab</span>
                        @elseif($item->status == 'Closed')
                            <span class="status-closed">Closed</span>
                        @endif
                    </td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    <td>{{ $item->created_at->format('H:i') }}</td>
                    <td>
                        <div class="action-group">
                            <a href="/admin/helpdesk/detail/{{ $item->id }}" class="btn-detail">
                                Detail
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="empty">📊 Belum ada pertanyaan helpdesk</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection