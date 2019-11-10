<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WartaJemaat extends Model
{
    protected $table = "table_warta_jemaat";

    protected $fillable = [
        'title', 'isi_warta', 'user_id', 'gambar', 'dokumen'
    ];


    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
