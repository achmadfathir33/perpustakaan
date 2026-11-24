@extends('layouts.app')

@section('title', 'Daftar Kategori - Perpustakaan Digital Kampus')

@section('content')
    <h1>Daftar Kategori</h1>

    <p>
        <a href="{{ route('categories.create') }}" class="btn">+ Tambah Kategori</a>
    </p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category['id'] }}</td>
                    <td>{{ $category['nama_kategori'] }}</td>
                    <td>{{ $category['deskripsi'] ?? '-' }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category['id']) }}">Edit</a>
                        |
                        <form class="inline" action="{{ route('categories.destroy', $category['id']) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada data kategori.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $categories->links() }}
@endsection