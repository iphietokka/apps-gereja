<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGereja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_gereja', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('klasis_id');
            $table->string('nama');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('ketua');
            $table->string('sekretaris');
            $table->string('penghantar_jemaat');
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
        Schema::dropIfExists('table_gereja');
    }
}
