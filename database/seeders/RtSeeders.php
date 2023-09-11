<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ModelRt;

class RtSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelRt::create([
            'no_rt' => '001'
        ]);
        ModelRt::create([
            'no_rt' => '002'
        ]);
        ModelRt::create([
            'no_rt' => '003'
        ]);
        ModelRt::create([
            'no_rt' => '004'
        ]);
        ModelRt::create([
            'no_rt' => '005'
        ]);
        ModelRt::create([
            'no_rt' => '006'
        ]);
        ModelRt::create([
            'no_rt' => '007'
        ]);
        ModelRt::create([
            'no_rt' => '008'
        ]);
        ModelRt::create([
            'no_rt' => '009'
        ]);
        ModelRt::create([
            'no_rt' => '010'
        ]);
     
    }
}
