<?php

CRUD::resource('statistics_types', 'StatisticsTypesCrudController');
CRUD::resource('statistics', 'StatisticsCrudController');
CRUD::resource('allergies', 'AllergyCrudController');
CRUD::resource('allergens', 'AllergenCrudController');
CRUD::resource('users', 'UserCrudController');
CRUD::resource('roles', 'RoleCrudController');
CRUD::resource('groups', 'GroupCrudController');
CRUD::resource('posts', 'PostCrudController');
CRUD::resource('factors', 'FactorCrudController');
CRUD::resource('foods', 'FoodCrudController');
CRUD::resource('environment_conditions', 'EnvironmentConditionCrudController');

Route::get('/view-statistics/{id}', 'StatisticsCrudController@viewStatistics')->name('view-statistics');
