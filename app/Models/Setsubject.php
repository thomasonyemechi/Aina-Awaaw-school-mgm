<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setsubject extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'sid',
        'classid',
    ];
    protected $table = 'setsubject';
}
