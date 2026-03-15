<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afspraak extends Model
{
    use HasFactory;

    protected $table = 'afspraken'; 
    
    // Voeg 'status' hier toe!
    protected $fillable = ['naam', 'kenteken', 'datum', 'status'];
}