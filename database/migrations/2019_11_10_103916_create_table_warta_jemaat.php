<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWartaJemaat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_warta_jemaat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('isi_warta');
            $table->string('gambar')->nullable();
            $table->integer('user_id');
            $table->string('dokumen')->nullable();
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
        Schema::dropIfExists('table_warta_jemaat');
    }
}
