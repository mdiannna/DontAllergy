<?php

namespace App;

use App\Models\Role;
use App\Models\Group;
use App\Models\Allergy;
use Backpack\CRUD\CrudTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use CrudTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role_id'
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

    /**
     * An user have a role
     *
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * An user can have many groups
     *
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class)->withPivot('created_at', 'updated_at');
    }
    
    // ACCESSORS
    public function getFullNameAttribute()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

}
