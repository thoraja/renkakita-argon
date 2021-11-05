@extends('layouts.app', ['title' => 'Order'])
@section('styles')
<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
@endsection
@section('content')
    <div class="container mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="my-0">{{ __('Shopping Cart') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($cart->items->count() > 0)
                        <ul class="list-group">
                            @foreach ($cart->items as $item)
                            <li class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-3 col-lg-2 col-xl-1 ">
                                        <img src="{{ asset($item->photos[0]->uri) }}" class="rounded-circle w-100" alt="">
                                    </div>
                                    <div class="col-9 col-lg-10 col-xl-11 d-flex">
                                        <div class="d-flex flex-column flex-lg-row w-100 mr-lg-3">
                                            <div class="order-1 w-100">
                                                <a href="{{ route('product.product.show', $item) }}">{{ $item->name }}</a>
                                            </div>
                                            <div class="order-3 order-lg-2 mr-4 mr-sm-5">
                                                <div class="input-group input-group-sm">
                                                    <button type="button" class="btn btn-outline-primary btn-minus btn-sm"><x-icon>remove</x-icon></button>
                                                    <input type="number" class="form-control text-center quantity-input" name="quantity[{{ $item->id }}]" form="cart" oninput="this.value=this.value.replace(/[^\d]/,'')" value="{{ $item->pivot->quantity }}" autocomplete="off" min="1" max="{{ $item->quantity_in_stock }}" data-price="{{ $item->price }}">
                                                    <button type="button" class="btn btn-outline-primary btn-plus btn-sm"><x-icon>add</x-icon></button>
                                                </div>
                                            </div>
                                            <div class="order-2 order-lg-3">
                                                <span class="font-weight-bold">Rp<span class="total-price">{{ number_format($item->price * $item->pivot->quantity, 0, ',', '.') }}</span></span>
                                            </div>
                                        </div>
                                        <div class="align-self-center ml-auto">
                                            <form action="{{ route('order.cart.remove', $item) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><x-icon>delete</x-icon></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @else
                        <div class="text-center">
                            <h2>{{ __('You have no product in your shopping cart.') }}</h2>
                            <a class="btn btn-outline-primary" href="{{ route('product.product.index') }}"><x-icon>shopping_cart</x-icon>{{ __('Products') }}</a>
                        </div>
                        @endif
                    </div>
                    <div class="card-footer py-4">
                        <div class="row justify-content-end">
                            @if ($cart->items->count() > 0)
                            <div class="col col-lg-auto">
                                <form action="{{ route('order.cart.checkout') }}" method="post" id="cart">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-primary w-100 btn-sm" form="cart"><x-icon>shopping_cart_checkout</x-icon>{{ __('Checkout') }}</button>
                                </form>
                            </div>
                            @endif
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
