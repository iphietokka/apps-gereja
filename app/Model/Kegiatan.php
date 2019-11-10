<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = "table_kegiatan";

    protected $fillable = [
        'nama', 'jam_mulai', 'jam_selesai', 'gambar', 'tempat', 'tanggal', 'nama_pengkhotbah'
    ];
}
