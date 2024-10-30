@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4>Create Role</h4>
                </div>
                <div class="card-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="roleName" class="form-label">Role Name</label>
                            <input type="text" id="roleName" name="name" class="form-control" placeholder="Enter role name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Permissions</label>
                            <div class="border p-3 rounded" style="max-height: 200px; overflow-y: auto;">
                                @foreach ($permission as $value)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="permissions[]" value="{{ $value->id }}" id="permission{{ $value->id }}">
                                        <label class="form-check-label" for="permission{{ $value->id }}">{{ $value->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ url('/home') }}" class="btn btn-secondary">Back to Home</a>
                            <button type="submit" class="btn btn-primary">Create Role</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
