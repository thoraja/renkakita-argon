@extends('layouts.app', ['title' => 'Order'])
@section('content')
    <div class="container mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="my-0">{{ __('Orders') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-flush">
                            <thead>
                                <tr>
                                    <th style="width: 1%">Order Number</th>
                                    <th>Status</th>
                                    <th style="width: 1%">Total Product</th>
                                    <th style="width: 1%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->order_number }}</td>
                                    <td>{{ $order->status->name }}</td>
                                    <td>{{ $order->details_count }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ route('order.order.show', $order) }}">{{ __('Details') }}</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('js/order/cart.js') }}"></script>
@endsection
