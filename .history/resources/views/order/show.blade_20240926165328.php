@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header">Order from {{ Auth::user()->name }}</div>
                    <div class="card-body">
                        <a href="{{ route('home') }}" button type="button" class="btn btn-outline-danger">Back</button></a>
                       
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Seller</th>
                                <th scope="col">Stock quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        {{-- @foreach ($products as $key => $product)
                            <tbody>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->user->name }}</td>
                                <td>{{ $product->stock_quantity }}</td>
                                <td>RM{{ $product->price }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{route('product.edit', $product) }}" type="button"
                                        class="btn btn-dark">Edit</a>
                                        <form method="POST" action="{{ route('product.destroy',$product) }}">
                                            @csrf
                                            @method('DELETE')
                                            <div><button type="submit" class="btn btn-danger">Delete</button></div>
                                        </form>
                                        <a href="{{route('product.order.create',$product)}}" class="btn btn-success">Buy</a>
                                    </div>
                                </td>
                            </tbody>
                        @endforeach --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
