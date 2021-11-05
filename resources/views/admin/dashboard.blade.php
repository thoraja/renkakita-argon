@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                @foreach ($data as $id => $dashboard)
                <li class="nav-item" role="presentation">
                    <a class="nav-link{{ $loop->index == 0 ? ' active' : '' }}" id="pills_company{{ $id }}_tab" data-toggle="pill" href="#pills_company{{ $id }}" role="tab" aria-controls="pills_company{{ $id }}" aria-selected="true">{{ $dashboard['company_name'] }}</a>
                </li>
                @endforeach
            </ul>
            <div class="tab-content" id="pills-tabContent">
                @foreach ($data as $id => $dashboard)
                <div class="tab-pane fade{{ $loop->index == 0 ? ' show active' : '' }}" id="pills_company{{ $id }}" role="tabpanel" aria-labelledby="pills_company{{ $id }}_tab">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">{{ __('Products') }}</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $dashboard['product_count'] }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                <x-icon size="24">checkroom</x-icon>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">{{ __('Distributors') }}</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $dashboard['distributor_count'] }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                                <x-icon size="24">share</x-icon>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">{{ __('Order') }}</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $dashboard['order_count'] }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                                <x-icon size="24">receipt_long</x-icon>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">{{ __('Earnings') }}</h5>
                                            <span class="h2 font-weight-bold mb-0">4.855.000</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                <x-icon size="24">payments</x-icon>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endsection
