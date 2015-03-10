<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});



/*HOME ROUTING****************************************/

Route::get('/', array('as' => 'welcome', 'uses' => 'homeController@action_index'));

Route::get('/login', array('as' => 'mustLogin', 'uses' => 'homeController@action_index'));

Route::get('/aboutUs', array('as' => 'aboutUs', 'uses' => 'homeController@action_aboutUs'));


/*HOME ROUTING ***************************************/


/*CARS ROUTING************************ carsController  ****************/

Route::get('/cars', array('as' => 'homeCar', 'uses' => 'carsController@action_index'));

Route::get('/cars/add', array('as' => 'addCar', 'uses' => 'carsController@action_addCar'));

Route::get('/cars/info', array('as' => 'viewCar', 'uses' => 'carsController@action_viewCars'));

/*CARS ROUTING ***************************************/



/*ACCIDENTS ROUTING************************ accidentsController  ****************/

Route::group(array('before' => 'auth', 'prefix' => '/accidents/'), function()
{
	Route::get('/', array('as' => 'homeAccidents', 'uses' => 'accidentsController@action_index'));

	Route::post('/recordAccident', array('as' => 'recordAccident', 'uses' => 'accidentsController@action_recordAccidents'));

	Route::post('/addParticipant', array('as' => 'addAccidentParticipant', 'uses' => 'accidentsController@action_addParticipant'));

	Route::post('/edit/{reportNumber}', array('as' => 'editAccident', 'uses' => 'accidentsController@action_EditAccident'));

	Route::post('/edit/details/commit', array('as' => 'commitEditedAccident', 'uses' => 'accidentsController@action_CommitEditedAccident'));

	Route::get('/edit/participants/{reportNumber}/{regno}', array('as' => 'editParticipant', 'uses' => 'accidentsController@action_editParticipant'));

	Route::post('/edit/participants/commit', array('as' => 'commitEditParticipants', 'uses' => 'accidentsController@action_commitEditParticipants'));

	Route::post('/delete/{reportNumber}', array('as' => 'deleteAccident', 'uses' => 'accidentsController@action_DeleteAccident'));
});

/*ACCIDENTS ROUTING ***************************************/


/*REPORTS ROUTING************************ reportsController  ****************/

Route::group(array('before' => 'auth', 'prefix' => '/reports/'), function()
{
	Route::get('/', array('as' => 'homeReports', 'uses' => 'reportsController@action_index'));

	Route::get('/{type}', array('as' => 'moreReports', 'uses' => 'reportsController@action_categorical'));
});

/*REPORT ROUTING ***************************************/

/*ACCOUNTS ROUTING
*/
Route::post('/login', array('as' => 'login', 'uses' => 'accountController@action_login'));

Route::post('/addUser', array('as' => 'addUser', 'uses' => 'accountController@action_addUser'));

Route::get('/logout', array('as' => 'logout', 'uses' => 'accountController@action_logout'));


/*grouped account management*/
Route::group(array('before' => 'auth', 'prefix' => '/userAccount/'), function()
{
    Route::get('/', array('as' => 'homeAccounts', 'uses' => 'accountController@action_index'));

	Route::post('/edit', array('as' => 'editUser', 'uses' => 'accountController@action_editUserAccount'));

	Route::post('/delete', array('as' => 'deleteUser', 'uses' => 'accountController@action_deleteUser'));

	Route::get('/view', array('as' => 'viewUser', 'uses' => 'accountController@action_viewUserAccounts'));
});


/*ACCOUNTS ROUTING ---------------------------------------------------------------------------------*/


/*RESTFULL CONTROLLERS TO MANAGE CARS, ACCIDENTS, DRIVERS AND OWNERSHIP REPORTING 
Don't really understands how it works yet but it seems its goiong to do so much good */

Route::resource('/reports/cars/filter/', 'CarFilterController');
Route::resource('/reports/drivers/filter', 'DriverFilterController');
Route::resource('/reports/accidents/filter', 'AccidentFilterController');
Route::resource('/reports/owners/filter', 'OwnersFilterController');

