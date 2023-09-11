@extends('layouts.main')
@section('content')
        <div class="page-header">
            <h1 class="page-title">{{$breadcrumb}}</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('manage.pengajuan.index') }}">Data Pengajuan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$breadcrumb}}</li>
                </ol>
            </div>
        </div>
                    <!-- Row -->
          <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Buat Pengajuan</h3>
                    </div>
                    <div class="card-body pt-2">
                        <form action="{{ route('manage.pengajuan.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <div class="form-group">
                                        <label for="jenis_surat">Jenis Surat Pengajuan</label>
                                        <select name="jenis_surat" id="jenis_surat" class="form-control select2">
                                            <option value="">Pilih Jenis Surat</option>
                                            @foreach ($jenis_surat as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('jenis_surat')
                                            <span class="text-danger">Masukan data yang benar</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2 ">
                                <button type="submit" class="btn btn-success text-white"> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
@endsection
@section('script')
    <script>
          $(document).ready(function () {
            $('#jenis_surat').select2();
        });
    </script>
@endsection