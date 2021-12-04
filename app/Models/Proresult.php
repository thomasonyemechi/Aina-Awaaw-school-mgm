<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proresult extends Model
{
    use HasFactory;
    protected $fillable=[
        'sn',
        'id',
        'subject',
        'class',
        'tcode',
        'total',
        'ques',
        'ctime',
        'ctime2',
    ];
    protected $table='proresult';
}
