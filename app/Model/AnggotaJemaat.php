<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AnggotaJemaat extends Model
{
    protected $table = 'table_anggota_jemaat';

    protected $fillable = [
        'keluarga_id',
        'nama',
        'gelar',
        'tempat_lahir',
        'status_keluarga',
        'tgl_lahir',
        'jenis_kelamin',
        'alamat',
        'jenis_pekerjaan',
        'status_baptis',
        'no_surat_baptis',
        'tgl_baptis',
        'status_sidi',
        'no_surat_sidi',
        'tgl_sidi',
        'wadah_id',
        'status',
        'status_nikah'
    ];

    public function keluarga()
    {
        return $this->belongsTo('App\Model\Keluarga', 'keluarga_id', 'id');
    }

    public function wadah()
    {
        return $this->belongsTo('App\Model\Wadah', 'wadah_id', 'id');
    }
}
