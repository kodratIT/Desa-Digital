<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ModelKk;

class KkSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelKk::create([
            'no_kk'     => 1505050505050505,
            'id_rt'     => 1,
            'id_rw'     => 1,
            'id_desa'   => 1,
            'alamat_kk' => 'Alam Barajo'
        ]);
        ModelKk::create([
            'no_kk'     => 1505050505050506,
            'id_rt'     => 1,
            'id_rw'     => 1,
            'id_desa'   => 2,
            'alamat_kk' => 'Pallmerah'
        ]);
        ModelKk::create([
            'no_kk'     => 1505050505050507,
            'id_rt'     => 1,
            'id_rw'     => 1,
            'id_desa'   => 3,
            'alamat_kk' => 'Kemajuan'
        ]);
        ModelKk::create([
            'no_kk'     => 1505050505050508,
            'id_rt'     => 1,
            'id_rw'     => 1,
            'id_desa'   => 3,
            'alamat_kk' => 'Pasar Jambi'
        ]);
    }
}
