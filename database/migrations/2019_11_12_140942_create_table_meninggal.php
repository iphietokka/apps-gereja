<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMeninggal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_meninggal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('anggota_id');
            $table->string('tanggal_kematian');
            $table->string('tanggal_pemakaman');
            $table->string('tempat_pemakaman');
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
        Schema::dropIfExists('table_meninggal');
    }
}
