@extends('layouts.app', ['title' => 'Product Category'])

@section('content')
    <div class="container mt--7">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Categories') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('product.category.create') }}" class="btn btn-sm btn-primary"><x-icon>add</x-icon> {{ __('Add') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead>
                                <tr>
                                    <th style="width: 1%">#</th>
                                    <th>Name</th>
                                    <th>Product Total</th>
                                    <th style="width: 1%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a href="{{ route('product.category.show', $category) }}">{{ $category->products_count }} product{{ $category->products_count > 1 ? 's' : '' }}</a></td>
                                    <td>
                                        <div class="dropdown float-right">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="{{ route('product.category.edit', $category->id) }}">{{ __('Edit') }}</a>
                                                <a class="dropdown-item" href="{{ route('product.category.edit', $category->id) }}">{{ __('Delete') }}</a>
                                            </div>
                                        </div>
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
