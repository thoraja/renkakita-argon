@extends('layouts.app', ['title' => 'User'])

@section('content')
<div class="container mt--7">
    <div class="row justify-content-center">
        <div class="col-sm-10 col-lg-8 col-xl-6">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="mb-0">{{ __('New User') }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.update', $user) }}" method="post">
                        @csrf
                        @method('put')
                        @if ($errors->any())
                        {{ $errors }}
                        @endif
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="nameInput" name="name" placeholder="Name" value="{{ $user->name }}" required>
                                    </div>
                                    @error('name')
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
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control" id="emailInput" name="email" placeholder="Email" value="{{ $user->email }}" required>
                                    </div>
                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <label for="passwordInput">{{ __('Password') }}</label>
                        <small class="text-muted">(Leave it blank if you're not willing to change password)</small>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Password" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="password" class="form-control" id="passwordConfirmationInput" name="password_confirmation" placeholder="Confirm Password" required>
                                    </div>
                                    @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <label for="roleSelect">{{ __('Role') }}</label>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" name="role_id" id="roleSelect" class="form-control" value="{{ $user->role->display_name }}" disabled>
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
