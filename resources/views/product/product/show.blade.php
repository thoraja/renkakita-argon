@extends('layouts.app', ['title' => 'Product'])
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
    <div class="row mb-2">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4 mb-3 mb-xl-0">
                            <div class="row">
                                <div class="col">
                                    <div id="product_photos" class="carousel slide" style="background-color: #fafafa" data-ride="carousel">
                                        <div class="carousel-inner">
                                            @if (count($product->photos) > 0)
                                            <ol class="carousel-indicators">
                                                @foreach ($product->photos as $photo)
                                                <li data-target="#product_photos" data-slide-to="{{ $loop->index }}" {{ $loop->index == 0 ? 'class="active"' : '' }}></li>
                                                @endforeach
                                            </ol>
                                            @foreach ($product->photos as $photo)
                                            <div class="carousel-item{{ $loop->index == 0 ? ' active' : '' }}">
                                                <img class="d-block mx-auto w-100" style="object-fit: contain; object-position: center top; max-height: 400px" src="{{ asset($photo->uri) }}" alt="Product Photo">
                                            </div>
                                            @endforeach
                                            @else
                                            <div class="carousel-item active">
                                                <img class="d-block mx-auto w-100" style="object-fit: contain; max-height: 500px" src="{{ asset('images/no-images-available.jpg') }}" alt="No Images Available">
                                            </div>
                                            @endif
                                        </div>
                                        <a class="carousel-control-prev" href="#product_photos" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#product_photos" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5">
                            <div class="row">
                                <div class="col">
                                    <div>
                                        <span class="text-muted">{{ $product->category->name }}</span>
                                    </div>
                                    <h1>{{ $product->name }}</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    @foreach ($product->attributes as $attribute)
                                    <span class="d-block"><span class="text-muted">{{ $attribute->name }}: </span>{{ $attribute->value }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <span class="d-block text-muted">{{ __('Description') }}:</span>
                                    <span>{{ $product->description }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <hr class="my-2 d-block d-xl-none">
                            <div class="row">
                                <div class="col">
                                    <span class="h4">{{ __('Place Order') }}</span>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col">
                                    <span class="text-muted">{{ __('Price') }}: </span>
                                    <span class="font-weight-bold">Rp</span><span class="h2">{{ number_format($product->price, 0, ',', '.') }}</span>
                                </div>
                            </div>
                            @if ($product->quantity_in_stock > 0)
                            <div class="row mb-1">
                                <div class="col-6 col-xl-12 mb-xl-1">
                                    <form method="post" id="productQuantityForm">
                                        @csrf
                                        <div class="input-group input-group-sm">
                                            <button type="button" class="btn btn-outline-primary btn-minus btn-sm"><x-icon>remove</x-icon></button>
                                            <input type="number" class="form-control text-center" name="quantity" id="quantityInput" oninput="this.value=this.value.replace(/[^\d]/,'')" value="1" autocomplete="off" min="1" max="{{ $product->quantity_in_stock }}">
                                            <button type="button" class="btn btn-outline-primary btn-plus btn-sm"><x-icon>add</x-icon></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-6 col-xl-12">
                                    <span class="align-middle"><span class="text-muted">{{ __('Stock') }}:</span> {{ $product->quantity_in_stock }}</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-6 col-xl-12 mb-2 mb-sm-0 mb-xl-2">
                                    <button type="submit" class="btn btn-primary btn-sm w-100" form="productQuantityForm" formaction="{{ route('order.cart.add', $product) }}"><x-icon>add_shopping_cart</x-icon> {{ __('Add to Cart') }}</button>
                                </div>
                                <div class="col-sm-6 col-xl-12">
                                    {{-- <button class="btn btn-outline-primary btn-sm w-100"><x-icon>shopping_bag</x-icon> {{ __('Buy') }}</button> --}}
                                </div>
                            </div>
                            @else
                            <div class="row mb-2">
                                <div class="col">
                                    <span class="align-middle"><span class="text-muted">{{ __('Out of Stock') }}</span></span>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @can('update', $product)
                <div class="card-footer">
                    <div class="row mb-2">
                        <div class="col-auto ml-auto">
                            <a class="btn btn-primary btn-sm" href="{{ route('product.product.incoming_goods', $product->id) }}"><x-icon>add</x-icon> {{ __('Incoming Goods') }}</a>
                            <a class="btn btn-warning btn-sm" href="#"><x-icon>edit</x-icon> {{ __('Edit') }}</a>
                        </div>
                    </div>
                </div>
                @endcan
            </div>
        </div>
    </div>
    @can('perform-administrative')
    <div class="row mb-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="mb-0">{{ __('Product Flows') }}</h3>
                </div>
                <div class="table-responsive border-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Type') }}</th>
                                <th>{{ __('Note') }}</th>
                                <th>{{ __('Qty') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product->flows->sortBy('date') as $flow)
                            @switch($flow->type->id)
                                @case(\App\Models\Product\FlowType::RECEIVED)
                                    <tr class="table-primary">
                                    @break
                                @case(\App\Models\Product\FlowType::REJECTED)
                                    <tr class="table-danger">
                                    @break
                                @case(\App\Models\Product\FlowType::SOLD)
                                    <tr class="table-success">
                                @break
                                @default
                                    <tr>
                            @endswitch
                                <td>{{ $flow->date }}</td>
                                <td>{{ $flow->type->name }}</td>
                                <td>{{ $flow->note }}</td>
                                <td>{{ $flow->quantity }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endcan
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/product/app.js') }}"></script>
@endsection
