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
                                        <th scope="col">Works Duration before</th>
                                        <th scope="col">Attachment</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $workspace as $key => $workspace)
                                    <tr>
                                        <th scope="row">{{ $key+1}}</th>
                                        <td>{{ $workspace->name}}</td>
                                        <td>{{ $workspace->datetime}}</td>
                                        <td>
                                            <a href="{{ asset('storage/workspace/'.$workspace->attachment) }}" target="_blank">{{ $workspace->attachment }}</a>
                                        </td>
                                        @if ($workspace->status == "pending")
                                            <td>Pending</td>
                                            <td>
                                                <a href="{{ route('workspace.show', $workspace) }}" button type="button" class="btn btn-outline-danger">Show</button></a>
                                                <a href="{{ route('workspace.delete', $workspace) }}" button type="button" class="btn btn-outline-warning">Delete</button></a>
                                                <a href="{{ route('workspace.edit', $workspace) }}" button type="button" class="btn btn-outline-info">Edit</button></a>
                                            </td>
                                            @else
                                                <td>Done</td>
                                                <td>
                                                    {{-- <a href="{{ route('workspace.show', $workspace) }}" button type="button" class="btn btn-outline-danger">Show</button></a>
                                                    <a href="{{ route('workspace.delete', $workspace) }}" button type="button" class="btn btn-outline-warning">Delete</button></a> --}}
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
