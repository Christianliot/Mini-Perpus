<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    /**
     * Menampilkan daftar buku beserta kategorinya.
     * with('category') memuat relasi sekaligus agar tidak terjadi query berulang (N+1).
     */
    public function index(): View
    {
        $books = Book::with('category')->latest()->get();

        return view('books.index', compact('books'));
    }

    /**
     * Menampilkan form tambah buku. Daftar kategori diambil dari database.
     */
    public function create(): View
    {
        $categories = Category::orderBy('name')->get();

        return view('books.create', compact('categories'));
    }

    /**
     * Validasi dan simpan buku baru.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->rules(), $this->messages());

        Book::create($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Data buku berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit buku.
     */
    public function edit(Book $book): View
    {
        $categories = Category::orderBy('name')->get();

        return view('books.edit', compact('book', 'categories'));
    }

    /**
     * Validasi dan perbarui buku.
     */
    public function update(Request $request, Book $book): RedirectResponse
    {
        $validated = $request->validate($this->rules(), $this->messages());

        $book->update($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Data buku berhasil diperbarui.');
    }

    /**
     * Hapus buku.
     */
    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Data buku berhasil dihapus.');
    }

    /**
     * Aturan validasi yang dipakai bersama oleh store() dan update().
     */
    private function rules(): array
    {
        return [
            'title'          => ['required', 'max:255'],
            'author'         => ['required', 'max:100'],
            'published_year' => ['required', 'numeric', 'integer'],
            'stock'          => ['required', 'numeric', 'integer', 'min:0'],
            'category_id'    => ['required', 'exists:categories,id'],
        ];
    }

    /**
     * Pesan error validasi dalam bahasa Indonesia.
     */
    private function messages(): array
    {
        return [
            'title.required'          => 'Judul buku wajib diisi.',
            'title.max'               => 'Judul buku maksimal 255 karakter.',
            'author.required'         => 'Nama penulis wajib diisi.',
            'author.max'              => 'Nama penulis maksimal 100 karakter.',
            'published_year.required' => 'Tahun terbit wajib diisi.',
            'published_year.numeric'  => 'Tahun terbit harus berupa angka.',
            'published_year.integer'  => 'Tahun terbit harus berupa bilangan bulat.',
            'stock.required'          => 'Stok wajib diisi.',
            'stock.numeric'           => 'Stok harus berupa angka.',
            'stock.integer'           => 'Stok harus berupa bilangan bulat.',
            'stock.min'               => 'Stok tidak boleh kurang dari 0.',
            'category_id.required'    => 'Kategori wajib dipilih.',
            'category_id.exists'      => 'Kategori yang dipilih tidak valid.',
        ];
    }
}