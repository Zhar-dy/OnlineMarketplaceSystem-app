@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                @can('category-create')
                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                    data-bs-target="#CreateCategoryModal">{{ __('Create Category') }}</button>
                @include('modal.category.create')
                @endcan
                <div class="card-body">
                    <a href="{{ route('order.index') }}" class="btn btn-info">View Orders</a>
                    <a href="{{ route('payment.index') }}" type="button" class="btn btn-primary">View Paid Order</a>
                    <div class="card mt-3">
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
                                        <img src="{{ asset('storage/category/' . $category->attachment) }}" style="width:150px; max-width:150px;" alt="{{ $category->attachment }}">
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
                                            <form method="POST"
                                                action="{{ route('category.destroy', $category) }}">
                                                @csrf
                                                @method('DELETE')
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
