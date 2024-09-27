@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a Product Review of {{ $order->product->name }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('review.store') }}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $order->product->id }}">
                            <div class="mb-3">
                                <label class="col-form-label">Product Name</label>
                                <input type="text" class="form-control" value="{{ $order->product->name }}"
                                    name="name" placeholder="Product Name" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Rating</label>
                                <div>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-secondary active">
                                            <input type="radio" value="Bad" name="rating" id="option1"
                                                autocomplete="off" checked>
                                            Bad</label>
                                        <label class="btn btn-secondary">
                                            <input type="radio" value="Good" name="rating" id="option2"
                                                autocomplete="off"> Good
                                        </label>
                                        <label class="btn btn-secondary">
                                            <input type="radio" value="Great" name="rating" id="option3"
                                                autocomplete="off"> Great
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Comment</label>
                                <input type="text" class="form-control" name="comment" placeholder="Comment" required>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-primary">Add</button>
                                <a href="{{ route('order.index') }}" class="btn btn-outline-secondary">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
