<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allergy extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    // RELATIONS
    /**
     * An allergy can have many users
     *
     */
    public function allergies()
    {
        return $this->belongsToMany(User::class);
    }
    /**
     * An allergy can have many allergens
     *
     */
    public function allergens()
    {
        return $this->belongsToMany(Allergen::class);
    }
}
