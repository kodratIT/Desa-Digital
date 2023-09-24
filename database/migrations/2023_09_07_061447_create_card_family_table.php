<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_family', function (Blueprint $table) {
            $table->id();
            $table->string('no_kk',20)->unique();
            $table->biginteger('id_rt');
            $table->biginteger('id_rw');
            $table->biginteger('id_desa');
            $table->String('alamat_kk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_family');
    }
};
