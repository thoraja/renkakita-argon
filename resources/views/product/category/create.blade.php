@extends('layouts.app', ['title' => 'Product Category'])

@section('content')
<div class="container mt--7">
    <div class="row justify-content-center">
        <div class="col-sm-10 col-lg-8 col-xl-6">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="mb-0">{{ __('New Category') }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.category.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><x-icon>category</x-icon></span>
                                        </div>
                                        <input type="text" class="form-control" id="nameInput" name="name" placeholder="Category Name" value="{{ old('name') }}" required>
                                    </div>
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary btn-sm">{{ __('Create') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
