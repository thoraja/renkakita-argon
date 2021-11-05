@extends('layouts.app', ['title' => 'Product'])
@section('styles')
<link rel="stylesheet" href="{{ asset('css/product/app.css') }}">
@endsection
@section('content')
<div class="container mt--7 mb-7">
    <form action="{{ route('product.product.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="mb-0">{{ __('New Product') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6 mb-3 mb-xl-0">
                                <div class="row">
                                    <div class="col">
                                        <h4>Product Information</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><x-icon>checkroom</x-icon></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="nameInput" name="name" placeholder="Product Name" value="{{ old('name') }}" required>
                                            </div>
                                            @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><x-icon>store</x-icon></span>
                                                </div>
                                                <select class="form-control" id="companyInput" name="company_id" required>
                                                    @foreach ($companies as $company)
                                                    <option value="{{ $company->id }}"{{ $company->id == old('company_id' ? ' selected' : '') }}>{{ $company->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('company_id')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><x-icon>category</x-icon></span>
                                                </div>
                                                <select class="form-control" id="categoryInput" name="category_id" required>
                                                    <option value="">-- {{ __('Select Category') }} --</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"{{ $category->id == old('category_id') ? ' selected' : '' }}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('category_id')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><x-icon>note</x-icon></span>
                                                </div>
                                                <select class="form-control" id="materialInput" name="material_id" required>
                                                    <option value="">-- {{ __('Select Material') }} --</option>
                                                    @foreach ($materials as $material)
                                                    <option value="{{ $material->id }}"{{ $material->id == old('material_id') ? ' selected' : '' }}>{{ $material->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('category_id')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input type="number" step="1" class="form-control" id="priceInput" name="price" placeholder="Price" oninput="this.value=this.value.replace(/[^\d]/,'')" value="{{ old('price') }}" required>
                                            </div>
                                            @error('price')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><x-icon>description</x-icon></span>
                                                </div>
                                                <textarea name="description" id="descriptionInput" class="form-control" required placeholder="Product Description">{{ old('description') }}</textarea>
                                            </div>
                                            @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <h4>Product Attributes <small class="text-muted">({{ __('Add additional attributes e.g size, weight, etc.') }})</small></h4>
                                    </div>
                                    <div class="col-auto float-right">
                                        <button id="add_attribute" type="button" class="btn btn-primary btn-sm"><x-icon size="20">add</x-icon></button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div id="new_attribute"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="row">
                                    <div class="col">
                                        <h4>Product Photos</h4>
                                    </div>
                                </div>
                                <div class="row mb-2" id="product_photo_thumbnails">
                                </div>
                                <div class="row">
                                    <div class="col mb-2">
                                        <div class="image-upload-wrap h-100">
                                            <input class="file-upload-input" type="file" accept="image/*" id="product_photo_input" title="Add Product Photo"/>
                                            <div class="drag-text my-5">
                                                <x-icon size="32">add</x-icon>
                                                <h3>{{ __('Add or drag photo here') }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary btn-sm">{{ __('Create') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/product/app.js') }}"></script>
@endsection
