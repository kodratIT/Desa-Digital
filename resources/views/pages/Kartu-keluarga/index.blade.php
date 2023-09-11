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
                    <h3 class="card-title ">List Kartu Keluarga</h3>
                    <span class="mx-auto"></span>
                    <a href="{{ route('manage.kartukeluarga.create') }}" class="btn btn-success mb-2 ">
                        Tambah
                    </a>
                </div>
                <div class="card-body ">
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
                                    <th>No KK</th>
                                    <th>Desa</th>
                                    <th>No RT</th>
                                    <th>Alamat</th>
                                    <th>Dibuat</th>
                                    <th>Diupdate</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if ($let == null)
                                <tr>
                                    <td colspan="6">DATA TIDAK DITEMUKAN</td>
                                </tr>
                            @else                                         
                                @foreach ($Kk as $i) 
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $i->no_kk }}</td>
                                        <td>{{ $i->name_desa }}</td>
                                        <td>{{ $i->no_rt }}</td>
                                        <td>{{ $i->alamat_kk }}</td>
                                        <td>{{ $i->created_at }}</td>
                                        <td>{{ $i->updated_at }}</td>
                                        <td class="d-flex justify-content-center border-0">
                                            <a href="{{route('manage.kartukeluarga.edit',Crypt::encrypt($i->no_kk))}}" class="btn btn-sm btn-primary badge  mx-2"><i class="fe fe-edit"></i></a>

                                            <button class="btn-sm btn-danger badge" data-bs-toggle="modal" data-bs-target="#smallmodal-{{ $i->id }}"><i class="fa fa-trash"></i></button>

                                            <div class="modal  fade" id="smallmodal-{{ $i->id }}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                      
                                                            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <i class="fe fe-alei-circle fs-70 text-waring lh-1 my-4 d-inline-block"></i>
                                                            <h4 class="text-danger mb-20">Data Akan di Hapus
                                                            </h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-gray" data-bs-dismiss="modal">Batal</button>
                                                            <form action="{{route('manage.kartukeluarga.destroy',Crypt::encrypt($i->no_kk))}}" method="post" class="inline-block">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger badge " type="submit" name="action"><i class="fa fa-trash"></i> Hapus Data</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (Session::has('success'))
    <div class="notice success">
        {{ Session::get('success') }}
    </div>
    @endif
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