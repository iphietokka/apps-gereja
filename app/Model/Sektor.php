<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sektor extends Model
{
    protected $table = 'table_sektor';

    protected $fillable = [
        'nama', 'gereja_id', 'user_id'
    ];

    public function gereja()
    {
        return $this->belongsTo('App\Model\Gereja', 'gereja_id', 'id');
    }
}
