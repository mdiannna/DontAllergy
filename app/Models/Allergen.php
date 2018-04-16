<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Allergen extends Model
{
    use CrudTrait;
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
