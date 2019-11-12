<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PendaftaranBaptis extends Model
{
    protected $table = "table_pendaftaran_baptis";

    protected $fillable = [
        'anggota_id', 'tgl_baptis', 'nama_saksi', 'tempat_baptis', 'nama_pendeta'
    ];

    public function anggota()
    {
        return $this->belongsTo('App\Model\AnggotaJemaat', 'anggota_id', 'id');
    }
}
