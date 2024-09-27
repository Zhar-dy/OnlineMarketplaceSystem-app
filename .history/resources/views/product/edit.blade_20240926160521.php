@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update {{$product->name}}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('product.update',$product]) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="col-form-label">Product Name</label>
                            <input type="text" class="form-control" value="{{$product->name}}" name="name" placeholder="Product Name" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Description</label>
                            <textarea class="form-control" name="description" id="message-text" required autocomplet placeholder="Description"> {{$product->description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Price(RM)</label>
                            <input type="number" class="form-control" name="price" value="{{$product->price}}" placeholder="Price" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-primary">Add</button>
                            <button type="reset" class="btn btn-outline-danger">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
