@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $product->name }}</h1>
    <p><strong>Description:</strong> {{ $product->description }}</p>
    <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
    <p><strong>Created At:</strong> {{ $product->created_at->format('d M Y') }}</p>
    <p><strong>Updated At:</strong> {{ $product->updated_at->format('d M Y') }}</p>


    <a href="{{ route('home') }}" class="btn btn-secondary">Back to Products</a>
</div>
@endsection
