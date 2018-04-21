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
        return $this->belongsToMany('App\User');
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
     * An allergy can have many food causes
     *
     */
    public function foods()
    {
        return $this->belongsToMany(Food::class, 'allergies_foods');
    }

    /**
     * An allergy can have many environment condition causes
     *
     */
    public function environment_conditions()
    {
        return $this->belongsToMany(EnvironmentCondition::class, 'allergies_env_conditions', 'allergy_id', 'env_condition_id');
    }



    public function getThreeAllergensAttribute()
    {
        return $this->allergens()->take(3)->get();
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
