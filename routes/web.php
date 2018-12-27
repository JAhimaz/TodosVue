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

//Unavailable unless the user is logged in
Route::middleware('auth')->group(function(){
  Route::get('/', 'TodosController@index')->name('root');
  Route::get('todos', 'TodosController@index')->name('todos.index');
  Route::get('todos/create', 'TodosController@create')->name('todos.create');
  Route::post('todos', 'TodosController@store')->name('todos.store');
  Route::get('todos/{todo}/edit', 'TodosController@edit')->name('todos.edit');
  Route::put('todos/{todo}', 'TodosController@update')->name('todos.update');
  Route::put('todos/{todo}/complete', 'TodosController@complete')->name('todos.complete');
  Route::delete('todos/{todo}', 'TodosController@destroy')->name('todos.delete');

  //Logout
  Route::get('logout', 'AuthController@logout')->name('logout');
});

//Unavailable if logged in
Route::middleware('guest')->group(function(){
  //Login Routes
  Route::get('login', 'AuthController@showLogin')->name('login.show');
  Route::post('login', 'AuthController@login')->name('login.store');

  //Sign
  Route::get('signup', 'AuthController@showSignup')->name('signup.show');
  Route::post('signup', 'AuthController@signup')->name('signup.store');
});



/*
| ---------- Login (1) ------------
| 1. Create a route (GET) to the login page
| 2. Create a function to handle authentication requests (AuthenticationController)
| 3. First request the view that has a login form (Using Blade) to display to the users.
| 4. Submit create a login route (POST) for the login information.
| 4.1 Validate the user data (Never trust the user)
| 4.2 Check if the user data exists in the database.
| ----> If correct
|       Redirect to the todo page
| ----> else
|       Redirect to the login page to reattempt
|
| ---------- Sign Up (2) ------------
| 1. Create a route (GET) to the Sign up Page
| 2. Create a function to handle signup requests (AuthenticationController)
| 3. Return the sign up form (Blade)
| 4. Validate the user inputed information before storing
| 5. Store the data (Hash the password using bcrypt) (if validated correctly) and redirect to todos
|
| ---------- Middleware (3) ------------
| 1. Wrap the routes
| 2. Make function that depends whether the user is logged in to view
|
| ---------- Logging out (4) ------------
| 1. Create a route (GET) to logout
| 2. Create a function to handle logout request (AuthenticationController)
| 3. Create a button to log the user out
| 4. Redirect the user to the login page
*/