/*END OF RESTFULL CONTROLLERS TO HELP IN REPORTING*/


/* DAISY DAISY DAISY DAISY DAISY DAISY DAISY DAISY DAISY DAISY DAISY DAISY 
DAISY DAISY DAISY  ---------- cars cars cars ---------- DAISY DAISY DAISY 
DAISY DAISY DAISY DAISY DAISY DAISY DAISY DAISY DAISY DAISY DAISY DAISY 
======================================================================== beginning*/

Route::resource('cars', 'CarController');
Route::get('/cars/edit/{carId}', array('as' => 'editCar', 'uses' => 'CarController@action_editCar'));
Route::post('/cars/edit/commit', array('as' => 'commitEdits', 'uses' => 'CarController@action_commitEdits'));
Route::post('/cars/delete/{regno}', array('as' => 'deleteCar', 'uses' => 'CarController@action_deleteCar'));



/*DAISY DAISY DAISY DAISY DAISY DAISY DAISY DAISY DAISY DAISY DAISY DAISY 
DAISY DAISY DAISY ----cars cars cars -----------DAISY DAISY DAISY 
DAISY DAISY DAISY DAISY DAISY DAISY DAISY DAISY DAISY DAISY DAISY DAISY 
========================================================================= ends*/


/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/



/*PERSONS ROUTING********
THEOPHILUS THEOPHILUS THEOPHILUS THEOPHILUS THEOPHILUS THEOPHILUS THEOPHILUS THEOPHILUS THEOPHILUS
 THEOPHILUS THEOPHILUS THEOPHILUS THEOPHILUS THEOPHILUS THEOPHILUS THEOPHILUS THEOPHILUS THEOPHILUS
 **************** ownersController  ****************/

Route::get('/owners', array('as' => 'homeOwners', 'uses' => 'ownersController@action_index'));

Route::post('/owners/back', array('as' => 'backFromEdit', 'uses' => 'ownersController@action_canceledEdit'));

Route::post('/owners/link', array('as' => 'linkDriverCar', 'uses' => 'ownersController@action_linkDriverToCar'));

Route::get('/owners/unlink/{driver_id}/{regno}', array('as' => 'unlinkDriverCar', 'uses' => 'ownersController@action_unlinkDriverFromCar'));

Route::get('/owners/info', array('as' => 'viewOwners', 'uses' => 'ownersController@action_viewOwners'));

Route::post('/owners/confirm', array('as' => 'confirmOwners', 'uses' => 'ownersController@action_addNewOwner'));

Route::post('/owners/add', array('as' => 'addOwners', 'uses' => 'ownersController@action_addOwner'));

/*Route::post('/owners/success', array('as' => 'successfullyAddedOwners', 'uses' => 'ownersController@action_successfullyAddedOwner'));
*/
Route::post('/owners/success', array('as' => 'successfullyAddedOwners', 'uses' => 'ownersController@action_successfullyAddedOwnerpost'));

Route::post('/owners/confirmModifications/delete/{car_matriculation}', array('as' => 'confirmModifs', 'uses' => 'ownersController@action_confirmModificationspost'));

Route::post('/owners/edit/{driver_id}', array('as' => 'editDriverInfo', 'uses' => 'ownersController@action_editDriverInfo'));

Route::post('/owners/edit/driver/commit', array('as' => 'commitEdit', 'uses' => 'ownersController@action_commitEdit'));

Route::post('/owners/delete/{car_matriculation}', array('as' => 'deleteDriver', 'uses' => 'ownersController@action_deleteOwner'));


/*PERSONS ROUTING********
THEOPHILUS THEOPHILUS THEOPHILUS THEOPHILUS THEOPHILUS THEOPHILUS THEOPHILUS THEOPHILUS THEOPHILUS
 THEOPHILUS THEOPHILUS THEOPHILUS THEOPHILUS THEOPHILUS THEOPHILUS THEOPHILUS THEOPHILUS THEOPHILUS
 **************** ownersController  ****************/

