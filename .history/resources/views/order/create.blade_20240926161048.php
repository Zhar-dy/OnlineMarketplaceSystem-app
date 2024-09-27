@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create an Order for {{$product->name}}</div>

                <div class="card-body">
                    {{-- <form method="POST" action="{{ route('category.product.store', $category) }}"> --}}
                        @csrf
                        <div class="mb-3">
                            <label class="col-form-label">Product Name</label>
                            <input type="text" class="form-control" value="{{$product->name}}" placeholder="Product Name" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label"> Quantity product to buy</label>
                            <input type="number" class="form-control" name="stock_quantity" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label"> Order Date</label>
                            <input type="date" class="form-control" name="order_date" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Status</label>
                            <input type="date" class="form-control" name="order_date" required>
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
