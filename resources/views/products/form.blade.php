@extends('layouts.app')

@section('title', isset($product) ? 'Edit Product' : 'Create Product')

@section('content')

<h2>{{ isset($product) ? 'Edit Product' : 'Create New Product' }}</h2>
<hr>

<form 
    action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" 
    method="POST">

    @csrf

    <div class="mb-3">
        <label class="form-label">Nama produk</label>
        <input type="text" name="name" class="form-control"
               value="{{ old('name', $product->name ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Harga</label>
        <input type="number" name="price" class="form-control"
               value="{{ old('price', $product->price ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="description" class="form-control" rows="4">{{ old('description', $product->description ?? '') }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama Gambar</label>
        <input type="text" name="image" class="form-control"
               value="{{ old('image', $product->image ?? '') }}">
        <small class="text-muted">
            Masukkan nama file gambar yang disimpan di folder <strong>/public/img/</strong>
            (contoh: <em>diffuser1.jpg</em>)
        </small>
    </div>

    @if(isset($product) && $product->image)
        <div class="mb-3">
            <label class="form-label">Gambar sebelumnya</label><br>
            <img src="{{ asset('img/' . $product->image) }}" width="200" class="border rounded">
        </div>
    @endif

    <hr>

    <button type="submit" class="btn btn-primary">
        {{ isset($product) ? 'Update Product' : 'Create Product' }}
    </button>

    <a href="{{ route('products') }}" class="btn btn-secondary">Back</a>
</form>

@endsection