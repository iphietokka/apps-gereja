<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    protected $table = 'table_keluarga';

    protected $fillable = [
        'gereja_id', 'nama', 'sektor_id', 'nama_ayah', 'nama_ibu', 'tgl_nikah', 'unit_id', 'no_kk'
    ];

    public function gereja()
    {
        return $this->belongsTo('App\Model\Gereja', 'gereja_id', 'id');
    }

    public function sektor()
    {
        return $this->belongsTo('App\Model\Sektor', 'sektor_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo('App\Model\Unit', 'unit_id', 'id');
    }
}
