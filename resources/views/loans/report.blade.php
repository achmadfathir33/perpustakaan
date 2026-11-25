@extends('layouts.app')

@section('title', 'Laporan Peminjaman')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 mb-0">Laporan Peminjaman</h1>
        <a href="{{ route('loans.index') }}" class="btn btn-secondary btn-sm">Kembali ke Daftar</a>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped align-middle mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Anggota</th>
                        <th>Petugas</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($loans as $index => $loan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ data_get($loan, 'member.nama', data_get($loan, 'member.name', '-')) }}</td>
                            <td>{{ data_get($loan, 'user.name', '-') }}</td>
                            <td>{{ data_get($loan, 'tanggal_pinjam', '-') }}</td>
                            <td>{{ data_get($loan, 'tanggal_kembali', '-') }}</td>
                            <td>{{ data_get($loan, 'status', '-') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada data laporan peminjaman.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if (!empty($meta))
        <div class="mt-3 text-muted small">
            Halaman {{ data_get($meta, 'current_page', 1) }} dari {{ data_get($meta, 'last_page', 1) }}
            (Total: {{ data_get($meta, 'total', count($loans)) }} data)
        </div>
    @endif
</div>
@endsection