@extends('layouts.app', ['title' => 'Distributor'])

@section('content')
<div class="container mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Distributors') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('distributor.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> {{ __('Add') }}</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Area') }}</th>
                                <th scope="col">{{ __('Address') }}</th>
                                <th scope="col">{{ __('Status') }}</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($distributors as $distributor)
                            <tr>
                                <td>{{ $distributor->user->name }}</td>
                                <td>{{ $distributor->area }}</td>
                                <td>{{ $distributor->address }}</td>
                                <td><span class="badge badge-{{ $distributor->is_verified ? 'success' : 'danger' }}">{{ $distributor->is_verified ? __('Verified') : __('Not Verified') }}</span></td>
                                <td>
                                    <a class="btn btn-sm btn-primary float-right" href="{{ route('distributor.show', $distributor->user_id) }}"><i class="fas fa-folder"></i> {{ __('Details') }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">

                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
