@extends('layouts.app', ['title' => 'Order'])
@section('content')
    <div class="container mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="my-0">{{ __('Order Details') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-flush">
                            <thead>
                                <tr>
                                    <th style="width: 1%">#</th>
                                    <th style="width: 60%">Product</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total = 0;
                                @endphp
                                @foreach ($order->details as $detail)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $detail->name }}</td>
                                    <td>{{ $detail->pivot->quantity }}</td>
                                    <td class="text-right">{{ number_format($detail->price, 0, ',', '.') }}</td>
                                    <td class="text-right">{{ number_format($detail->price * $detail->pivot->quantity, 0, ',', '.') }}</td>
                                </tr>
                                @php
                                $total += $detail->price * $detail->pivot->quantity;
                                @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="table-primary">
                                    <th>#</th>
                                    <th colspan="3">Total</th>
                                    <th class="text-right">{{ number_format($total, 0, ',', '.') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <div class="row">
                            <div class="col">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('js/order/cart.js') }}"></script>
@endsection
