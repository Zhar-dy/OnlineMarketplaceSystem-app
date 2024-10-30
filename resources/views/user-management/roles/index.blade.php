@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Roles List</h4>
            <a href="{{ route('roles.create') }}" class="btn btn-light btn-sm text-primary">Add New Role</a>
        </div>
        <div class="card-body py-4">
            <!--begin::Table-->
            <div class="table-responsive">
                <table class="table table-row-dashed table-hover table-striped">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase">
                            <th class="min-w-50px">#</th>
                            <th class="min-w-150px text-left">Role</th>
                            <th class="min-w-150px text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                        @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="text-left">{{ $role->name }}</td>
                            <td class="text-left">
                                <div class="dropdown">
                                    <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('roles.show', $role->id) }}" class="dropdown-item">Show</a>
                                        </li>
                                            <li>
                                                <a href="{{ route('roles.edit', $role->id) }}" class="dropdown-item">Edit</a>
                                            </li>
                                            <li>
                                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this role?');" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger">Delete</button>
                                                </form>
                                            </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!--end::Table-->
        </div>
    </div>
</div>
@endsection
