<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // 👈 Zorg dat role hier staat
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // 👇 Deze methode toevoegen
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // 👇 Deze methode toevoegen
    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }
}