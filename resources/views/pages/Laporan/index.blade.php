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
                        <h3 class="card-title">List Laporan Warga</h3>
                        <span class="mx-auto"></span>
                        @can('laporan.create')
                        <a href="{{ route('manage.laporan.create') }}" class="btn btn-success ">
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
                                        <th>Pesan</th>
                                        <th>Dibuat</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                           
                                    @if ($data->isEmpty())
                                        <tr>
                                            <td colspan="8" class="text-gray">Data Tidak Ada</td>
                                        </tr>
                                    @else
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->no_nik }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td class="d-flex justify-content-center border-0">
                                                <a href="{{route('manage.laporan.edit',Crypt::encrypt($item->id))}}" class="btn btn-sm btn-primary badge  mx-2"><i class="fe fe-edit"></i></a>
                                                @can('laporan.delete')
                                                <form action="{{route('manage.laporan.edit',Crypt::encrypt($item->id))}}" method="post" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger badge " type="submit" name="action"><i class="fa fa-trash"></i></button>
                                                </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @if (Session::has('success'))
                            <div class="notice success">
                                {{ Session::get('success') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
@endsection
@section('script')

    <!-- INTERNAl Jquery.steps js -->
    <script src="{{url('../assets/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
    <script src="{{url('../assets/plugins/parsleyjs/parsley.min.js')}}"></script>

      
    <!-- INTERNAL Notifications js -->   
    <script src="{{ url('assets/plugins/notify/js/rainbow.js')}}"></script>
    <script src="{{ url('assets/plugins/notify/js/jquery.growl.js')}}"></script>
    <script src="{{ url('assets/plugins/notify/js/notifIt.js')}}"></script>
        
    <script>
        function showSuccessMessage(message) {
        $.growl.notice({
            message: message
        });
        $('.notice.success').hide();
    }
    
    $(document).ready(function() {
        var successMessage = $('.notice.success').text();
        
        if (successMessage.trim() !== '') {
            showSuccessMessage(successMessage);
        }
    });
    </script>

@endsection