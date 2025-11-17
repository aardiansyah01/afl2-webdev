@extends('layouts.app')

@section('title', 'Product Detail')

@section('content')

<h2>Detail Produk</h2>
<hr>

<div class="card shadow-sm p-3">

    @if($product->image)
        <img src="{{ asset('img/' . $product->image) }}" 
             alt="{{ $product->name }}" 
             class="img-fluid mb-3 rounded"
             style="max-width: 350px;">
    @endif

    <h3>{{ $product->name }}</h3>

    <p class="text-muted">Kategori: {{ $product->category }}</p>

    <h4 class="text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</h4>

    <p>{{ $product->description }}</p>

    <hr>

    <a href="{{ route('products') }}" class="btn btn-secondary">Back</a>

    <a href="{{ route('products.edit', $product->id) }}" 
       class="btn btn-warning">Edit</a>

</div>

@endsection