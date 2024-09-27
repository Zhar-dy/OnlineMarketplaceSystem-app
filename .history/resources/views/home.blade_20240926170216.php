@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                            data-bs-target="#CreateCategoryModal">{{ __('Create Category') }}</button>
                        @include('modal.category.create')
                        <a href="{{route('order.index')}}"class="btn btn-dark">hi</a>
                        <div class="card mt-3">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $category)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->description }}</td>
                                            {{-- <td>
                                            <a href="{{ asset('storage/category/'.$category->attachment) }}" target="_blank">{{ $category->attachment }}</a>
                                        </td> --}}
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('category.show', $category) }}" type="button"
                                                        class="btn btn-primary">Show</a>
                                                    <form method="POST" action="{{ route('category.destroy',$category) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div><button type="button" class="btn btn-danger">Delete</button></div>
                                                    </form>
                                                        <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                                            data-bs-target="#EditCategoryModal-{{ $category->id }}">{{ __('Edit') }}</button>
                                                        @include('modal.category.edit')
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
