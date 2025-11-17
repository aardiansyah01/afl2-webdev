@extends('layouts.app')

@section('title', 'Product List')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>List produk</h2>
    <a href="{{ route('products.create') }}" class="btn btn-primary">
        Tambahkan produk
    </a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th width="50">ID</th>
            <th width="120">Gambar</th>
            <th>Nama</th>
            <th width="150">Harga</th>
            <th width="200">Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>

            <td>
                @if ($product->image)
                    <img src="{{ asset('img/' . $product->image) }}" alt="Product Image"
                         width="100" class="rounded border">
                @else
                    <span class="text-muted">No image</span>
                @endif
            </td>

            <td>{{ $product->name }}</td>
            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>

            <td>
                <a href="{{ route('products.show', $product->id) }}" 
                   class="btn btn-sm btn-info">View</a>

                <a href="{{ route('products.edit', $product->id) }}" 
                   class="btn btn-sm btn-warning">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection