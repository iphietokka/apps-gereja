<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gereja extends Model
{
    protected $table = 'table_gereja';

    protected $fillable = [
        'klasis_id', 'nama', 'alamat', 'no_telp', 'ketua', 'sekretaris', 'penghantar_jemaat'
    ];

    public function klasis()
    {
        return $this->belongsTo('App\Model\Klasis', 'klasis_id', 'id');
    }

    public function sektor()
    {
        return $this->hasMany('App\Model\Sektor');
    }
}
