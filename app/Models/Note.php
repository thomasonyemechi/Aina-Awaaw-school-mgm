<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable=[
        'class',
        'subject',
        'week',
        'ctime',
        'rep',
        'rep2',
        'des',
        'note',
    ];
    protected $table='note';

}
