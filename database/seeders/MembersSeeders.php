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
        ]);
        ModelFamily::create([
            'user_id'  => 2,
            'no_kk'    => 2,
        ]);
        ModelFamily::create([
            'user_id'  => 3,
            'no_kk'    => 3,
        ]);
    }
}
