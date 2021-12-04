<?php

namespace App\Models\student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result2 extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'type',
        'qn',
        'tcode',
        'esn',
        'score',
        'myoption',
    ];
    protected $table='result2';
}
