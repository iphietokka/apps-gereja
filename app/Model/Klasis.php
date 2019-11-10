<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Klasis extends Model
{
    protected $table = 'table_klasis';

    protected $fillable = [
        'sinode', 'nama'
    ];
}
