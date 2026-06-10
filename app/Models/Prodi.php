<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{

    protected $table = 'prodis';

    protected $fillable = [ 
        'nama_prodi', 
        'kategori', 
        'deskripsi', 
        'akreditasi', 
        'tentang_prodi', 
        'profil_lulusan', 
        'lainnya' ];

}