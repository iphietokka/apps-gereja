<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePendaftaranBaptis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_pendaftaran_baptis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('anggota_id');
            $table->string('tgl_baptis');
            $table->string('nama_saksi');
            $table->string('tempat_baptis');
            $table->string('nama_pendeta');
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
        Schema::dropIfExists('table_pendaftaran_baptis');
    }
}
