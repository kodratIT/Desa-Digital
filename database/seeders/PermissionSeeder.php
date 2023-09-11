<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'data.master']);
        Permission::create(['name' => 'manage.access']);
        Permission::create(['name' => 'data.warga']);
        Permission::create(['name' => 'data.rt']);
        Permission::create(['name' => 'data.kk']);
        Permission::create(['name' => 'data.desa']);
        Permission::create(['name' => 'jenis.surat']);
        Permission::create(['name' => 'pengajuan.index']);
        Permission::create(['name' => 'pengajuan.create']);
        Permission::create(['name' => 'pengajuan.update']);
        Permission::create(['name' => 'laporan.index']);
        Permission::create(['name' => 'laporan.create']);
        Permission::create(['name' => 'laporan.update']);
    }
}
