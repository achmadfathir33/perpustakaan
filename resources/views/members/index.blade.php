@extends('layouts.app')

@section('title', 'Daftar Anggota - Perpustakaan Digital Kampus')

@section('content')
    <h1>Daftar Anggota</h1>

    <p>
        <a href="{{ route('members.create') }}" class="btn">+ Tambah Anggota</a>
    </p>

    <form action="{{ route('members.index') }}" method="GET">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama anggota...">
        <button type="submit" class="submit-btn">Cari</button>
        @if (request('search'))
            <a href="{{ route('members.index') }}">Reset</a>
        @endif
    </form>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($members as $member)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $member['id'] }}</td>
                    <td>{{ $member['nama'] }}</td>
                    <td>{{ $member['nim'] }}</td>
                    <td>{{ $member['email'] }}</td>
                    <td>{{ $member['nomor_telepon'] }}</td>
                    <td>{{ $member['alamat'] }}</td>
                    <td>{{ ucfirst($member['status']) }}</td>
                    <td>
                        <a href="{{ route('members.show', $member['id']) }}">Detail</a>
                        |
                        <a href="{{ route('members.edit', $member['id']) }}">Edit</a>
                        |
                        <form class="inline" action="{{ route('members.destroy', $member['id']) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">Belum ada data anggota.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $members->appends(request()->query())->links() }}
@endsection
