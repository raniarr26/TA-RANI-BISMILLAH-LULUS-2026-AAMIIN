<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HelpdeskChat extends Model
{

    protected $fillable = [

    'helpdesk_id',
    'sender',
    'message',
    'foto'

];

}