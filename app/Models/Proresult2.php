<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proresult2 extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'subject',
        'class',
        'qn',
        'tcode',
        'score',
        'myoption',
        'ctime',
    ];
    protected $table='proresult2';
}
