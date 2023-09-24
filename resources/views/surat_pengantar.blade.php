<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>

        @font-face {
            font-family: 'Times New Roman';
            src: {{url('../fonts/times.ttf')}} format('truetype');
            font-weight: normal;
            font-style: normal;
        }
        body {
            font-family: 'Times New Roman', sans-serif; /* Menggunakan Times New Roman */
        }
        *{
            margin: 0;
        }
        /* Style untuk elemen header kop surat */
        .header {
            text-align: center;
            padding-top: 20px;
            background:#fff;
            color: black; /* Warna teks */
        }
        .header h1 {
            font-size: 24px; /* Ukuran font */
        }
        .header p {
            font-size: 16px;
        }

        /* Style untuk alamat perusahaan */
        .alamat {
            margin-top: 20px;
            text-align: left;
            margin-left: 30px;
            margin-right: 30px;
        }
        .alamat table{
            margin-left: 50px;
        }

        /* Style untuk garis pemisah */
        .garis {
            border-top: 3px solid black; /* Warna garis pemisah */
            margin: 1px 0;
        }
        
        /* Style untuk tanggal */
        .tanggal {
            text-align: right;
            margin-top: 10px;
        }
        .container{
            padding: 0px 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>KETUA RUKUN TETANGGA {{ $admin->no_rt }}</h2>
        <h2>KECAMATAN MESTONG</h2>
        <h2>DESA {{ hurufUpper($admin->name_desa) }}</h2>
    </div>
    <div class="alamat">
        <div class="garis"></div>
    </div>
    <div class="container">
        <h4 class="text-center mt-4">SURAT PENGANTAR</h4>
        {{-- <h6 class="text-center mt-2">Nomor : .......................</h6> --}}
        <div class="alamat">
            <p class="mt-3" >Saya yang bertanda tangan di bawah ini atas nama Ketua RT {{ $admin->no_rt }} Desa {{ $admin->name_desa }} Kecamatan Mestong, menerangkan kepada :</p>
          <table>
            <tbody>
                <tr>
                    <td>Nama</td>
                    <td></td>
                    <td class="px-2" >:</td>
                    <td class="px-2">{{ $data->name }}</td>
                </tr>
                <tr>
                    <td>N.I.K</td>
                    <td></td>
                    <td class="px-2">:</td>
                    <td class="px-2" >{{ $data->no_nik }}</td>
                </tr>
                <tr>
                    <td>Tempat/tanggal lahir </td>
                    <td></td>
                    <td class="px-2">:</td>
                    <td class="px-2">{{ $data->tempat_lahir }}/{{ formatDate($data->tanggal_lahir, 'd F Y') }}</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td></td>
                    <td class="px-2">:</td>
                    <td class="px-2" >{{ $data->agama }}</td>
                </tr>
                <tr>
                    <td>Status Pernikahan</td>
                    <td></td>
                    <td class="px-2">:</td>
                    <td class="px-2">{{ $data->status }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td></td>
                    <td class="px-2">:</td>
                    <td class="px-2">{{ $data->alamat_kk }}</td>
                </tr>
                <tr>
                    <td class="text-start">Keperluan</td>
                    <td></td>
                    <td class="px-2">:</td>
                    <td class="px-2" >Pembuatan <u>{{ $data->jenis_surat }}</u> yang akan digunakan {{ $data->pesan }}</td>
                </tr>
            </tbody>
          </table>
          <p class="mt-3 mb-5">Demikian surat pengantar ini kami berikan guna proses tindak lanjut ke tingkat selanjutnya.</p>
          
          <table style="width: 100%;">
            <thead>

            </thead>
            <tbody>
                <tr>
                    <td style="width: 50%;"></td>
                    <td>
                        Pondok Meja,{{ formatDate($data->dibuat, 'd F Y') }} 
                        <p class="">Ketua RT. {{ $admin->no_rt }}</p>
                        <img src="{{ asset('signature/' . $admin->signature) }}" alt="Signature" class="w-25" loading="lazy">
                        <P class="mt-1">{{ $admin->admin }}</P>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
    <div class="konten">
        <!-- Isi surat Anda di sini -->
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
