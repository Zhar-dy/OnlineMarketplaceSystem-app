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
                                    @foreach ( $categories as $key => $category)
                                    <tr>
                                        <th scope="row">{{ $key+1}}</th>
                                        <td>{{ $category->name}}</td>
                                        <td>{{ $category->description}}</td>
                                        {{-- <td>
                                            <a href="{{ asset('storage/category/'.$category->attachment) }}" target="_blank">{{ $category->attachment }}</a>
                                        </td> --}}
                                        <td>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-secondary active">
                                                  <input type="radio" name="options" id="" autocomplete="off" checked> Active
                                                </label>
                                                <label class="btn btn-secondary">
                                                  <input type="radio" name="options" id="" autocomplete="off"> Radio
                                                </label>
                                                <label class="btn btn-secondary">
                                                  <input type="radio" name="options" id="" autocomplete="off"> Radio
                                                </label>
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
