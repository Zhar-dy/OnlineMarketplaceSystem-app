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
                    <select name="status" class="form-select" aria-label="Default select example">
                        <option value="pending"  @selected($order->status == 'IT')>{{ __('Pending') }}</option>
                        <option value="shipped">{{ __('Shipped') }}</option>
                        <option value="delivered">{{ __('Delivered') }}</option>
                        <option value=c"anceled">{{ __('Cancel') }}</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create Category</button>
                </div>
            </div>
        </form>
    </div>
</div>
