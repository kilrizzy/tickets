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

Route::resource('accounts', 'AccountsController');

Route::resource('users', 'UsersController');

Route::resource('permissions', 'PermissionsController');

Route::resource('tickets', 'TicketsController');

Route::resource('clients', 'ClientsController');

Route::resource('addresses', 'AddressesController');

Route::resource('statuses', 'StatusesController');

Route::resource('priorities', 'PrioritiesController');

Route::resource('logs', 'LogsController');

Route::resource('files', 'FilesController');

Route::resource('schedules', 'SchedulesController');

Route::resource('schedule_times', 'Schedule_timesController');