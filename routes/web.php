<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//Must be logged in 
Route::middleware(['auth'])->group(function(){
    Route::resource('categories', 'CategoryController');

    Route::resource('nominations', 'NominationController');

    Route::resource('votings', 'VotingController');

    Route::resource('users', 'UserController');
});


// Route::group(['middleware' => ['admin']], function () {
//     Route::resource('nominationUsers', 'NominationUserController');

//     Route::resource('roles', 'RoleController');

//     Route::resource('settings', 'SettingController');

//     Route::resource('users', 'UserController');
// });

//Admin and Moderator can access this
Route::middleware(['moderator', 'auth'])->group(function(){
    Route::resource('nominationUsers', 'NominationUserController');
    
    //Users
    Route::get('users', 'UserController@index');
    Route::delete('users/{id}', 'UserController@destroy');
    Route::match(['put', 'patch'],'users/{id}', 'UserController@update');        

    //Categories
    Route::match(['put', 'patch'],'categories/{id}', 'CategoryController@update');
    Route::delete('categories/{id}', 'CategoryController@destroy');                
    Route::post('categories', 'CategoryController@create');
    Route::get('categories/create', 'CategoryController@create');      
    
    //Nominations
    Route::match(['put', 'patch'],'nominations/{id}', 'NominationController@update');
    Route::delete('nominations/{id}', 'NominationController@destroy');

    //Votings
    Route::match(['put', 'patch'],'votings/{id}', 'VotingController@update');
    Route::delete('votings/{id}', 'VotingController@destroy');


    //Visible only to admin
    Route::middleware(['admin'])->group(function(){

        Route::resource('roles', 'RoleController');

        Route::resource('settings', 'SettingController');

        Route::resource('users', 'UserController');

    }); 
});




