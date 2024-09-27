{{-- Create category Modal --}}
<div class="modal fade" id="lessonModal-{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        {{-- <form action="{{ route('lesson.store', $course) }}" method="POST"> --}}
            @csrf
            {{-- <input type="hidden" name="course_id" value="{{ $course->id }}"> --}}
            <p>{{ $course->instructor_id }}</p>
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Create Categ</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label fw-bold">Lesson Name:</label>
                        <input type="text" class="form-control" name="title" id="recipient-name" required
                            autocomplete>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label fw-bold">Content of Lesson:</label>
                        <textarea class="form-control" name="content" id="message-text" required autocomplete></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <p>{{ $course->instructor_id }}</p>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create Lesson</button>
                </div>
            </div>
        </form>
    </div>
</div>
