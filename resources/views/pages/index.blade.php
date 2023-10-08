@extends('layouts.main')
@section('content')

    <div class="page-header">
        <h1 class="page-title">{{$breadcrumb}}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$breadcrumb}}</li>
            </ol>
        </div>
    </div>

    @if($user->phone == null)
        <div class="alert alert-warning">
            <span>Lengkapi Profile Anda Terlebih Dahulu! <a href="{{ route('profile') }}" class="text-warning fw-bold">Ke Profile</a></span>
        </div>                      
    @endif
     <!-- ROW-1 -->
     <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    @role(['admin','super-admin'])
                                    <h6 class="">Total Warga</h6>
                                    <h2 class="mb-0 number-font">{{ $jumlahWarga }}</h2>
                                    @endrole
                                    @role('user')
                                    <h6 class="">Total Keluarga</h6>
                                    <h2 class="mb-0 number-font">{{ $jmhkk }}</h2>
                                    @endrole
                                </div>
                                <div class="ms-auto">
                                    <div class="chart-wrapper mt-1">
                                        <canvas id="saleschart"
                                            class="h-8 w-9 chart-dropshadow"></canvas>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    @role(['admin','super-admin'])
                                    <h6 class="">Total Pengajuan </h6>
                                    <h2 class="mb-0 number-font">{{ $jmhpengajuan }}</h2>
                                    @endrole
                                    @role('user')
                                    <h6 class="">Total Pengajuan </h6>
                                    <h2 class="mb-0 number-font">{{ $jmhpengajuan }}</h2>
                                    @endrole
                                </div>
                                <div class="ms-auto">
                                    <div class="chart-wrapper mt-1">
                                        <canvas id="leadschart"
                                            class="h-8 w-9 chart-dropshadow"></canvas>
                                    </div>
                                </div>
                            </div>
            
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    @role(['admin','super-admin'])
                                    <h6 class="">Total Laporan</h6>
                                    <h2 class="mb-0 number-font">{{ $jmhlaporan }}</h2>
                                    @endrole
                                    @role('user')
                                    <h6 class="">Total Laporan</h6>
                                    <h2 class="mb-0 number-font">{{ $jmhlaporan }}</h2>
                                    @endrole
                                </div>
                                <div class="ms-auto">
                                    <div class="chart-wrapper mt-1">
                                        <canvas id="profitchart"
                                            class="h-8 w-9 chart-dropshadow"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    @role(['admin','super-admin'])
                                    <h6 class="">Total KK</h6>
                                    <h2 class="mb-0 number-font">{{ $jmhkk }}</h2>
                                    @endrole
                                    @role('user')
                                    <h6 class="">Status</h6>
                                    <h2 class="mb-0 number-font text-success">Active</h2>
                                    @endrole
                                </div>
                                <div class="ms-auto">
                                    <div class="chart-wrapper mt-1">
                                        <canvas id="costchart"
                                            class="h-8 w-9 chart-dropshadow"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-1 END -->
@endsection
@section('script')
       <!-- INTERNAL INDEX JS -->
       <script src="{{ url('assets/js/index1.js') }}"></script>
@endsection