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
                                <th scope="col">Order Date</th>
                                <th scope="col">Total Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        @php
                            $key = 0;
                        @endphp
                        @foreach ($orders as $order)
                            <tbody>
                                @if ($order->user->id === Auth::id() || Auth::user()->role == 'admin')
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $order->product->name }}</td>
                                    <td>{{ $order->order_date }}</td>
                                    <td>{{ $order->total_amount }}</td>

                                    <td>{{ $order->status }}</td>

                                    <td>
                                        <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                            data-bs-target="#EditOrderModal-{{ $order->id }}">{{ __('Edit Order') }}</button>
                                        @include('order.edit')
                                    </td>


                                    @if ($order->payments->payment_status == 'p')
                                        <td><button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#CreatePaymentModal-{{ $order->id }}">{{ __('Pay') }}</button>
                                            @include('payment.create')</td>
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
