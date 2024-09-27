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
                                    @foreach ( $cateogries as $key => $category)
                                    <tr>
                                        <th scope="row">{{ $key+1}}</th>
                                        <td>{{ $category->name}}</td>
                                        <td>{{ $category->description}}</td>
                                        <td>
                                            {{-- <a href="{{ asset('storage/category/'.$category->attachment) }}" target="_blank">{{ $category->attachment }}</a> --}}
                                        </td>
                                        @if ($category->status == "pending")
                                            <td>Pending</td>
                                            <td>
                                                {{-- <a href="{{ route('category.show', $category) }}" button type="button" class="btn btn-outline-danger">Show</button></a>
                                                <a href="{{ route('category.delete', $category) }}" button type="button" class="btn btn-outline-warning">Delete</button></a>
                                                <a href="{{ route('category.edit', $category) }}" button type="button" class="btn btn-outline-info">Edit</button></a> --}}
                                            </td>
                                            @else
                                                <td>Done</td>
                                                <td>
                                                    {{-- <a href="{{ route('category.show', $category) }}" button type="button" class="btn btn-outline-danger">Show</button></a>
                                                    <a href="{{ route('category.delete', $category) }}" button type="button" class="btn btn-outline-warning">Delete</button></a> --}}
                                                </td>
                                        @endif
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
