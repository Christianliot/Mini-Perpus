@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
    <div class="page-head">
        <h1>Tambah Buku</h1>
    </div>

    <div class="panel">
        <div class="panel-body">
            <form action="{{ route('books.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Judul Buku</label>
                    <input type="text" name="title" id="title"
                           class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title') }}">
                    @error('title')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Penulis</label>
                    <input type="text" name="author" id="author"
                           class="form-control @error('author') is-invalid @enderror"
                           value="{{ old('author') }}">
                    @error('author')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="published_year" class="form-label">Tahun Terbit</label>
                        <input type="text" name="published_year" id="published_year"
                               class="form-control @error('published_year') is-invalid @enderror"
                               value="{{ old('published_year') }}">
                        @error('published_year')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="stock" class="form-label">Stok</label>
                        <input type="text" name="stock" id="stock"
                               class="form-control @error('stock') is-invalid @enderror"
                               value="{{ old('stock') }}">
                        @error('stock')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select name="category_id" id="category_id"
                            class="form-select @error('category_id') is-invalid @enderror">
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-accent">Simpan</button>
                <a href="{{ route('books.index') }}" class="btn btn-plain">Batal</a>
            </form>
        </div>
    </div>
@endsection