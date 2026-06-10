<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jalur extends Model
{

    protected $fillable = [ 
        'nama_jalur', 
        'kategori', 
        'deskripsi', 
        'persyaratan', 
        'mekanisme',
        'flowchart'

        ];

 
        
        

}

