{{-- Create category Modal --}}
<div class="modal fade" id="EditCategoryModal-{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('category.update',$category) }}" method="POST">
            @csrf
            @method('PUT')
            {{-- <input type="hidden" name="course_id" value="{{ $course->id }}"> --}}
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Edit Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label fw-bold">Category Name:</label>
                        <input type="text" class="form-control" name="name" id="recipient-name" value="{{$category->name}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label fw-bold">Category Description:</label>
                        <textarea class="form-control" name="description" id="message-text" value="{{$category->description}}" required >{{$category->description}}</textarea>
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
