<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proquestion extends Model
{
    use HasFactory;
    protected $fillable=[
        'class',
        'subject',
        'rep',
        'question',
        'a',
        'b',
        'c',
        'd',
        'ca',
        'qn',
        'status',
        'ctime',
    ];
    protected $table='proquestion';
}
