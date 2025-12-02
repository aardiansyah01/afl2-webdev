@extends('layouts.app')

@section('title', 'Product Details')

@section('content')

<h2 class="mb-4">Product Details</h2>

<div class="card p-4 shadow-sm">

    <div class="row">
        <div class="col-md-4">
            @if ($product->image)
                <img src="{{ asset('img/' . $product->image) }}" class="img-fluid rounded">
            @else
                <p class="text-muted">No image</p>
            @endif
        </div>

        <div class="col-md-8">
            <h3>{{ $product->name }}</h3>

            <p><strong>Color:</strong> {{ $product->color }}</p>
            <p><strong>Size:</strong> {{ $product->size }}</p>
            <p><strong>Kategori:</strong> {{ $product->category }}</p>

            <p><strong>Price:</strong>
                Rp {{ number_format($product->price, 0, ',', '.') }}
            </p>

            <p><strong>Description:</strong><br>
                {{ $product->description }}
            </p>

            <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back</a>
        </div>
    </div>

</div>

@endsection
