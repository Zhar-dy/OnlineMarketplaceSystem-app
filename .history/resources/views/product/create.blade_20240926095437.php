@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a Product from{{$category->name}}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('product.store', $category) }}">
                        @csrf
                        <div class="mb-3">
                            <label class="col-form-label">Product Name</label>
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
                        
                        {{-- <div class="mb-3">
                            <label class="col-form-label">Status:</label>
                            <input type="text" class="form-control" name="status" value="pending" placeholder="pending" readonly>
                        </div> --}}
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
