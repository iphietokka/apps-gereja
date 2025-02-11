<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PendaftaranSidi extends Model
{
    protected $table = "table_pendaftaran_sidi";

    protected $fillable = [
        'anggota_id', 'tgl_sidi', 'tempat_sidi', 'nama_pendeta'
    ];

    public function anggota()
    {
        return $this->belongsTo('App\Model\AnggotaJemaat', 'anggota_id', 'id');
    }
}
