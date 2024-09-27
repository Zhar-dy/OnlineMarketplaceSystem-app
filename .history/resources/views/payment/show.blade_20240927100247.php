@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header">Order from {{ Auth::user()->name }}</div>
                    <div class="card-body">
                        <a href="{{ route('home') }}" button type="button" class="btn btn-outline-danger">Back</button></a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Order Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        @php
                            $key = 0;
                        @endphp
                        @foreach ($payments as $payment)
                            <tbody>
                                @if ($payment->order->product->seller_id == Auth::id() || Auth::user()->role == 'admin')
                                    <td>{{ $key $key+ 1 }}</td>
                                    <td>{{ $payment->order->product->name }}</td>
                                    <td>{{ $payment->payment_status }}</td>
                                    <td>{{ $payment->order->status }}</td>
                                    <td>{{ $payment->status }}</td>
                                    <td> <select name="payment_status" class="form-select"
                                            aria-label="Default select example">
                                            <option value="Completed" selected>{{ __('Completed') }}</option>
                                            <option value="Failed">{{ __('Failed') }}</option>
                                        </select>
                                    </td>
                            </tbody>
                        @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
