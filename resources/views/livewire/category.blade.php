<div class="card mt-3">
    <button wire:click="create()" type="button" class="btn btn-dark">{{ __('Create Category') }}</button>

    @if ($checkCreate)
        @include('livewire.category.create')
    @endif
    <input type="text" wire:model.live="search" class="form-control form-control-solid w-300px ps-13" placeholder="Search" />
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th>image</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $key => $category)
            <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $category->name }}</td>
                <td>
                    @if($category->attachment !== 'No attachment')
                    <img href="{{ Storage::url('category/' . $category->attachment) }}" target="_blank">
                    @else
                    <p>No attachment uploaded.</p>
                    @endif
                </td>
                <td>{{ $category->description }}</td>
                {{-- <td>
             <a href="{{ asset('storage/category/'.$category->attachment) }}" target="_blank">{{ $category->attachment }}</a>
                </td> --}}
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('category.show', $category) }}" type="button"
                            class="btn btn-primary">Show</a>
                        @can('category-delete')
                        <div><button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                        </form>
                        @endcan
                        @can('category-edit')
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                            data-bs-target="#EditCategoryModal-{{ $category->id }}">{{ __('Edit') }}</button>
                        @include('modal.category.edit')
                        @endcan
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
