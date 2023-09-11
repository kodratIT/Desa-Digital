<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ModelSurat;

class SuratSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelSurat::create([
            'name'  => 'Surat Keterangan Tidak Mampu',
            'user_id'   => 2
        ]);
        ModelSurat::create([
            'name'  => 'Surat Izin Usaha',
            'user_id'   => 2
        ]);
        ModelSurat::create([
            'name'  => 'Surat Akta Tanah',
            'user_id'   => 2
        ]);
    }
}
