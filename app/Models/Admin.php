<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    

    protected $fillable = [
        'id', 'firstname', 'lastname', 'city', 'level', 'email', 'phone', 'password','p1','p2','p3','p4','p5','p6','p7','p8','status',
        'image','address','gender'
    ];
    
    
    protected $table = 'admin';
    protected $primaryKey = 'sn';
}
