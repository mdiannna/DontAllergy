<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\StatisticsRequest as StoreRequest;
use App\Http\Requests\StatisticsRequest as UpdateRequest;

use App\Models\Statistics;
use App\User;
use Illuminate\Support\Facades\Auth;

class StatisticsCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Statistics');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/statistics');
        $this->crud->setEntityNameStrings('statistic', 'statistics');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        $this->crud->setFromDb();

        // COLUMNS
        $this->crud->addColumn([
           'name'      => 'type_id',
           'type'      => 'select',
           'label'     => trans('statistics.statistics_type'),
           'entity'    => 'type', 
           'attribute' => 'name', 
           'model'     => "App\Models\StatisticsTypes"
        ]);

        $this->crud->addColumn([
           'name'      => 'user_id',
           'type'      => 'select',
           'label'     => trans('statistics.user'),
           'entity'    => 'user', 
           'attribute' => 'full_name', 
           'model'     => "App\User"
        ]);

        $this->crud->addColumn([
           'name'      => 'allergy_id',
           'type'      => 'select',
           'label'     => trans('statistics.allergy'),
           'entity'    => 'allergy', 
           'attribute' => 'name', 
           'model'     => "App\Models\Allergy"
        ]);

        $this->crud->addColumn([
           'name'      => 'country_id',
           'type'      => 'select',
           'label'     => 'Country',
           'entity'    => 'country', 
           'attribute' => 'name', 
           'model'     => "App\Models\Country"
        ]);


        // FIELDS
        $this->crud->addField([
           'name'      => 'type_id',
           'type'      => 'select2',
           'label'     => trans('statistics.statistics_type'),
           'entity'    => 'type', 
           'attribute' => 'name', 
           'model'     => "App\Models\StatisticsTypes"
        ]);

        $this->crud->addField([
           'name'      => 'user_id',
           'type'      => 'select2',
           'label'     => trans('statistics.user'),
           'entity'    => 'user', 
           'attribute' => 'full_name', 
           'model'     => "App\User"
        ]);

        $this->crud->addField([
           'name'      => 'allergy_id',
           'type'      => 'select2',
           'label'     => trans('statistics.allergy'),
           'entity'    => 'allergy', 
           'attribute' => 'name', 
           'model'     => "App\Models\Allergy"
        ]);

        $this->crud->addField([
           'name'      => 'country_id',
           'type'      => 'select2',
           'label'     => 'Country',
           'entity'    => 'country', 
           'attribute' => 'name', 
           'model'     => "App\Models\Country"
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

    public function viewStatistics($id) 
    {
        // $chartType = 'line';
        $chartType = 'bar';
        // $chartType = 'column';
        // $chartType = 'pie';
        return view('statistics.view_statistics', [ 
            'id'        => $id,
            'chartType' => $chartType
        ]);
    }

    public function myStatistics() 
    {
      $statistics = Statistics::where('user_id', Auth::id())->get();

      $dataFrequenciesInit = array();

      foreach ($statistics as $statistic) {
        if($statistic->allergy && !isset($dataFrequenciesInit[$statistic->allergy->name])) {
          $dataFrequenciesInit[$statistic->allergy->name]= array(0, 0, 0, 0, 0);
        }
        if($statistic->allergy->season) {

          if($statistic->allergy->season->name == 'Winter') {
            $dataFrequenciesInit[$statistic->allergy->name][0] += $statistic->value;
          }
          if($statistic->allergy->season->name == 'Spring') {
            $dataFrequenciesInit[$statistic->allergy->name][1] += $statistic->value;
          }
          if($statistic->allergy->season->name == 'Summer') {
            $dataFrequenciesInit[$statistic->allergy->name][2] += $statistic->value;
          }
          if($statistic->allergy->season->name == 'Fall') {
            $dataFrequenciesInit[$statistic->allergy->name][3] += $statistic->value;
          }
        } else {
          if(!isset($dataFrequenciesInit[$statistic->allergy->name][4])) {
           $dataFrequenciesInit[$statistic->allergy->name][4] = 0; 
         } else {

           $dataFrequenciesInit[$statistic->allergy->name][4] += $statistic->value; 
         }

       }

     }

     $dataFrequencies = array();
     foreach ($dataFrequenciesInit as $key => $data) {
      if($data > 0) {
        $obj = array(
          "name"  => $key,
          "data" => $data
          );
        array_push($dataFrequencies, $obj);
      }
    }
    $seriesFrequencies = json_encode($dataFrequencies);


      // dd($seriesFrequencies);

      // series By country
    $dataCountriesInit = array();
    $dataCountriesInit["Other"] = 0;  

    foreach ($statistics as $statistic) {
      if($statistic->country && !isset($dataCountriesInit[$statistic->country->name])) {
        $dataCountriesInit[$statistic->country->name] = 0;
      }
      if($statistic->country) {
        $dataCountriesInit[$statistic->country->name] += $statistic->value;  
      } else {
        $dataCountriesInit["Other"] += $statistic->value;  
      }

    }

    $dataCountries = array();
    foreach ($dataCountriesInit as $key => $data) {
      if($data > 0) {
        $obj = array(
          "name"  => $key,
          "y" => $data
          );
        array_push($dataCountries, $obj);
      }
    }
    $seriesCountries = json_encode($dataCountries);


       // series By season
    $dataSeasonsInit = array();
    $dataSeasonsInit["Other"] = 0;  

    foreach ($statistics as $statistic) {
      if($statistic->allergy->season && !isset($dataSeasonsInit[$statistic->allergy->season->name])) {
        $dataSeasonsInit[$statistic->allergy->season->name] = 0;
      }
      if($statistic->allergy->season) {
        $dataSeasonsInit[$statistic->allergy->season->name] += $statistic->value;
      } else {
        $dataSeasonsInit["Other"] += $statistic->value;
      }
    }

    $dataSeasons = array();
    foreach ($dataSeasonsInit as $key => $data) {
      if($data > 0) {

        $obj = array(
          "name"  => $key,
          "y" => $data
          );
        array_push($dataSeasons, $obj);
      }
    }
    $seriesSeasons = json_encode($dataSeasons);



          // series By allergen
    $dataAllergensInit = array();

    foreach ($statistics as $statistic) {
      foreach ($statistic->allergy->allergens as $allergen) {
        if(!isset($dataAllergensInit[$allergen->name])) {
          $dataAllergensInit[$allergen->name] = 0;
        } else {
          $dataAllergensInit[$allergen->name] += $statistic->value;
        }

      }
    }

    $dataAllergens = array();
    foreach ($dataAllergensInit as $key => $data) {
      if($data > 0) {

        $obj = array(
          "name"  => $key,
          "data" =>array($data)
          );
        array_push($dataAllergens, $obj);
      }
    }
    $seriesAllergens = json_encode($dataAllergens);


    return view('statistics.my_statistics', 
      [
      'seriesFrequencies' => $seriesFrequencies,
      'seriesCountries' => $seriesCountries,
      'seriesSeasons' => $seriesSeasons,
      'seriesAllergens' => $seriesAllergens
      ]);
    }


    /**
     * General statistics for all users
     * 
     */
    public function allStatistics() 
    {
      $statistics = Statistics::all();

      $dataFrequenciesInit = array();

      foreach ($statistics as $statistic) {
        if($statistic->allergy && !isset($dataFrequenciesInit[$statistic->allergy->name])) {
          $dataFrequenciesInit[$statistic->allergy->name]= array(0, 0, 0, 0, 0);
        }
        if($statistic->allergy->season) {

          if($statistic->allergy->season->name == 'Winter') {
            $dataFrequenciesInit[$statistic->allergy->name][0] += $statistic->value;
          }
          if($statistic->allergy->season->name == 'Spring') {
            $dataFrequenciesInit[$statistic->allergy->name][1] += $statistic->value;
          }
          if($statistic->allergy->season->name == 'Summer') {
            $dataFrequenciesInit[$statistic->allergy->name][2] += $statistic->value;
          }
          if($statistic->allergy->season->name == 'Fall') {
            $dataFrequenciesInit[$statistic->allergy->name][3] += $statistic->value;
          }
        } else {
          if(!isset($dataFrequenciesInit[$statistic->allergy->name][4])) {
           $dataFrequenciesInit[$statistic->allergy->name][4] = 0; 
         } else {

           $dataFrequenciesInit[$statistic->allergy->name][4] += $statistic->value; 
         }

       }

     }

     $dataFrequencies = array();
     foreach ($dataFrequenciesInit as $key => $data) {
      if($data > 0) {
        $obj = array(
          "name"  => $key,
          "data" => $data
          );
        array_push($dataFrequencies, $obj);
      }
    }
    $seriesFrequencies = json_encode($dataFrequencies);


      // dd($seriesFrequencies);

      // series By country
    $dataCountriesInit = array();
    $dataCountriesInit["Other"] = 0;  

    foreach ($statistics as $statistic) {
      if($statistic->country && !isset($dataCountriesInit[$statistic->country->name])) {
        $dataCountriesInit[$statistic->country->name] = 0;
      }
      if($statistic->country) {
        $dataCountriesInit[$statistic->country->name] += $statistic->value;  
      } else {
        $dataCountriesInit["Other"] += $statistic->value;  
      }

    }

    $dataCountries = array();
    foreach ($dataCountriesInit as $key => $data) {
      if($data > 0) {
        $obj = array(
          "name"  => $key,
          "y" => $data
          );
        array_push($dataCountries, $obj);
      }
    }
    $seriesCountries = json_encode($dataCountries);


       // series By season
    $dataSeasonsInit = array();
    $dataSeasonsInit["Other"] = 0;  

    foreach ($statistics as $statistic) {
      if($statistic->allergy->season && !isset($dataSeasonsInit[$statistic->allergy->season->name])) {
        $dataSeasonsInit[$statistic->allergy->season->name] = 0;
      }
      if($statistic->allergy->season) {
        $dataSeasonsInit[$statistic->allergy->season->name] += $statistic->value;
      } else {
        $dataSeasonsInit["Other"] += $statistic->value;
      }
    }

    $dataSeasons = array();
    foreach ($dataSeasonsInit as $key => $data) {
      if($data > 0) {

        $obj = array(
          "name"  => $key,
          "y" => $data
          );
        array_push($dataSeasons, $obj);
      }
    }
    $seriesSeasons = json_encode($dataSeasons);



          // series By allergen
    $dataAllergensInit = array();

    foreach ($statistics as $statistic) {
      foreach ($statistic->allergy->allergens as $allergen) {
        if(!isset($dataAllergensInit[$allergen->name])) {
          $dataAllergensInit[$allergen->name] = 0;
        } else {
          $dataAllergensInit[$allergen->name] += $statistic->value;
        }

      }
    }

    $dataAllergens = array();
    foreach ($dataAllergensInit as $key => $data) {
      if($data > 0) {

        $obj = array(
          "name"  => $key,
          "data" =>array($data)
          );
        array_push($dataAllergens, $obj);
      }
    }
    $seriesAllergens = json_encode($dataAllergens);



          // series By user
    $dataUsersInit = array();

    foreach ($statistics as $statistic) {
      if(!isset($dataUsersInit[$statistic->allergy->name])) {
          $dataUsersInit[$statistic->allergy->name] = 0;
      }
      else {
          $dataUsersInit[$statistic->allergy->name] = count($statistic->allergy->users);
      }
    }

    $dataUsers = array();
    foreach ($dataUsersInit as $key => $data) {
      if($data > 0) {

        $obj = array(
          "name"  => $key,
          "data" =>array($data)
          );
        array_push($dataUsers, $obj);
      }
    }
    $seriesUsers = json_encode($dataUsers);


    return view('statistics.all_statistics', 
      [
      'seriesFrequencies' => $seriesFrequencies,
      'seriesCountries' => $seriesCountries,
      'seriesSeasons' => $seriesSeasons,
      'seriesAllergens' => $seriesAllergens,
      'seriesUsers' => $seriesUsers
      ]);
    }


}
