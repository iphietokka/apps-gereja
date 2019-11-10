<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Wadah extends Model
{
    protected $table = "table_wadah";

    protected $fillable = [
        'nama', 'koordinator'
    ];
}
