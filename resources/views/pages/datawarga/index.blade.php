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
                        <h3 class="card-title">List Data Warga</h3>
                        <span class="mx-auto"></span>
                        @can('datawarga.create')
                        <a href="{{ route('manage.import.index') }}" class="btn btn-secondary mb-2 mx-3 ">
                            Import
                        </a>
                        <a href="{{ route('manage.datawarga.create') }}" class="btn btn-success mb-2 ">
                            Tambah
                        </a>
                        @endcan
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
                                        <th>RT/RW</th>
                                        <th>Desa</th>
                                        <th>Dibuat</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $i)
                                    <tr>
                                         <td>{{ $loop->iteration }}</td>
                                        <td>{{ $i->nik }}</td>
                                        <td>{{ $i->name }}</td>
                                        <td>{{ $i->no_rt }}/{{ $i->no_rw }}</td>
                                        <td>{{ $i->name_desa }}</td>
                                        <td>{{ formatDate($i->dibuat) }}</td>
                                        <td >
                                            @if ($i->user_id != null)
                                                <span class="badge bg-success">Active</span>
                                                @else
                                                <span class="badge bg-warning">TidaK Active</span>
                                            @endif
                                        </td>
                                        <td class="d-flex justify-content-center border-0">
                                           <a href="https://wa.me/{{ $i->phone }}" class="btn btn-sm btn-secondary fs-10">  <i class="fe fe-phone"></i></a>
                                        @can('data.warga.update')
                                            <a href="{{route('manage.datawarga.edit',Crypt::encrypt($i->id_nik))}}" class="btn btn-sm btn-primary badge  mx-2"><i class="fe fe-edit"></i></a>
                                            {{-- <form action="{{route('admin.roles.destroy',1)}}" method="post" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger badge " type="submit" name="action"><i class="fa fa-trash"></i></button>
                                            </form> --}}
                                            @endcan
                                        </td>
                                     </tr>
                                     @endforeach
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
@endsection