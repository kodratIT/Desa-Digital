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
        Schema::create('webgis_pbb', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_nik')->references('id')->on('members_card_family');
            $table->string('no_sertifikat');
            $table->string('luas_tanah');
            $table->string('tahun_terbit');
            $table->string('status');
            $table->text('geojson');
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
        Schema::dropIfExists('webgis_pbb');
    }
};
