@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header">Review of Product</div>
                    <div class="card-body">
                        <a href="{{ route('category.show', $category) }}" button type="button"
                            class="btn btn-outline-danger">Back</button></a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Reviewer Name</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Review Time</th>
                                @if (Auth::user()->role == 'admin')
                                    <th scope="col">Action</th>
                                @endif
                            </tr>
                        </thead>
                        @php
                            $key = 0;
                        @endphp
                        @foreach ($reviews as $review)
                            @if ($review->product_id === $product->id)
                                <tbody>
                                    <td>{{ $key++ }}</td>
                                    <td>{{ $review->user->name }}</td>
                                    <td>{{ $review->product->name }}</td>
                                    <td>{{ $review->rating }}</td>
                                    <td>{{ $review->comment }}</td>
                                    <td>{{ $review->created_at }}</td>
                                    @if (Auth::user()->role == 'admin')
                                        <td>
                                            <form method="POST"
                                                action="{{ route('review.destroy', ['product' => $review->product, $review]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger">Delete</button>
                                            </form>
                                        </td>
                                    @endif
                                </tbody>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
