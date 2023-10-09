@extends('layouts.main')
@section('content')
        <div class="page-header">
            <h1 class="page-title">{{$breadcrumb}}</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('manage.data.warga') }}">Data warga</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$breadcrumb}}</li>
                </ol>
            </div>
        </div>
                    <!-- Row -->
          <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Update Data Warga</h3>
                    </div>
                    <div class="card-body pt-2">
                        @if(session()->has('error'))
                            <div class="alert alert-warning">
                            {{session()->get('error') }}
                            </div>                      
                        @endif
                        <form action="{{ route('manage.datawarga.update',Crypt::encrypt($data->id)) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="no_kk">No Kartu Keluarga</label>
                                        <select name="id_kk" id="id_kk" class="form-control select2" value="{{ old('id_kk') }}" >
                                            <option value="">Pilih No KK</option>
                                            @foreach ($no_kk as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == $data->no_kk ? 'selected' : '' }}>
                                                {{ $item->no_kk }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('no_kk')
                                            <span class="text-danger">Masukan data yang benar</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="nik">No NIK</label>
                                        <input type="text" id="nik"  name="no_nik" class="form-control" placeholder="Masukan NIK " value="{{ $data->no_nik}}" readonly>
                                        @error('no_nik')
                                        <span class="text-danger">Masukan data yang benar</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" id="name"  name="name" class="form-control" placeholder="Masukan nama" value="{{ $data->name }}" >
                                        @error('name')
                                        <span class="text-danger">Masukan data yang benar</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                       <select name="agama" id="agama" class="form-control select2 " value="{{ old('agama') }}">
                                        <option value="">Pilih Agama</option>
                                        <option value="Islam" {{ $data->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                        <option value="Kristen" {{ $data->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                        <option value="Protestan" {{ $data->agama == 'Protestan' ? 'selected' : '' }}>Protestan</option>
                                        <option value="Hindu" {{ $data->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                        <option value="Budha" {{ $data->agama == 'Budha' ? 'selected' : '' }}>Budha</option>
                                        <option value="Konghucu" {{ $data->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                       </select>
                                        @error('agama')
                                        <span class="text-danger">Masukan data yang benar</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="birt_place">Tempat Lahir</label>
                                        <input type="text" id="birt_place"  name="birt_place" class="form-control" placeholder="Masukan Tempat Lahir" value="{{ $data->tempat_lahir}}" readonly >
                                        @error('birt_place')
                                        <span class="text-danger">Masukan data yang benar</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="birth_day">Tempat Lahir</label>
                                        <input type="date" id="birth_day" name="birth_day" class="form-control" placeholder="Masukan Tempat Lahir" value="{{ $data->tanggal_lahir}}" readonly>
                                        @error('birth_day')
                                        <span class="text-danger">Masukan data yang benar</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <input type="text" value="{{ $data->jenis_kelamin }}" readonly class="form-control select2">
                                        @error('jenis_kelamin')
                                        <span class="text-danger">Masukan data yang benar</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="pendidikan">Pendidikan</label>
                                        <select name="pendidikan" id="pendidikan" class="form-control select2" value="{{ old('pendidikan') }}" >
                                            <option value="">Pilih Pendidikan</option>
                                            <option value="SD" {{ $data->pendidikan == 'SD' ? 'selected' : '' }}>SD</option>
                                            <option value="SMP/MTS" {{ $data->pendidikan == 'SMP/MTS' ? 'selected' : '' }}>SMP/MTS</option>
                                            <option value="SMA/MA/SMK" {{ $data->pendidikan == 'SMA/MA/SMK' ? 'selected' : '' }}>SMA/MA/SMK</option>
                                            <option value="S1" {{ $data->pendidikan == 'S1' ? 'selected' : '' }}>S1</option>
                                        </select>
                                        @error('pendidikan')
                                        <span class="text-danger">Masukan data yang benar</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="pekerjaan">pekerjaan</label>
                                        <select name="pekerjaan" id="pekerjaan" class="form-control select2" value="{{ old('pekerjaan') }}" >
                                            <option value="">Pilih pekerjaan</option>
                                            <option value="Pelajar/Mahasiswa" {{ $data->pekerjaan == 'Pelajar/Mahasiswa' ? 'selected' : '' }}>Pelajar/Mahasiswa</option>
                                            <option value="Wiraswasta" {{ $data->pekerjaan == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                            <option value="Petani" {{ $data->pekerjaan == 'Petani' ? 'selected' : '' }}>Petani</option>
                                        </select>
                                        @error('pekerjaan')
                                        <span class="text-danger">Masukan data yang benar</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control select2" value="{{ old('status') }}">
                                            <option value="">Pilih Status</option>
                                            <option value="Belum Menikah" {{ $data->status == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                                            <option value="Sudah Menikah" {{ $data->status == 'Sudah Menikah' ? 'selected' : '' }}>Sudah Menikah</option>
                                            <option value="Duda" {{ $data->status == 'Duda' ? 'selected' : '' }}>Duda</option>
                                            <option value="Janda" {{ $data->status == 'Janda' ? 'selected' : '' }}>Janda</option>
                                        </select>
                                        @error('status')
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
        $('#id_kk').select2();
        $('#rw').select2();
        $('#desa').select2();
        $('#agama').select2();
        $('#pendidikan').select2();
        $('#pekerjaan').select2();
        $('#jk').select2();
        $('#status').select2();
    });
</script>
@endsection