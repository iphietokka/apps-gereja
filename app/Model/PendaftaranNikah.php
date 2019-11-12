<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PendaftaranNikah extends Model
{
    protected $table = "table_pendaftaran_nikah";

    protected $fillable = [
        'anggota_id', 'nama_pasangan', 'tanggal_nikah', 'tempat_nikah', 'saksi_pria', 'saksi_wanita', 'nama_pendeta'
    ];

    public function anggota()
    {
        return $this->belongsTo('App\Model\AnggotaJemaat', 'anggota_id', 'id');
    }
}
