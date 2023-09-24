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
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <span>Informasi Pengguna</span>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.save',Crypt::encrypt($user->id)) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $member->name }}" readonly>
                                @error('name')
                                    <span class="text-danger">Periksa Data</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" @if ($user->email_verified_at != null)
                                    disabled
                                @endif>
                                @error('email')
                                    <span class="text-danger">Periksa Data</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" name="nik" id="nik" class="form-control" value="{{ $member->no_nik }}" disabled>
                                @error('nik')
                                    <span class="text-danger">Periksa Data</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">NO HP/WA</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}" placeholder="Masukan Nomor">
                                @error('phone')
                                    <span class="text-danger">Periksa Data</span>
                                @enderror
                            </div>
                            @can('digital.signature')
                            <div class="form-group">
                                <label for="signature">Digital Signature</label>
                                @if($user->digital_signature)
                                    <img src="{{ asset('signature/' . $user->digital_signature) }}" alt="Signature" class="w-50 block mx-auto">
                                @endif
                                <input type="file" name="signature" id="signature" class="form-control" value="{{ $user->digital_signature }}" placeholder="Masukan Nomor">
                                @error('signature')
                                <span class="text-danger">Periksa Data</span>
                                @enderror
                            </div>
                            @endcan
                        </div>
                    </div>
                    <div class="text-end mt-4">
                        <button class="btn btn-success">Simpan</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-lg-8 col-12">            
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <span>Update Profile </span>
                    </div>
                </div>
                <div class="card-body">
                    @if($member->status == null)
                        <div class="alert alert-warning">
                            <span>Lengkapi Profile Anda Terlebih Dahulu! </span>
                        </div>                      
                    @endif
                    @if ($member == null)
                    
                    
                        
                    
                
                    <form action="{{ route('profile.update',Crypt::encrypt(Auth()->User()->id)) }}" method="post">
                        @csrf
                        <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <select name="agama" id="agama" class="form-control select2" >
                                            <option value="" {{ $member->agama === null ? 'selected' : '' }}>Pilih Agama</option>
                                            <option value="Islam" {{ $member->agama === 'Islam' ? 'selected' : '' }}>Islam</option>
                                            <option value="Kristen" {{ $member->agama === 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                            <option value="Katolik" {{ $member->agama === 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                            <option value="Hindu" {{ $member->agama === 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                            <option value="Budha" {{ $member->agama === 'Budha' ? 'selected' : '' }}>Budha</option>
                                            <option value="Konghucu" {{ $member->agama === 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                        </select>
                                        @error('agama')
                                        <span class="text-danger">Periksa Data</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <select name="pekerjaan" id="pekerjaan" class="form-control select2">
                                            <option value="" {{ $member->pekerjaan === null ? 'selected' : '' }}>Pilih Pekerjaan</option>
                                            <option value="Pelajar/mahasiswa" {{ $member->pekerjaan === 'Pelajar/mahasiswa' ? 'selected' : '' }}>Pelajar/Mahasiswa</option>
                                            <option value="Wiraswasta" {{ $member->pekerjaan === 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                            <option value="PNS" {{ $member->pekerjaan === 'PNS' ? 'selected' : '' }}>PNS</option>
                                            <option value="Buruh" {{ $member->pekerjaan === 'Buruh' ? 'selected' : '' }}>Buruh</option>
                                            <option value="Petani" {{ $member->pekerjaan === 'Petani' ? 'selected' : '' }}>Petani</option>
                                            <option value="IRT" {{ $member->pekerjaan === 'IRT' ? 'selected' : '' }}>IRT</option>
                                        </select>
                                        @error('pekerjaan')
                                        <span class="text-danger">Periksa Data</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="tempatlahir">Tempat Lahir</label>
                                        <input type="text" name="tempatlahir" id="tempatlahir" class="form-control" placeholder="Tempat Lahir" value="{{ $member->tempat_lahir }}">
                                        @error('tempatlahir')
                                        <span class="text-danger">Periksa Data</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="tgllahir">Tanggal Lahir</label>
                                        <input type="date" name="tgllahir" id="tgllahir" class="form-control" value="{{ $member->tanggal_lahir }}">
                                        @error('tgllahir')
                                        <span class="text-danger">Periksa Data</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="jeniskelamin">Jenis Kelamin</label>
                                        <select name="jeniskelamin" id="jeniskelamin" class="form-control select2">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki" {{ $member->jenis_kelamin === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="Perempuan" {{ $member->jenis_kelamin === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                        @error('jeniskelamin')
                                        <span class="text-danger">Periksa Data</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="pendidikan">Pendidikan Terakhir</label>
                                        <select name="pendidikan" id="pendidikan" class="form-control select2">
                                            <option value="">Pilih Pendidikan</option>
                                            <option value="SD" {{ $member->pendidikan === 'SD' ? 'selected' : '' }}>SD</option>
                                            <option value="SMP" {{ $member->pendidikan === 'SMP' ? 'selected' : '' }}>SMP</option>
                                            <option value="SMA/MA" {{ $member->pendidikan === 'SMA/MA' ? 'selected' : '' }}>SMA/MA</option>
                                            <option value="SMK" {{ $member->pendidikan === 'SMK' ? 'selected' : '' }}>SMK</option>
                                            <option value="S1" {{ $member->pendidikan === 'S1' ? 'selected' : '' }}>S1</option>
                                            <option value="S2" {{ $member->pendidikan === 'S2' ? 'selected' : '' }}>S2</option>
                                            <option value="S3" {{ $member->pendidikan === 'S3' ? 'selected' : '' }}>S3</option>
                                        </select>
                                        @error('pendidikan')
                                        <span class="text-danger">Periksa Data</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control select2">
                                            <option value="">Pilih Status</option>
                                            <option value="Menikah" {{ $member->status === 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                            <option value="Belum Menikah" {{ $member->status === 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                                            <option value="Duda/Janda" {{ $member->status === 'Duda/Janda' ? 'selected' : '' }}>Duda/Janda</option>
                                        </select>
                                        @error('status')
                                        <span class="text-danger">Periksa Data</span>
                                        @enderror
                                    </div>
                                </div>
                            
                        <div class="text-end">
                            <button class="btn btn-success mt-5 ">Simpan</button>
                        </div>
                    </form>
                    @else
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <label for="agama1">Agama</label>
                            <input type="text" name="" id="agama1" class="form-control" value="{{ $member->agama }}" readonly>
                        </div>
                        <div class="col-lg-6 col-12">
                            <label for="jk">Jenis Kelamin</label>
                            <input type="text" name="" id="jk" class="form-control" value="{{ $member->jenis_kelamin }}" readonly>
                        </div>
                        <div class="col-lg-6 col-12">
                            <label for="tmpt_lahir">Tempat Lahir</label>
                            <input type="text" name="" id="tmpt_lhir" class="form-control" value="{{ $member->tempat_lahir }}" readonly>
                        </div>
                        <div class="col-lg-6 col-12">
                            <label for="tgl_lhir">Tanggal Lahir</label>
                            <input type="text" name="" id="tgl_lhir" class="form-control" value="{{ $member->tanggal_lahir }}" readonly>
                        </div>
                        <div class="col-lg-6 col-12">
                            <label for="pendidikan1">Pendidikan</label>
                            <input type="text" name="" id="pendidikan1" class="form-control" value="{{ $member->pendidikan }}" readonly>
                        </div>
                        <div class="col-lg-6 col-12">
                            <label for="pk">Pekerjaan</label>
                            <input type="text" name="" id="pk" class="form-control" value="{{ $member->pekerjaan }}" readonly>
                        </div>
                        <div class="col-12">
                            <label for="status1">Status</label>
                            <input type="text" name="" id="status1" class="form-control" value="{{ $member->status }}" readonly>
                        </div>
                    </div>
                    @endif

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

<script>
    $(document).ready(function () {
      $('#pekerjaan').select2();
      $('#pendidikan').select2();
      $('#jeniskelamin').select2();
      $('#status').select2();
      $('#agama').select2();
  });
</script>
@endsection