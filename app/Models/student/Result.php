<?php

namespace App\Models\student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable=[
        'sn',
        'id',
        'type',
        'subject',
        'class',
        'esn',
        'tcode',
        'total',
        'ques',
        'ctime',
        'ctime2',
        'term',
        'sess',
    ];
    protected $table='result';

}
