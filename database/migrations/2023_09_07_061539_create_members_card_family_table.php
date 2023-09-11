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
        Schema::create('members_card_family', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('no_kk')->references('id')->on('card_family');
            $table->String('tempat_lahir')->nullable();
            $table->String('agama')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->String('jenis_kelamin')->nullable();
            $table->String('pendidikan')->nullable();
            $table->String('pekerjaan')->nullable();
            $table->String('status')->nullable();
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
        Schema::dropIfExists('members_card_family');
    }
};
