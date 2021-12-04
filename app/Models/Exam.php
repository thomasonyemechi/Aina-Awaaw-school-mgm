<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable=[
        'subject',
        'class',
        'examtype',
        'eindex',
        'rep',
        'term',
        'status',
        'code',
    ];

    protected $table = 'exam';

    public $primaryKey = 'sn';

}
