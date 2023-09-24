<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'super-admin'])->givePermissionTo('data.master','manage.access','jenis.surat','data.warga','data.kk','data.desa','data.rt','data.rw');
        Role::create(['name' => 'admin'])->givePermissionTo('data.warga','pengajuan.index','pengajuan.create','pengajuan.update','laporan.index','laporan.update','laporan.create','cetak.surat','digital.signature');
        // Role::create(['name' => 'ketua-rt'])->givePermissionTo('jenis.surat','data.warga','data.kk','data.desa','data.rt');
        Role::create(['name' => 'user'])->givePermissionTo('pengajuan.index','pengajuan.create','laporan.index','laporan.create');

    }
}
