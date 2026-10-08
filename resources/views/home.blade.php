@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <div class="mb-4">
        <h1 class="mb-2">Inventaris Perpustakaan</h1>
        <p class="text-muted mb-0">Catat kategori buku dan koleksi yang tersedia di perpustakaan fakultas.</p>
    </div>

    <div>
        <div class="menu-row">
            <div>
                <h2>Kategori</h2>
                <p>Kelola pengelompokan buku.</p>
            </div>
            <a href="{{ route('categories.index') }}" class="btn btn-accent">Buka</a>
        </div>
        <div class="menu-row">
            <div>
                <h2>Buku</h2>
                <p>Kelola data buku dan stoknya.</p>
            </div>
            <a href="{{ route('books.index') }}" class="btn btn-accent">Buka</a>
        </div>
    </div>
@endsection