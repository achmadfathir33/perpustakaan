@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
<div class="container">
    <h1>Tambah Buku</h1>
    <p><a href="{{ route('books.index') }}">&larr; Kembali ke daftar buku</a></p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="margin: 0; padding-left: 1.25rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div class="form-group" style="margin-bottom: 1rem;">
            <label for="judul"><strong>Judul</strong></label><br>
            <input type="text" id="judul" name="judul" value="{{ old('judul') }}" class="form-control" required>
        </div>

        <div class="form-group" style="margin-bottom: 1rem;">
            <label for="penulis"><strong>Penulis</strong></label><br>
            <input type="text" id="penulis" name="penulis" value="{{ old('penulis') }}" class="form-control" required>
        </div>

        <div class="form-group" style="margin-bottom: 1rem;">
            <label for="penerbit"><strong>Penerbit</strong></label><br>
            <input type="text" id="penerbit" name="penerbit" value="{{ old('penerbit') }}" class="form-control" required>
        </div>

        <div class="form-group" style="margin-bottom: 1rem;">
            <label for="tahun_terbit"><strong>Tahun Terbit</strong></label><br>
            <input type="number" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit') }}" class="form-control" required>
        </div>

        <div class="form-group" style="margin-bottom: 1rem;">
            <label for="isbn"><strong>ISBN (opsional)</strong></label><br>
            <input type="text" id="isbn" name="isbn" value="{{ old('isbn') }}" class="form-control">
        </div>

        <div class="form-group" style="margin-bottom: 1rem;">
            <label for="stok"><strong>Stok</strong></label><br>
            <input type="number" id="stok" name="stok" value="{{ old('stok', 1) }}" min="0" class="form-control" required>
        </div>

        <div class="form-group" style="margin-bottom: 1rem;">
            <label for="category_id"><strong>Kategori</strong></label><br>
            <select id="category_id" name="category_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->nama ?? $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection