<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable=[
        'esn',
        'rep',
        'question',
        'a',
        'b',
        'c',
        'd',
        'ca',
        'qn',
        'status',
    ];
    protected $table='question';
}
