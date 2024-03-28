<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'id',
        'name',
        'address',
        'email',
        'phone',
        'birthday',
        'city_id'
    ];


}
