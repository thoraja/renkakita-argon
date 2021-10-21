@extends('layouts.app', ['title' => 'Distributor'])

@section('content')
<div class="container mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow py-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-2">
                                <span class="h2 mr-1">{{ $distributor->user->name }}</span>
                                <span class="badge align-middle badge-{{ $distributor->is_verified ? 'success' : 'danger' }}">{{ $distributor->is_verified ? 'verified' : 'unverified' }}</span>
                            </div>
                            <div class="text-muted text-sm mb-2">
                                <span>{{ $distributor->user->role->display_name }}, {{ $distributor->area }}</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <button class="btn btn-sm btn-primary float-right mx-1 my-1" style="width: 80px" data-toggle="modal" data-target="#idCardModal">
                                <i class="fas fa-id-card mr-2"></i>{{ __('ID Card') }}
                            </button>
                            @if (!$distributor->is_verified)
                            <button class="btn btn-sm btn-warning float-right mx-1 my-1" style="width: 80px" data-toggle="modal" data-target="#verificationModal">
                                <i class="fas fa-user-check mr-2"></i>{{ __('Verify') }}
                            </button>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="text-sm mb-1">
                                <i class="fas fa-envelope mr-2"></i>
                                <span class="{{ $distributor->user->email ? '' : 'text-muted' }}">{{ $distributor->user->email ?? __('No Data') }}</span>
                            </div>
                            <div class="text-sm mb-1">
                                <i class="fas fa-phone mr-2"></i>
                                <span class="{{ $distributor->phone_number ? '' : 'text-muted' }}">{{ $distributor->phone_number ?? __('No Data') }}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="text-sm mb-1">
                                <i class="fas fa-map-marked mr-2"></i>
                                <span class="{{ $distributor->address ? '' : 'text-muted' }}">{{ $distributor->address ?? __('No Data') }}</span>
                            </div>
                        </div>
                    </div>
                    <hr class="my-3">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modals')
<div class="modal fade" id="idCardModal" tabindex="-1" role="dialog" aria-labelledby="idCardModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header mb-0">
                <h3 class="modal-title mt-2" id="idCardLabel">{{ __('ID Card') }}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-0">
                <div class="mb-2 text-sm">
                    <div>{{ __('ID Card Number') }}</div>
                    <i class="fas fa-id-card mr-2"></i>
                    <span class="{{ $distributor->id_card_number ?: 'text-muted' }}">{{ $distributor->id_card_number ?? __('No Data') }}</span>
                </div>
                <div class="mb-2 text-sm">
                    <div>{{ __('ID Card Photo') }}</div>
                    @if ($distributor->id_card_photo_uri)
                    <img src="{{ asset($distributor->id_card_photo_uri) }}" alt="ID Card" class="w-100 d-block mx-auto rounded">
                    @else
                    <span class="text-muted">{{ __('No Data') }}</span>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="verificationModal" tabindex="-1" role="dialog" aria-labelledby="verificationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header mb-0">
                <h3 class="modal-title mt-2" id="verificationLabel">{{ __('Confirmation') }}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-0">
                <div>
                    <span>{{ __('Are you sure you want to verify this data?') }}</span>
                    <span class="text-danger text-sm">{{ __('This operation can\'t be undone.') }}</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <a type="button" class="btn btn-primary btn-sm" href="{{ route('distributor.verify', $distributor->user_id) }}">Confirm</a>
            </div>
        </div>
    </div>
</div>
@endsection
