<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ModelDesa;

class DesaSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelDesa::create([
            'name_desa' => 'Pondok Meja'
        ]);
        ModelDesa::create([
            'name_desa' => 'Maro Sebapo'
        ]);
        ModelDesa::create([
            'name_desa' => 'Sebapo'
        ]);
        ModelDesa::create([
            'name_desa' => 'Tanjung Pauh'
        ]);
        ModelDesa::create([
            'name_desa' => 'Desa Baru'
        ]);
    }
}
