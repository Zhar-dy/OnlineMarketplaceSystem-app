@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header">Category of {{ $category->name }}</div>
                    <div class="card-body">
                        <a href="{{ route('home') }}" button type="button" class="btn btn-outline-danger">Back</button></a>
                        <a href="{{ route('category.product.create', $category) }}" button type="button"
                            class="btn btn-outline-primary">Add Product</a>
                        <form action="{{ route('product.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" class="form-control" required>
                            <button class="btn btn-success">
                                Import Product Data
                            </button>
                        </form>
                        @if ($products->isNotEmpty())
                            <a class="btn btn-warning" href="{{ route('product.export') }}">
                                Export Products Data
                            </a>
                        @endif
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Seller</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        @foreach ($products as $key => $product)
                            <tbody>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->user->name }}</td>
                                <td>RM{{ $product->price }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        @if ($product->seller_id == Auth::id() || Auth::user()->role == 'admin')
                                            <a href="{{ route('product.edit', $product) }}" type="button"
                                                class="btn btn-outline-dark">Edit</a>
                                            <form method="POST" action="{{ route('product.destroy', $product) }}">
                                                @csrf
                                                @method('DELETE')
                                                <div><button type="submit" class="btn btn-outline-danger">Delete</button>
                                                </div>
                                            </form>
                                        @endif
                                        @if ($product->seller_id != Auth::id() || Auth::user()->role == 'admin')
                                            <a href="{{ route('product.order.create', $product) }}"
                                                class="btn btn-outline-success">Buy</a>
                                        @endif
                                        <a href="{{ route('review.show', [$product, $category]) }}"
                                            class="btn btn-outline-dark">View Review</a>
                                    </div>
                                </td>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
