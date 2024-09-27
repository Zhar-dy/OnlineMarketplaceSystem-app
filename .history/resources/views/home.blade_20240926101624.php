@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8">
            <a href="{{route('item.create' )}}" type="button" class="btn btn-dark">{{__('Create')}}</a>
            <div class="card">
                <div class="card-header">{{__('Dashboard')}}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table">

                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Items</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->name}}</td>
                                <td><a href="{{route('item.edit', $item)}}" type="button"
                                        class="btn btn-info">{{__('Edit')}}</a>
                                    <form method="POST" action="{{route('item.destroy', $item)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">{{__('Delete')}}</button>
                                    </form>
                                    <a href="{{ route('item.show', $item)}}" class="btn btn-primary">{{__('Show')}}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ __('You are logged  in!') }}
                </div>
            </div>
        </div>












        <button type="button" class="btn btn-dark" data-bs-toggle="modal"
            data-bs-target="#CreateCategoryModal">{{ __('Create Category') }}</button>
        @include('modal.category.create')
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($categories as $category)
                    <div class="card" style="margin-bottom: 25px;">
                        <div class="card-header" style="background-color: rgb(0 0 0 / 16%);">
                            <div class="card-title fw-bold">{{ $category->name }}
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                    data-bs-target="#EditCategoryModal-{{ $category->id }}">{{ __('Edit Category') }}</button>
                                    @include('modal.category.edit')
                                    <form action="{{ route('category.destroy', $category) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                    </form>
                                    <a href="{{route('product.create')}}" class="btn btn-secondary">{{__('Create Product')}}</a>
                                  </div>
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
