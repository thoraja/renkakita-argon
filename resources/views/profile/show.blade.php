@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    <div class="container mt--7">
        <div class="row">
            <div class="col-xl-4 mb-3 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <x-application-logo class="w-75 "></x-application-logo>
                        </div>
                        <div class="text-center">
                            <div class="h3">
                                {{ $user->name }}
                            </div>
                            <div class="h5 font-weight-300">
                                <span>{{ $user->email }}</span>
                            </div>
                            <div class="h5">
                                <i class="fas fa-user-tag mr-1"></i>{{ $user->role->display_name }}
                            </div>
                        </div>
                        <hr class="my-3">
                        <div class="row">
                            <div class="col">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link my-1{{ session('status.profile') || count($errors->profile) > 0 || !session('status') ||  count(session('status')) < 1 && count($errors->getBags()) < 1 ? ' active' : '' }}" id="edit-profile-tab" data-toggle="pill" href="#edit-profile" role="tab" aria-controls="edit-profile" aria-selected="true">Profile</a>
                                    <a class="nav-link my-1{{ session('status.password') || count($errors->password) > 0 ? ' active' : '' }}" id="edit-password-tab" data-toggle="pill" href="#edit-password" role="tab" aria-controls="edit-password" aria-selected="false">Password</a>
                                    @if (in_array($user->role_id, \App\Models\User\Role::DISTRIBUTORS))
                                    <a class="nav-link my-1{{ session('status.distributor') || count($errors->distributor) > 0 ? ' active' : '' }}" id="edit-distributor-tab" data-toggle="pill" href="#edit-distributor" role="tab" aria-controls="edit-distributor" aria-selected="false">Distributor @if(!$user->distributor->is_verified) <span class="badge badge-warning float-right"><i class="fas fa-exclamation-circle    "></i></span>@endif</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card bg-secondary shadow">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade{{ session('status.profile') || count($errors->profile) > 0 || !session('status') || session('status') && count(session('status')) < 1 && $errors->isEmpty() && count($errors->getBags()) < 1 ? ' show active' : '' }}" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
                            <div class="card-header bg-white border-0">
                                <h3 class="mb-0">{{ __('Edit Profile') }}</h3>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('profile.edit-profile') }}" autocomplete="off">
                                    @csrf
                                    @method('put')
                                    @if (session('status.profile'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('status.profile') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif

                                    <div class="form-group{{ $errors->profile->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                        <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->profile->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $user->name) }}" required autofocus>

                                        @if ($errors->profile->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->profile->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->profile->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                        <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->profile->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}" required>

                                        @if ($errors->profile->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->profile->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade{{ session('status.password') || count($errors->password) > 0 ? ' show active' : '' }}" id="edit-password" role="tabpanel" aria-labelledby="edit-password-tab">
                            <div class="card-header bg-white border-0">
                                <h3 class="mb-0">{{ __('Edit Password') }}</h3>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('profile.edit-password') }}" autocomplete="off">
                                    @csrf
                                    @method('put')

                                    @if (session('status.password'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('status.password') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif

                                    <div class="form-group{{ $errors->password->has('old_password') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-current-password">{{ __('Current Password') }}</label>
                                        <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->password->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>

                                        @if ($errors->password->has('old_password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->password->first('old_password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->password->has('password') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                                        <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->password->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>

                                        @if ($errors->password->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->password->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                        <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm New Password') }}" value="" required>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">{{ __('Change password') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @if (in_array($user->role_id, \App\Models\User\Role::DISTRIBUTORS))
                        <div class="tab-pane fade{{ session('status.distributor') || count($errors->distributor) > 0 ? ' show active' : '' }}" id="edit-distributor" role="tabpanel" aria-labelledby="edit-distributor-tab">
                            <div class="card-header bg-white border-0">
                                <h3 class="mb-0">{{ __('Edit Distributor Profile') }}</h3>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('profile.edit-distributor') }}" autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')

                                    @if (session('status.distributor'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('status.distributor') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    @if ($errors->any())
                                        {{ $errors }}
                                    @endif

                                    <div class="form-group{{ $errors->distributor->has('id_card_number') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-id-card-number">{{ __('ID Card Number') }}</label>
                                        <input type="text" name="id_card_number" id="input-id-card-number" class="form-control form-control-alternative{{ $errors->distributor->has('id_card_number') ? ' is-invalid' : '' }}" placeholder="{{ __('ID Card Number') }}" value="{{ $user->distributor->id_card_number }}" {{ $user->distributor->is_verified ? 'readonly' : 'required'}}>

                                        @if ($errors->distributor->has('id_card_number'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->distributor->first('id_card_number') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->distributor->has('phone_number') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-phone-number">{{ __('Phone Number') }}</label>
                                        <input type="text" name="phone_number" id="input-phone-number" class="form-control form-control-alternative{{ $errors->distributor->has('phone_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Phone Number') }}" value="{{ $user->distributor->phone_number }}" required>

                                        @if ($errors->distributor->has('phone_number'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->distributor->first('phone_number') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->distributor->has('address') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-address">{{ __('Address') }}</label>
                                        <input type="text" name="address" id="input-address" class="form-control form-control-alternative{{ $errors->distributor->has('address') ? ' is-invalid' : '' }}" placeholder="{{ __('Address') }}" value="{{ $user->distributor->address }}" required>

                                        @if ($errors->distributor->has('phone_number'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->distributor->first('phone_number') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->distributor->has('id_card_photo') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-id-card-photo">{{ __('ID Card Photo') }}</label>
                                        @if ($user->distributor->id_card_photo_uri)
                                        <img src="{{ asset($user->distributor->id_card_photo_uri) }}" alt="ID Card" class="w-100 d-block mx-auto rounded">
                                        @endif
                                        @if (!$user->distributor->is_verified)
                                        <input type="file" name="id_card_photo" id="input-id-card-photo" class="form-control form-control-alternative{{ $errors->distributor->has('id_card_photo') ? ' is-invalid' : '' }}" placeholder="{{ __('ID Card Photo') }}" required>
                                        @endif

                                        @if ($errors->distributor->has('id_card_photo'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->distributor->first('id_card_photo') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
