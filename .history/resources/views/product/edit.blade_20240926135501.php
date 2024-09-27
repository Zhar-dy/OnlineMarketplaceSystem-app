@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update {{$product->name}}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('product.update', $product) }}">
                        @csrf
                        <div class="mb-3">
                            <label class="col-form-label">Product Name</labe{{$product->name}}l>
                            <input type="text" class="form-control" name="name" placeholder="Product Name" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Description</label>
                            <textarea class="form-control" name="description" id="message-text" required autocomplet placeholder="Description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Price(RM)</label>
                            <input type="number" class="form-control" name="price" placeholder="Price" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Stock Quantity</label>
                            <input type="number" class="form-control" name="stock_quantity" placeholder="Stock Quantity" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-primary">Add</button>
                            <button type="reset" class="btn btn-outline-danger">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
