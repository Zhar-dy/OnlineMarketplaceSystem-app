@extends('layouts.app')

@section('content')
    <div class="container">
        <button type="button" class="btn btn-dark" data-bs-toggle="modal"
            data-bs-target="#CreateCategoryModal">{{ __('Create Category') }}</button>
        @include('modal.category.create')
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($categories as $category)
                    <div class="card" style="margin-bottom: 25px;">
                        <div class="card-header" style="background-color: rgb(0 0 0 / 16%);">
                            <div class="card-title fw-bold">{{ $category->name }}
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                    data-bs-target="#EditCategoryModal-{{ $category->id }}">{{ __('Edit Category') }}</button>
                                @include('modal.category.edit')
                                <form action="{{ route('category.destroy', $category) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                </form>
                                <a href="#" class="btn btn-secondary">{{__('')}}
                            </div>
                        </div>

                        <div class="card-body">
                            sini isi info
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
