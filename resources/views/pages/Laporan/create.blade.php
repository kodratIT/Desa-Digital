@extends('layouts.main')
@section('content')
        <div class="page-header">
            <h1 class="page-title">{{$breadcrumb}}</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('manage.jenis-surat.index') }}">Data Desa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$breadcrumb}}</li>
                </ol>
            </div>
        </div>
                    <!-- Row -->
          <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Buat Laporan</h3>
                    </div>
                    <div class="card-body pt-2">
                        <form action="{{ route('manage.laporan.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="title">Jenis Laporan</label>
                                        <input type="text" id="title" placeholder="Subject Laporan" value="{{ old('title') }}" name="title" class="form-control">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="bukti">Bukti</label>
                                        <input type="file" id="bukti" placeholder="Subject Laporan" value="{{ old('bukti') }}" name="bukti" class="form-control">
                                        @error('bukti')
                                          <div class="text-danger">{{ $message }}</div>
                                         @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="pesan">Detail Laporan</label>
                                        <textarea name="pesan" id="pesan" cols="30" rows="10" class="form-control" placeholder="Detail Laporan ..."></textarea>
                                        @error('pesan')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
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