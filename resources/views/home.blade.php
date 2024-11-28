@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>


                <div class="card-body">
                    @if (!empty($orders))
                    <a href="{{ route('pie-show') }}" class="btn btn-secondary">View Orders Data</a>
                    @endif
                <a href="{{ route('roles.index') }}" class="btn btn-dark">View Role</a>
                    <a href="{{ route('order.index') }}" class="btn btn-info">View Orders</a>
                    <a href="{{ route('payment.index') }}" type="button" class="btn btn-primary">View Paid Order</a>
                    <livewire:category/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
