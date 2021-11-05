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
                                    <th class="text-center">Qty</th>
                                    <th class="text-right">Price</th>
                                    <th class="text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total = 0;
                                @endphp
                                @foreach ($cart->items as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td class="text-center">{{ $item->pivot->quantity }}</td>
                                    <td class="text-right">{{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td class="text-right">{{ number_format($item->price * $item->pivot->quantity, 0, ',', '.') }}</td>
                                </tr>
                                @php
                                $total += $item->price * $item->pivot->quantity;
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
                    <div class="card-body">
                        <input type="text" name="note" class="form-control" placeholder="Order Notes" form="store">
                    </div>
                    <div class="card-footer py-4">
                        <div class="row justify-content-between">
                            <div class="col-12 col-lg-auto order-2 order-lg-1">
                                <a href="{{ route('order.cart.index') }}" class="btn btn-outline-primary btn-sm w-100"><x-icon size="20">chevron_left</x-icon>{{ __('Back to Cart') }}</a>
                            </div>
                            <div class="col-12 col-lg-auto order-1 order-lg-2 mb-1 mb-lg-0">
                                <form action="{{ route('order.order.store_cart_to_order') }}" method="post" id="store">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-sm w-100"><x-icon>check</x-icon>{{ __('Confirm Order') }}</a>
                                </form>
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
