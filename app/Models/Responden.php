<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responden extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'nohp',
        'sekolah',
        'jk',
        'q1',
        'q2',
        'q3'
    ];
}