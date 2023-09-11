@extends('layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">{{$breadcrumb}}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('manage.kartukeluarga.index') }}">Data KK</a></li>
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
                    @if(session()->has('error'))
                    <div class="alert alert-warning">
                    {{session()->get('error') }}
                    </div>                      
                    @endif
                    <form action="{{ route('manage.kartukeluarga.update',Crypt::encrypt($data->no_kk)) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="nama">No KK</label>
                                    <input type="text" id="nama" placeholder="1500119xxxxxxx" value="{{ $data->no_kk }}" name="no_kk" class="form-control">
                                </div>
                                @error('no_kk')
                                    <span class="text-danger">Masukan data yang benar</span>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="alamat">Alamat KK</label>
                                    <input type="text" id="alamat" placeholder="Jln ." value="{{ $data->alamat_kk }}" name="alamat" class="form-control">
                                </div>
                                @error('alamat')
                                    <span class="text-danger">Masukan data yang benar</span>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="rt">No RT</label>
                                    <select name="rt" id="rt" class="form-control select2">
                                        <option value="">Pilih No Rt</option>
                                        @foreach ($rt as $r)
                                        <option value="{{ $r->id }}" @if ($data->id_rt == $r->id)
                                            Selected                                            
                                        @endif>{{ $r->no_rt }}</option>
                                        @endforeach
                                    </select>
                                    @error('rt')
                                        <span class="text-danger">Masukan data yang benar</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="desa">Desa</label>
                                    <select name="desa" id="desa" class="form-control select2">
                                        <option value="">Plih Desa</option>
                                        @foreach ($desa as $item)
                                        <option value="{{ $item->id }}" @if ($data->id_desa == $item->id)
                                            Selected                                            
                                        @endif>{{ $item->name_desa }}</option>
                                        @endforeach
                                    </select>
                                    @error('rt')
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

<script>
    $(document).ready(function () {
        $('#rt').select2();
        $('#desa').select2();
    });
</script>
@endsection