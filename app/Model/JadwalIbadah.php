<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JadwalIbadah extends Model
{
    protected $table = "table_jadwal_ibadah";

    protected $fillable = [
        'nama_ibadah', 'tanggal', 'jam_mulai', 'jam_selesai', 'tempat', 'nama_pengkhotbah'
    ];
}
