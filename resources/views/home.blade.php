@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <div class="text-center mb-4">
        <h1 class="fw-bold">Mini-Perpus</h1>
        <p class="text-muted">Sistem Manajemen Inventaris Perpustakaan</p>
    </div>

    <div class="row justify-content-center g-4">
        <div class="col-md-5">
            <div class="card h-100 shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title">Manajemen Kategori</h5>
                    <p class="card-text text-muted">Kelola kategori buku perpustakaan.</p>
                    <a href="{{ route('categories.index') }}" class="btn btn-primary">Buka Kategori</a>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card h-100 shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title">Manajemen Buku</h5>
                    <p class="card-text text-muted">Kelola data buku dan stoknya.</p>
                    <a href="{{ route('books.index') }}" class="btn btn-primary">Buka Buku</a>
                </div>
            </div>
        </div>
    </div>
@endsection