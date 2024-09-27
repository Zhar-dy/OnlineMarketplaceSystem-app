@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
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
    </div>
</div>
@endsection
