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

Route::group(["middleware" => "auth"], function () {
	Route::group(['prefix' => ''], function() {
		Route::resource('task','TaskController');
	});
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name("home");

Route::post('/login/custom', [
	'uses' => 'LoginController@login',
	'as' => 'login.custom'
]);

Route::group(["middleware" => "auth"], function(){

		Route::get('/home', function(){
		return view('home');
		})->name('home');
		Route::get('/admin/index', function(){
		return view('admin.index');
		})->name('admin.index');

	Route::group(["prefix" => "admin"], function () {
		//user
        Route::get("userlist", "AdminController@index")->name("admin.indexuser");
        Route::get("createUser", "AdminController@showCreateForm")->name("admin.userCreate");
        Route::post("store", "AdminController@store")->name("admin.createUser");
        Route::get("edit/{userId}", "AdminController@showEditForm")->name("admin.edituser");
		Route::post("update/{userId}", "AdminController@update")->name("admin.updateuser");
        Route::get("delete/{userId}", "AdminController@delete")->name("admin.deleteuser");
        //task
        Route::get("tasklist", "AdminController@indexTask")->name("admin.indextask");
        Route::get("taskCreate/{userId}", "AdminController@showCreateTask")->name("admin.taskCreate");
        Route::post("createTask/{userId}", "AdminController@storeTask")->name("admin.createTask");
        Route::get("editTask/{taskId}", "AdminController@showEditTask")->name("admin.edittask");
        Route::post("updatetask/{taskId}", "AdminController@updateTask")->name("admin.updatetask");
        Route::get("deletetask/{taskId}", "AdminController@deleteTask")->name("admin.deletetask");
    });
});



