@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-2">
                <div class="card-header">Category of {{$category->name}}</div>
                    <div class="card-body">
                        <a href="{{route('home')}}" button type="button" class="btn btn-outline-danger">Back</button></a>
                        <a href="{{route('category.product.create', $category)}}" button type="button" class="btn btn-outline-primary">Add Product</button></a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Seller</th>
                                <th scope="col">Stock quantity</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        @foreach ($products as $key=>$product )
                        <tbody>
                            <td>{{$key + 1}}</td>
                            <td>{{$product->name}}</td>
                            
                        </tbody>
                        @endforeach
                    </table>
            </div>
        </div>
    </div>
</div>
@endsection
