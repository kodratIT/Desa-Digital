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
                        <h3 class="card-title">Buat Data KK</h3>
                    </div>
                    <div class="card-body pt-2">
                        @if(session()->has('error'))
                            <div class="alert alert-warning">
                            {{session()->get('error') }}
                            </div>                      
                        @endif
                        <form action="{{ route('manage.kartukeluarga.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="no_kk">No Kartu Keluarga</label>
                                        <input type="text" id="no_kk" placeholder="1506517xxxxxxxxx" value="{{ old('no_kk') }}" name="no_kk" class="form-control">
                                        @error('no_kk')
                                            <span class="text-danger">Masukan data yang benar</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="alamat">Alamat KK</label>
                                        <input type="text" id="alamat" placeholder="Jln. Menteng " value="{{ old('alamat') }}" name="alamat" class="form-control">
                                        @error('alamat')
                                            <span class="text-danger">Masukan data yang benar</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="rt">No RT</label>
                                        <select name="rt" id="rt" class="form-control select2">
                                            <option value="">Pilih No Rt</option>
                                            @foreach ($rt as $r)
                                            <option value="{{ $r->id }}">{{ $r->no_rt }}</option>
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
                                            <option value="{{ $item->id }}">{{ $item->name_desa }}</option>
                                            @endforeach
                                        </select>
                                        @error('rt')
                                            <span class="text-danger">Masukan data yang benar</span>
                                        @enderror
                                    </div>
                                </div>
                               
                            </div>
                            <div class="pt-2 text-end ">
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