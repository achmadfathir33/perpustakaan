@extends('layouts.app')

@section('title', 'Profil Pengguna')

@section('content')
<div class="container py-4">
    <h1 class="h4 mb-3">Profil Pengguna</h1>
    <div class="card">
        <div class="card-body">
            <p class="mb-2"><strong>Nama:</strong> {{ $user->name }}</p>
            <p class="mb-2"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="mb-0"><strong>Role:</strong> {{ $user->role ?? '-' }}</p>
        </div>
    </div>
</div>
@endsection