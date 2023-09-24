<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ModelFamily;

class MembersSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelFamily::create([
            'user_id'  => 1,
            'no_kk'    => 1,
            'name'     => 'Super-admin',
            'no_nik'   => '1505051911010001',
            'tempat_lahir'  =>'Tempino',
            'agama'     => 'Islam',
            'tanggal_lahir' =>'2023-01-01',
            'jenis_kelamin' => 'Laki-laki',
            'pendidikan'    => 'SMA/MA',
            'pekerjaan'     => 'Pelajar/mahasiswa',
            'status'        => 'Belum Menikah' 
        ]);
        ModelFamily::create([
            'user_id'  => 2,
            'no_kk'    => 2,
            'name'     => 'Admin',
            'no_nik'   => '1505051911010101',
            'tempat_lahir'  =>'Tempino',
            'agama'     => 'Islam',
            'tanggal_lahir' =>'2023-01-01',
            'jenis_kelamin' => 'Laki-laki',
            'pendidikan'    => 'SMA/MA',
            'pekerjaan'     => 'Pelajar/mahasiswa',
            'status'        => 'Belum Menikah' 
        ]);
        ModelFamily::create([
            'user_id'  => 3,
            'no_kk'    => 3,
            'name'     => 'Kodrat',
            'no_nik'   => '1505051911040001',
            'tempat_lahir'  =>'Tempino',
            'agama'     => 'Islam',
            'tanggal_lahir' =>'2023-01-01',
            'jenis_kelamin' => 'Laki-laki',
            'pendidikan'    => 'SMA/MA',
            'pekerjaan'     => 'Pelajar/mahasiswa',
            'status'        => 'Belum Menikah' 
        ]);
    }
}
