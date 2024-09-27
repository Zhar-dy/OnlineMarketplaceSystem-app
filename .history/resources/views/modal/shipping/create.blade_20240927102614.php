{{-- Create category Modal --}}
<div class="modal fade" id="CreateShippingModal--{{$payment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <input type="hidden" name="shipping_status" value="{{ $payment->order->status }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Create Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label fw-bold">Seller Name:</label>
                        <input type="text" class="form-control" value="{{$payment->order->product->user->name}}" name="seller_name" id="recipient-name" readonly
                            autocomplete>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label fw-bold">Buyer Name</label>
                        <input type="text" class="form-control" value="{{$payment->order->user->name}}" name="buyer_name" id="recipient-name" readonly
                        autocomplete>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label fw-bold">Shipping Address</label>
                        <input type="text" class="form-control" value="{{$payment->order->user->address}}" name="shipping_address" id="recipient-name" readonly
                        autocomplete>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create Category</button>
                </div>
            </div>
        </form>
    </div>
</div>
