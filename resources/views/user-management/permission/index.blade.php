@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="form-label" style="background-color: #f0f0f0; padding: 10px; border-radius: 5px;">List of Permissions</h2>
        <div>
            <a href="{{ route('home')}}" class="btn btn-outline-primary">Back Home</a>
            @can('role-edit')
            <a href="{{ route('permission.create')}}" class="btn btn-outline-secondary">Create New Permission</a>
            @endcan
        </div>
    </div>
    <!-- idk use this if wanna batch something -->
    <form method="" action="">
        <div class="mb-3">
            <button type="submit" class="btn btn-outline-danger">Batch Something</button>
        </div>
        <table class="table table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"><input type="checkbox" id="select-all"></th>
                    <th scope="col">Permission Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $perm)
                <tr>
                    <td scope="col">
                        <input type="checkbox" name="selected_ids[]" value="{{ $perm->id ??'' }}" class="checkbox-item">
                    </td>
                    <td scope="col">{{ $perm->name ?? 'NULL'}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </form>
</div>

<script>
    $('#select-all').on('change', function() {
        $('.checkbox-item').prop('checked', $(this).prop('checked'));
    });
</script>
@endsection
