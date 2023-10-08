@extends('layouts.main')
@section('content')
        <div class="page-header">
            <h1 class="page-title">{{$breadcrumb}}</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('manage.laporan.index') }}">Laporan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$breadcrumb}}</li>
                </ol>
            </div>
        </div>
                    <!-- Row -->
          <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Detail Laporan</h3>
                    </div>
                    <div class="card-body pt-2">
                        <div class="form-group mt-2">
                            <label for="">Judul</label>
                            <input type="text" value="{{ $data->title }}" readonly class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label >Pesan</label>
                            <textarea name="" id="" cols="10" rows="3" readonly class="form-control">{{ $data->pesan }}</textarea>
                        </div>
                        <div class="form-group justify-content-center ">
                           <p>bukti foto</p>
                            <img src="{{ url('uploads/'.$data->bukti) }}" alt="" class="img-fluid mt-2 "> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
@endsection