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
                                <th scope="col">Buyer Name</th>
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
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{$payment->order->user->name}}</td>
                                    <td>{{ $payment->order->product->name }}</td>
                                    <td>{{ $payment->payment_status }}</td>
                                    <td>{{ $payment->order->status }}</td>
                                    <td>
                                        <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                        data-bs-target="#CreateShippingModal--{{$payment->id}}">{{ __('Ship Now') }}</button>
                                    @include('order.edit')
                                        <a href="" class="btn btn-dark">SHIPPING STUFF</a>
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
