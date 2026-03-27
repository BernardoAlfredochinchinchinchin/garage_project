<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonteurTaak extends Model
{
    use HasFactory;

    protected $table = 'monteur_taken';

    protected $fillable = [
        'afspraak_id',
        'uren',
        'materialen'
    ];

    public function afspraak()
    {
        return $this->belongsTo(Afspraak::class);
    }
    
}

