@extends('layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">{{$breadcrumb}}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('manage.jenis-surat.index') }}">Desa</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$breadcrumb}}</li>
            </ol>
        </div>
    </div>
    
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update Data</h3>
                </div>
                <div class="card-body pt-2">
                    <form action="{{ route('manage.data-rw.update',Crypt::encrypt($data->id)) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <div class="form-group">
                                    <label for="nama">No RW</label>
                                    <input type="text" id="nama" placeholder="001" value="{{ $data->no_rw }}" name="no_rw" class="form-control">
                                </div>
                                @error('no_rt')
                                    <span class="text-danger">Masukan data yang benar</span>
                                @enderror
                            </div>
                        </div>
                        <div class="pt-2 text-end">
                            <button type="submit" class="btn btn-success text-white"> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
@endsection