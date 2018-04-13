<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allergen extends Model
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
     * An allergen has many allergies
     *
     */
    public function allergies()
    {
        return $this->belongsToMany(Allergy::class);
    }
}
