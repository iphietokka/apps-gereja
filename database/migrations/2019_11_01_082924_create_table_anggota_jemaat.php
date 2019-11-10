<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAnggotaJemaat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_anggota_jemaat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('keluarga_id');
            $table->string('nik');
            $table->string('nama');
            $table->string('gelar')->nullable();
            $table->enum('status_nikah', ['Nikah', 'Belum Nikah', 'Cerai'])->nullable();
            $table->string('tempat_lahir');
            $table->string('status_keluarga')->nullable();
            $table->string('tgl_lahir');
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->text('alamat')->nullable();
            $table->string('jenis_pekerjaan')->nullable();
            $table->enum('status_baptis', ['Belum', 'Sudah'])->nullable();
            $table->string('no_surat_baptis')->nullable();
            $table->string('tgl_baptis')->nullable();
            $table->enum('status_sidi', ['Belum', 'Sudah'])->nullable();
            $table->string('no_surat_sidi')->nullable();
            $table->string('tgl_sidi')->nullable();
            $table->integer('wadah_id')->nullable();
            $table->enum('status', ['Hidup', 'Meninggal']);
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
        Schema::dropIfExists('table_anggota_jemaat');
    }
}
