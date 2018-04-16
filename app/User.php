<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // FUNCTIONS

    public function isAdmin()
    {
        return ($this->role_id == 1);
    }

    // RELATIONS

    /**
     * An user can have many allergies
     *
     */
    public function allergies()
    {
        return $this->belongsToMany(Allergy::class);
    }
    
}
