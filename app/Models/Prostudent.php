<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prostudent extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','firstname', 'lastname',
        'dob', 'gender', 'address' , 'class','phone',
        'subjects','tcode','ctime','rep','approved','edate','etime'
    ];

    protected $table='prostudent';

    protected $primaryKey = 'sn';
}
