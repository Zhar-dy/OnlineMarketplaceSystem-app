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
                                @if ($payment->user->id === Auth::id() || Auth::user()->role == 'admin')
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $ }}</td>
                                    <td>{{ $payment->order_date }}</td>
                                    <td>{{ $payment->total_amount }}</td>

                                    <td>{{ $payment->status }}</td>

                                    <td>
                                        <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                            data-bs-target="#EditOrderModal-{{ $payment->id }}">{{ __('Edit Order') }}</button>
                                        @include('payment.edit')
                                    </td>

                                    @if (!$payment->payment || $payment->payment->payment_status != 'Paid')
                                        <td><button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#CreatePaymentModal-{{ $payment->id }}">{{ __('Pay') }}</button>
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
