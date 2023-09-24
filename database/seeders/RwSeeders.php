<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ModelRw;

class RwSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       ModelRw::create([
            'no_rw' => '000'
        ]);
       ModelRw::create([
            'no_rw' => '001'
        ]);
       ModelRw::create([
            'no_rw' => '002'
        ]);
       ModelRw::create([
            'no_rw' => '003'
        ]);
       ModelRw::create([
            'no_rw' => '004'
        ]);
       ModelRw::create([
            'no_rw' => '005'
        ]);
       ModelRw::create([
            'no_rw' => '006'
        ]);
       ModelRw::create([
            'no_rw' => '007'
        ]);
       ModelRw::create([
            'no_rw' => '008'
        ]);
       ModelRw::create([
            'no_rw' => '009'
        ]);
       ModelRw::create([
            'no_rw' => '010'
        ]);
    }
}
