<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = "table_berita";

    protected $fillable = [
        'title', 'isi_berita', 'user_id', 'gambar'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
