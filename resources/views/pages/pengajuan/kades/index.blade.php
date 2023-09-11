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
          <!-- Row -->
          <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Surat Pengajuan</h3>
                    </div>
                    <div class="card-body">
                        @error ('massage')
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                            <i class="fa fa-frown-o me-2" aria-hidden="true"> {{$message}}</i>
                        </div>
                        @enderror
                        <div class="table-responsive text-center">
                            <table class="table table-bordered border text-nowrap mb-0 " id="new-edit">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Jenis Surat</th>
                                        <th>Status</th>
                                        <th>Dibuat</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td>1</td>
                                    <td>1500000000000</td>
                                    <td>Kodrat Pamungkas</td>
                                    <td>Rekomendasi</td>
                                    <td>
                                        <span class="btn-sm bg-success text-white">success</span>
                                    </td>
                                    <td>12/12/2023</td>
                                    <td class="d-flex justify-content-center border-0">
                                        <a href="{{route('admin.roles.edit',1)}}" class="btn btn-sm btn-primary badge  mx-2"><i class="fe fe-edit"></i></a>
                                        <form action="{{route('admin.roles.destroy',1)}}" method="post" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger badge " type="submit" name="action"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
@endsection