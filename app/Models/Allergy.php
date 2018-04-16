<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Allergy extends Model
{
    use CrudTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'season_id'
    ];


    // RELATIONS
    /**
     * An allergy can have many users
     *
     */
    public function users()
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

    /**
     * An allergy have one season
     *
     */
    public function season()
    {
        return $this->belongsTo(Season::class);
    }
}
