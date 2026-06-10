<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Helpdesk extends Model
{
    protected $fillable = [

    'nama',
    'email',
    'nohp',
    'kategori',
    'pesan',
    'balasan',
    'status',
    'foto'

    ];

}
