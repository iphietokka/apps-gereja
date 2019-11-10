<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKeluarga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_keluarga', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('gereja_id');
            $table->integer('sektor_id');
            $table->integer('unit_id');
            $table->string('no_kk');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('tgl_nikah');
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
        Schema::dropIfExists('table_keluarga');
    }
}
