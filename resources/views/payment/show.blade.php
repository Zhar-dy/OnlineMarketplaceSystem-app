@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header">Show Payments</div>
                    <div class="card-body">
                        <a href="{{ route('home') }}" button type="button" class="btn btn-outline-danger">Back</a>
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
                                <a href="{{ route('payment.downloadPDF', $payment) }}" class="btn btn-outline-danger">Download PDF</a>
                                    @if($payment->order->status != 'Shipped')
                                        <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal"
                                        data-bs-target="#CreateShippingModal--{{$payment->id}}">{{ __('Ship Now') }}</button>
                                    @include('modal.shipping.create')
                                    @else
                                    <button type="button" class="btn btn-dark" disabled>{{ __('Shipped') }}</button>
                                    @endif
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
