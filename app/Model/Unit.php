<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'table_unit';

    protected $fillable = [
        'sektor_id', 'nama', 'ketua_unit'
    ];

    public function sektor()
    {
        return $this->belongsTo('App\Model\Sektor', 'sektor_id', 'id');
    }
}
