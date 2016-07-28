<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// TODO: testing
Route::get('/', function () {
    return view('welcome');
})->name('app');

Route::get('/home', 'HomeController@index')->name('app.home');

Route::auth();

// profile routes/
Route::get('/profile', 'ProfileController@profile')->name('profile.view');
Route::post('/profile/update/information', 'ProfileController@PostAccountInfo')->name('profile.update.information');
Route::post('/profile/update/security', 'ProfileController@PostAccountCredentials')->name('profile.update.security');

// TODO: Testing
Route::get('/incidents', 'IncidentsController@index')->name('incidents.index');
Route::get('/incidents/open', 'IncidentsController@openIssues')->name('incidents.open');
Route::get('/incidents/show/{id}', 'IncidentsController@showIncident')->name('incidents.show');
Route::get('/incidents/closed', 'IncidentsController@closedIssues')->name('incidents.closed');
Route::get('/incidents/create', 'IncidentsController@createIncident')->name('incidents.create');
Route::get('/incidents/assigned/you', 'IncidentsController@assignedToYou')->name('incidents.you');
Route::post('/incidents/store', 'incidentsController@storeIncident')->name('incidents.store');

// TODO: Testing
Route::get('/abuse', 'AbuseController@publicRegister');
Route::post('/abuse/register', 'AbuseController@registerAbuse');
Route::get('/abuse/confirmed', 'AbuseController@confirmAbuse');

Route::post('/comment/{id}', 'IncidentsController@createComment')->name('comment');

// Labels
// TODO: Testing <- in progress
Route::get('/labels', 'LabelController@index')->name('label.index');
Route::get('/labels/create', 'LabelController@create')->name('label.insert');
Route::get('/labels/delete/{id}', 'LabelController@destroy')->name('label.destroy');
Route::get('/labels/update/{id}', 'LabelController@edit')->name('label.edit');
Route::post('/labels/update/{id}', 'LabelController@update')->name('label.update');
Route::post('/labels/create', 'LabelController@store')->name('label.create');