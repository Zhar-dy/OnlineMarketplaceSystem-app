{{-- Create category Modal --}}
<div class="modal fade" id="EditOrderModal-{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('category.update',$order) }}" method="POST">
            @csrf
            @method('PUT')
            {{-- <input type="hidden" name="course_id" value="{{ $course->id }}"> --}}
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Edit Order</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <select name="role" class="form-select" aria-label="Default select example">
                        <option value="buyer" selected>{{ __('Buyer') }}</option>
                        <option value="seller">{{ __('Seller') }}</option>
                        <option value="admin">{{ __('Admin') }}</option>
                    </select><div class="mb-3">
                        <label for="message-text" class="col-form-label fw-bold">Category Description:</label>
                        <textarea class="form-control" name="description" id="message-text" required >{{$category->description}}</textarea>
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
