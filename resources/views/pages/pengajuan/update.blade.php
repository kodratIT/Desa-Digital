@extends('layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">{{$breadcrumb}}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('manage.pengajuan.index') }}">Pengajuan</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$breadcrumb}}</li>
            </ol>
        </div>
    </div>
    
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Verifikasi Data</h3>
                </div>
                <div class="card-body pt-2">
                    <form action="{{ route('manage.pengajuan.update',Crypt::encrypt($data->id)) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="nokk">No Kartu Keluarga</label>
                                <input type="text" name="nokk" id="nokk" value="{{ $data->kk }}" disabled class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" name="nik" id="nik" value="{{ $data->no_nik }}" disabled class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" name="name" id="name" value="{{ $data->name }}" disabled class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <select name="pekerjaan" id="pekerjaan" class="form-control select2" disabled>
                                        <option value="" {{ $data->pekerjaan === null ? 'selected' : '' }}>Pilih Pekerjaan</option>
                                        <option value="Pelajar/mahasiswa" {{ $data->pekerjaan === 'Pelajar/mahasiswa' ? 'selected' : '' }}>Pelajar/Mahasiswa</option>
                                        <option value="Wiraswasta" {{ $data->pekerjaan === 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                        <option value="PNS" {{ $data->pekerjaan === 'PNS' ? 'selected' : '' }}>PNS</option>
                                        <option value="Buruh" {{ $data->pekerjaan === 'Buruh' ? 'selected' : '' }}>Buruh</option>
                                        <option value="Petani" {{ $data->pekerjaan === 'Petani' ? 'selected' : '' }}>Petani</option>
                                        <option value="IRT" {{ $data->pekerjaan === 'IRT' ? 'selected' : '' }}>IRT</option>
                                    </select>
                                    @error('pekerjaan')
                                    <span class="text-danger">Periksa Data</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="Desa">Desa</label>
                                <input type="text" name="desa" id="Desa" value="{{ $data->name_desa }}" disabled class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="rt">NO RT</label>
                                <input type="text" name="rt" id="rt" value="{{ $data->no_rt }}" disabled class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="tempatlahir">Tempat Lahir</label>
                                    <input type="text" name="tempatlahir" id="tempatlahir" class="form-control" placeholder="Tempat Lahir" value="{{ $data->tempat_lahir }}" disabled>
                                    @error('tempatlahir')
                                    <span class="text-danger">Periksa Data</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="tgllahir">Tanggal Lahir</label>
                                    <input type="date" name="tgllahir" id="tgllahir" class="form-control" value="{{ $data->tanggal_lahir }}" disabled>
                                    @error('tgllahir')
                                    <span class="text-danger">Periksa Data</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="jeniskelamin">Jenis Kelamin</label>
                                    <select name="jeniskelamin" id="jeniskelamin" class="form-control select2" disabled>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki" {{ $data->jenis_kelamin === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ $data->jenis_kelamin === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jeniskelamin')
                                    <span class="text-danger">Periksa Data</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="pendidikan">Pendidikan Terakhir</label>
                                    <select name="pendidikan" id="pendidikan" class="form-control select2" disabled>
                                        <option value="">Pilih Pendidikan</option>
                                        <option value="SD" {{ $data->pendidikan === 'SD' ? 'selected' : '' }}>SD</option>
                                        <option value="SMP" {{ $data->pendidikan === 'SMP' ? 'selected' : '' }}>SMP</option>
                                        <option value="SMA/MA" {{ $data->pendidikan === 'SMA/MA' ? 'selected' : '' }}>SMA/MA</option>
                                        <option value="SMK" {{ $data->pendidikan === 'SMK' ? 'selected' : '' }}>SMK</option>
                                        <option value="S1" {{ $data->pendidikan === 'S1' ? 'selected' : '' }}>S1</option>
                                        <option value="S2" {{ $data->pendidikan === 'S2' ? 'selected' : '' }}>S2</option>
                                        <option value="S3" {{ $data->pendidikan === 'S3' ? 'selected' : '' }}>S3</option>
                                    </select>
                                    @error('pendidikan')
                                    <span class="text-danger">Periksa Data</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control select2" disabled>
                                        <option value="">Pilih Status</option>
                                        <option value="Menikah" {{ $data->status === 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                        <option value="Belum Menikah" {{ $data->status === 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                                        <option value="Duda/Janda" {{ $data->status === 'Duda/Janda' ? 'selected' : '' }}>Duda/Janda</option>
                                    </select>
                                    @error('status')
                                    <span class="text-danger">Periksa Data</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="nama">Permohonan Surat</label>
                                    <select name="jenis_surat" id="jenis_surat" class="form-control select2" disabled>
                                        <option value="">Pilih Jenis Surat</option>
                                        @foreach ($letter as $item)
                                            <option value="{{ $item->id }}" @if ($item->id == $data->id) Selected                                   
                                            @endif>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('no_rt')
                                        <span class="text-danger">Masukan data yang benar</span>
                                    @enderror
                                </div>
                            </div>
                            @if ($admin != null)
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="status">Verifikasi</label>
                                    @if ($data->status_surat == 'Menunggu Persetujuan')
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="Diterima" >Diterima</option>
                                        <option value="Ditolak" >Ditolak</option>
                                    </select>                                        
                                    @else
                                    <select name="status" id="status" class="form-control" disabled>
                                        <option value="">Pilih</option>
                                        <option value="Diterima" @if ($data->status_surat == 'Diterima') Selected @endif>Diterima</option>
                                        <option value="Ditolak" @if ($data->status_surat == 'Ditolak') Selected @endif>Ditolak</option>
                                    </select>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="admin">Di Verifikasi Oleh</label>
                                    <input type="text" name="admin" id="admin" value="{{ $admin->admin }}" disabled class="form-control">
                                </div>
                            </div>
                            @else
                            <div class="col-lg-12 col-12">
                                <div class="form-group">
                                    <label for="status">Verifikasi</label>
                                    @if ($data->status_surat == 'Menunggu Persetujuan')
                                    <select name="status" id="status" class="form-control select2">
                                        <option value="">Pilih</option>
                                        <option value="Diterima" >Diterima</option>
                                        <option value="Ditolak" >Ditolak</option>
                                    </select>                                        
                                    @else
                                    <select name="status" id="status" class="form-control select2" disabled>
                                        <option value="">Pilih</option>
                                        <option value="Diterima" @if ($data->status_surat == 'Diterima') Selected @endif>Diterima</option>
                                        <option value="Ditolak" @if ($data->status_surat == 'Ditolak') Selected @endif>Ditolak</option>
                                    </select>
                                    @endif
                                </div>
                            </div>
                            @endif

                                <div class="form-group">
                                    <label for="des">Pesan(optional)</label>
                                    @if ($data->pesan != null)
                                    <textarea name="des" id="" cols="30" rows="10" class="form-control" disabled>{{ $data->pesan }}</textarea>    
                                    @else
                                    <textarea name="des" id="" cols="30" rows="10" class="form-control"></textarea>
                                    @endif
                                </div>
                            </div>
                            @if ($data->status_surat == 'Menunggu Persetujuan')
                            <div class="pt-2 text-end ">
                                <button type="submit" class="btn btn-success text-white"> Simpan</button>
                            </div>
                            @endif
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
      $('#status').select2();
  });
</script>
@endsection