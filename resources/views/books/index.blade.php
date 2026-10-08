@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <div class="page-head">
        <h1>Daftar Buku</h1>
        <a href="{{ route('books.create') }}" class="btn btn-accent">Tambah Buku</a>
    </div>

    <div class="panel">
        <div class="table-responsive">
            <table class="table align-middle data-table">
                <thead>
                    <tr>
                        <th style="width: 60px;">No</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th class="text-center">Tahun Terbit</th>
                        <th class="text-center">Stok</th>
                        <th>Kategori</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="fw-semibold">{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td class="text-center">{{ $book->published_year }}</td>
                            <td class="text-center">{{ $book->stock }}</td>
                            <td><span class="tag">{{ $book->category->name }}</span></td>
                            <td>
                                <a href="{{ route('books.edit', $book) }}" class="link-edit">Edit</a>
                                <span class="sep">|</span>
                                <form action="{{ route('books.destroy', $book) }}" method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="link-delete">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">Belum ada data buku.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection