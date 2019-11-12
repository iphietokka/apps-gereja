<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Meninggal extends Model
{
    protected $table = "table_meninggal";

    protected $fillable = [
        'anggota_id', 'tanggal_kematian', 'tanggal_pemakaman', 'tempat_pemakaman'
    ];

    public function anggota()
    {
        return $this->belongsTo('App\Model\AnggotaJemaat', 'anggota_id', 'id');
    }
}
