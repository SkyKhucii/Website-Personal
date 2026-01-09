@extends('layouts.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Data Buku</span>
        <a href="{{ route('books.create') }}" class="btn btn-primary btn-sm">
            + Tambah Buku
        </a>
    </div>

    <div class="card-body">
        {{-- SEARCH --}}
        <form method="GET" action="{{ route('books.index') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control"
                       placeholder="Cari judul / penulis / tahun"
                       value="{{ request('search') }}">
                <button class="btn btn-outline-secondary">Cari</button>
            </div>
        </form>

        {{-- TABLE --}}
        <table class="table table-bordered align-middle">
            <thead class="table-light text-center">
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun</th>
                    <th>Kategori</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td class="text-center">{{ $book->year }}</td>
                    <td>{{ $book->category->name }}</td>
                    <td class="text-center">
                        <a href="{{ route('books.edit',$book->id) }}"
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('books.destroy',$book->id) }}"
                              method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Data buku tidak ditemukan
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{-- PAGINATION (Previous / Next saja) --}}
        <div class="mt-3 d-flex justify-content-center">
            {{ $books->onEachSide(0)->links('pagination::simple-bootstrap-5') }}
        </div>
    </div>
</div>

{{-- 🔽 BAGIAN BAWAH (STATISTIK) --}}
<div class="row">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center">
                <h6 class="text-muted">Total Buku</h6>
                <h2 class="fw-bold text-primary">{{ $totalBooks }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center">
                <h6 class="text-muted">Total Kategori</h6>
                <h2 class="fw-bold text-success">{{ $totalCategories }}</h2>
            </div>
        </div>
    </div>
</div>

@endsection
