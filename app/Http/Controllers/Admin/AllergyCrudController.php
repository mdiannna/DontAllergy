<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\AllergyRequest as StoreRequest;
use App\Http\Requests\AllergyRequest as UpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Statistics;

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
                'label' => 'Symptoms',
                'type'  => 'textarea',
                'name'  => 'symptoms'
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
                'label' => 'Symptoms',
                'type'  => 'textarea',
                'name'  => 'symptoms'
            ]
            
        ]);

        // ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

        // ------ CRUD BUTTONS
        // possible positions: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others;
        // $this->crud->addButton($stack, $name, $type, $content, $position); // add a button; possible types are: view, model_function
        // $this->crud->addButtonFromModelFunction($stack, $name, $model_function_name, $position); // add a button whose HTML is returned by a method in the CRUD model
        // $this->crud->addButtonFromView($stack, $name, $view, $position); // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\buttons
        // $this->crud->removeButton($name);
        // $this->crud->removeButtonFromStack($name, $stack);
        // $this->crud->removeAllButtons();
        // $this->crud->removeAllButtonsFromStack('line');

        // ------ CRUD ACCESS
        // $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete']);
        // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);

        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');

        // ------ CRUD DETAILS ROW
        // $this->crud->enableDetailsRow();
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
        // NOTE: you also need to do overwrite the showDetailsRow($id) method in your EntityCrudController to show whatever you'd like in the details row OR overwrite the views/backpack/crud/details_row.blade.php

        // ------ REVISIONS
        // You also need to use \Venturecraft\Revisionable\RevisionableTrait;
        // Please check out: https://laravel-backpack.readme.io/docs/crud#revisions
        // $this->crud->allowAccess('revisions');

        // ------ AJAX TABLE VIEW
        // Please note the drawbacks of this though:
        // - 1-n and n-n columns are not searchable
        // - date and datetime columns won't be sortable anymore
        // $this->crud->enableAjaxTable();

        // ------ DATATABLE EXPORT BUTTONS
        // Show export to PDF, CSV, XLS and Print buttons on the table view.
        // Does not work well with AJAX datatables.
        // $this->crud->enableExportButtons();

        // ------ ADVANCED QUERIES
        // $this->crud->addClause('active');
        // $this->crud->addClause('type', 'car');
        // $this->crud->addClause('where', 'name', '==', 'car');
        // $this->crud->addClause('whereName', 'car');
        // $this->crud->addClause('whereHas', 'posts', function($query) {
        //     $query->activePosts();
        // });
        // $this->crud->addClause('withoutGlobalScopes');
        // $this->crud->addClause('withoutGlobalScope', VisibleScope::class);
        // $this->crud->with(); // eager load relationships
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function myAllergies() {
        $userId = Auth::id();
        $user = Auth::user();

        $allergies = $user->allergies;
        return view('allergies.my_allergies', ['allergies' => $allergies]);
    }

    public function addAllergy() 
    {
      return view('allergies.add_allergy');
    }

    public function submitAllergy(StoreRequest $request) {
        $user = Auth::user();
        $user->allergies()->attach($request->allergy_id);

        $request['user_id'] = Auth::id();
        $request['name'] = 'frequency_statistics';
        $statistics = new Statistics($request->except('_token'));
        $statistics->save();
        // $userId = Auth::id();
        
        return redirect('/my-allergies');
    }
}
