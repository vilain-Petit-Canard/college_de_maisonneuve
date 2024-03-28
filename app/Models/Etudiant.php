<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'id',
        'adresse',
        'telephone',
        'date_de_naissance',
        'ville_id' 
    ];


}
