{{-- Create Category Form --}}
<div class="container mt-3">
    <h1 class="fw-bold">Create Category</h1>
    <form wire:submit.prevent="store" enctype="multipart/form-data">
        {{-- <input type="hidden" name="course_id" value="{{ $course->id }}"> --}}
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label fw-bold">Category Name:</label>
            <input type="text" class="form-control" wire:model="name" id="recipient-name" required autocomplete>
        </div>
        <div class="mb-3">
            <label for="message-text" class="col-form-label fw-bold">Category Description:</label>
            <textarea class="form-control" wire:model="description" id="message-text" required autocomplete></textarea>
        </div>
        <div class="mb-3">
            <label class="col-form-label">Attachment:</label>
            <input class="form-control" type="file" wire:model="attachment">
        </div>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-secondary me-2" onclick="window.history.back();">Cancel</button>
            <button type="submit" class="btn btn-primary">Create Category</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('categoryCreated', () => {
            // Optionally, you can handle the event after category creation here
            // e.g., show a success message, reset the form, etc.
        });
    });
</script>
