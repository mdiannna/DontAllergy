<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\AllergyRequest as StoreRequest;
use App\Http\Requests\AllergyRequest as UpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Statistics;
use App\Models\Allergy;

class AllergyCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Allergy');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/allergies');
        $this->crud->setEntityNameStrings('allergy', 'allergies');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        $this->crud->addFields([
            [
                'name'  => 'name',
                'label' => "Name",
                'type'  => 'text'
            ],
            [
                'label'     => "Season",
                'type'      => 'select2',
                'name'      => 'season_id', // the db column for the foreign key
                'entity'    => 'season', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model'     => "App\Models\Season" // foreign key model
            ],
            [       // Select2Multiple = n-n relationship (with pivot table)
                'label'     => "Allergens",
                'type'      => 'select2_multiple',
                'name'      => 'allergens', // the method that defines the relationship in your Model
                'entity'    => 'allergens', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model'     => "App\Models\Allergen", // foreign key model
                'pivot'     => true, // on create&update, do you need to add/delete pivot table entries?
            ],
            [ 
                'label'     => "Foods",
                'type'      => 'select2_multiple',
                'name'      => 'foods',
                'entity'    => 'foods',
                'attribute' => 'name', 
                'model'     => "App\Models\Food", 
                'pivot'     => true, // on create&update, do you need to add/delete pivot table entries?
            ],
            [ 
                'label'     => "Environment conditions",
                'type'      => 'select2_multiple',
                'name'      => 'environment_conditions',
                'entity'    => 'environment_conditions',
                'attribute' => 'name', 
                'model'     => "App\Models\EnvironmentCondition", 
                'pivot'     => true, // on create&update, do you need to add/delete pivot table entries?
            ],
            [
                'label' => 'Symptoms',
                'type'  => 'textarea',
                'name'  => 'symptoms'
            ],
            [
                'label' => 'Prevention',
                'type'  => 'textarea',
                'name'  => 'prevention'
            ],
            [
                'label' => 'Treatment',
                'type'  => 'textarea',
                'name'  => 'treatment'
            ]
        ]);

        $this->crud->addColumns([
            [
                'name'  => 'name',
                'lable' => 'Name'
            ],
            [
                'label'     => "Season", // Table column heading
                'type'      => "select",
                'name'      => 'season_id', // the column that contains the ID of that connected entity;
                'entity'    => 'season', // the method that defines the relationship in your Model
                'attribute' => "name", // foreign key attribute that is shown to user
                'model'     => "App\Models\Season", // foreign key model
            ],
            [
                'label'     => "Allergens", // Table column heading
                'type'      => "select_multiple",
                'name'      => 'allergens', // the method that defines the relationship in your Model
                'entity'    => 'allergens', // the method that defines the relationship in your Model
                'attribute' => "name", // foreign key attribute that is shown to user
                'model'     => "App\Models\Allergen", // foreign key model
            ],
            [ 
                'label'     => "Foods",
                'type'      => 'select_multiple',
                'name'      => 'foods',
                'entity'    => 'foods',
                'attribute' => 'name', 
                'model'     => "App\Models\Food", 
                'pivot'     => true, // on create&update, do you need to add/delete pivot table entries?
            ],
            [ 
                'label'     => "Environment conditions",
                'type'      => 'select_multiple',
                'name'      => 'environment_conditions',
                'entity'    => 'environment_conditions',
                'attribute' => 'name', 
                'model'     => "App\Models\EnvironmentCondition", 
                'pivot'     => true, // on create&update, do you need to add/delete pivot table entries?
            ],
            [
                'label' => 'Symptoms',
                'type'  => 'textarea',
                'name'  => 'symptoms'
            ],
            [
                'label' => 'Prevention',
                'type'  => 'textarea',
                'name'  => 'prevention'
            ],
            [
                'label' => 'Treatment',
                'type'  => 'textarea',
                'name'  => 'treatment'
            ]
            
        ]);

      
    }

    public function store(StoreRequest $request)
    {
        $redirect_location = parent::storeCrud($request);
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        $redirect_location = parent::updateCrud($request);
        return $redirect_location;
    }

    public function myAllergies() {
        $userId = Auth::id();
        $user = Auth::user();

        $allergies = $user->allergies;
        return view('allergies.my_allergies', ['allergies' => $allergies]);
    }

    public function myAllergiesCurrentSeason() {
        
      $month = \Carbon\Carbon::now()->month;
      if($month == 1 || $month == 2 || $month == 12) {
        $currentSeason = 'Winter';
      }
      if($month == 3 || $month == 4 || $month == 5) {
        $currentSeason = 'Spring';
      }
      if($month == 6 || $month == 7 || $month == 8) {
        $currentSeason = 'Summer';
      }
      if($month == 9 || $month == 10 || $month == 11) {
        $currentSeason = 'Fall';
      }
      $currentSeasonId = 'App\Models\Season'::where('name', $currentSeason)->first()->id; 


        $userId = Auth::id();
        $user = Auth::user();

        $allergies = $user->allergies()->where('season_id', $currentSeasonId)->get();
        return view('allergies.my_allergies', 
            ['allergies' => $allergies,
            'optionalString' => '- current season']);
    }


    public function addAllergy() 
    {
      return view('allergies.add_allergy');
    }

    public function submitAllergy(StoreRequest $request) {
        $user = Auth::user();

        $user->allergies()->syncWithoutDetaching($request->allergy_id);

        $request['user_id'] = Auth::id();
        $request['name'] = 'frequency_statistics';
        $statistics = new Statistics($request->except('_token'));
        $statistics->save();
        // $userId = Auth::id();
        
        return redirect('/my-allergies');
    }

    public function viewAllergy($id) 
    {
        $allergy = Allergy::find($id);
        return view('allergies.view_allergy', ['allergy' => $allergy]);
    }



}
