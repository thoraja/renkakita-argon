@extends('layouts.app', ['title' => 'Product'])
@section('styles')
<link rel="stylesheet" href="{{ asset('css/product/app.css') }}">
@endsection
@section('content')
<div class="container mt--7 mb-7">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="mb-0">{{ __('Incoming Goods') }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.product.incoming_goods.store', $product->id) }}" method="post">
                        @csrf
                        @if ($errors->any())
                            {{ $errors }}
                        @endif
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><x-icon>event</x-icon></span>
                                        </div>
                                        <input class="form-control datepicker" placeholder="Select date" name="date" type="text" value="{{ date('d-m-Y') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="number" class="form-control" id="quantityInput" name="quantity" placeholder="Quantity" value="{{ old('quantity') }}" oninput="this.value=this.value.replace(/[^\d]/,'')" autocomplete="off" required>
                                    @error('quantity')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="noteInput" name="note" placeholder="Note" value="{{ old('note') }}" autocomplete="off" required>
                                    @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <h4>{{ __('Rejected') }}</h4>
                            </div>
                            <div class="col-auto float-right">
                                <button id="add_rejected" type="button" class="btn btn-danger btn-sm"><x-icon size="20">add</x-icon></button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div id="new_rejected"></div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary btn-sm">{{ __('Submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('argon/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script>
    $('.datepicker').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true,
});
</script>
<script src="{{ asset('js/product/app.js') }}"></script>
@endsection
