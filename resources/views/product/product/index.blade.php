@extends('layouts.app', ['title' => 'Product'])

@section('content')
    <div class="container mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Products') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                @can('create', App\Models\Product\Product::class)
                                <a href="{{ route('product.product.create') }}" class="btn btn-sm btn-primary"><x-icon class="align-middle" style="font-size: 16px">add</x-icon> </i> {{ __('Product') }}</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead>
                                <tr>
                                    <th style="width: 1%">#</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Category') }}</th>
                                    <th style="width: 1%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ route('product.product.show', $product->id) }}">{{ __('Show') }}</a>
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
