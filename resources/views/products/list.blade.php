@extends('layouts.app')

@section('title', 'Product List')

@section('content')

<h2>Product List</h2>
<hr>

<div class="d-flex justify-content-between mb-3">

    {{-- Tombol Tambah Produk --}}
    <a href="{{ route('products.create') }}" class="btn btn-success">+ Tambah Produk</a>

    {{-- Filter Range Harga --}}
    <button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#filterRange">
        Filter Harga
    </button>

    {{-- Sorting --}}
    <form method="GET" class="d-flex">
        <select name="sort" class="form-select me-2">
            <option value="name"  {{ $sort == 'name' ? 'selected' : '' }}>Nama</option>
            <option value="price" {{ $sort == 'price' ? 'selected' : '' }}>Harga</option>
        </select>

        <select name="order" class="form-select me-2">
            <option value="asc"  {{ $order == 'asc' ? 'selected' : '' }}>A → Z / Termurah</option>
            <option value="desc" {{ $order == 'desc' ? 'selected' : '' }}>Z → A / Termahal</option>
        </select>

        <button type="submit" class="btn btn-dark">Urutkan</button>
    </form>

</div>

{{-- Filter Harga --}}
<div id="filterRange" class="collapse mb-3">

    <div class="card card-body">

        <form action="{{ route('products.index') }}" method="GET" class="row">

            <div class="col-md-4">
                <label>Harga Minimum</label>
                <input type="number" name="min_price" class="form-control"
                    value="{{ $min_price }}">
            </div>

            <div class="col-md-4">
                <label>Harga Maksimum</label>
                <input type="number" name="max_price" class="form-control"
                    value="{{ $max_price }}">
            </div>

            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Terapkan Filter</button>
            </div>

        </form>

    </div>
</div>

{{-- Tabel Produk --}}
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Warna</th>
            <th>Ukuran</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse($products as $p)
        <tr>
            <td>{{ $p->name }}</td>
            <td>Rp {{ number_format($p->price, 0, ',', '.') }}</td>
            <td>{{ $p->category }}</td>
            <td>{{ $p->color }}</td>
            <td>{{ $p->size }}</td>
            <td>
                @if($p->image)
                <img src="{{ asset('img/' . $p->image) }}" width="60">
                @endif
            </td>
            <td>
                <a href="{{ route('products.show', $p->id) }}" class="btn btn-info btn-sm">Detail</a>
                <a href="{{ route('products.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center">Tidak ada produk ditemukan</td>
        </tr>
        @endforelse
    </tbody>

</table>

@endsection
