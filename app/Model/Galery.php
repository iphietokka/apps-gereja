<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    protected $table = "table_galery";

    protected $fillable = [
        'title', 'gambar'
    ];
}
