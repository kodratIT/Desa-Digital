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
            $table->foreignId('user_id')->nullable()->references('id')->on('users');
            $table->foreignId('no_kk')->references('id')->on('card_family');
            $table->string('name');
            $table->string('no_nik',16)->unique();
            $table->String('tempat_lahir');
            $table->String('agama');
            $table->date('tanggal_lahir');
            $table->String('jenis_kelamin');
            $table->String('pendidikan');
            $table->String('pekerjaan');
            $table->String('geojson')->nullable();
            $table->String('status');
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
