<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afspraak extends Model
{
    use HasFactory;

    protected $table = 'afspraken';

    protected $fillable = [
        'user_id',
        'naam',
        'kenteken',
        'datum',
        'status',
        'opmerkingen',
        'taken',
        'materialen'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}