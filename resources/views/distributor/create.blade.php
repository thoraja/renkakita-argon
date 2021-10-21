@extends('layouts.app', ['title' => 'Distributor'])

@section('content')
<div class="container mt--7">
    <div class="row justify-content-center">
        <div class="col-sm-10 col-lg-8 col-xl-6">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="mb-0">New Distributor</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('distributor.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="email" class="form-control" id="emailInput" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                    </div>
                                    @error('email')
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
                                            <span class="input-group-text"><i class="fas fa-map-marked"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="areaInput" name="area" placeholder="Area" value="{{ old('area') }}" required>
                                    </div>
                                    @error('area')
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
                                            <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                        </div>
                                        <select name="role_id" id="roleSelect" class="form-control">
                                            @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('role_id')
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
