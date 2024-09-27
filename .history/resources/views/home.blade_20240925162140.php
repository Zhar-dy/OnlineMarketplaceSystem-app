@extends('layouts.app')

@section('content')
<div class="container">=
    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#CreateCategoryModal">{{ __('Create Category') }}</button>
    @include('modal.category.create')
    <div class="row justify-content-center">
        <div class="col-md-8">

            
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
