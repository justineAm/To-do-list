<?php
namespace App\Http\Controllers;

use App\TaskList;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\ Request;

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

//profiles controller
Route::get('/profile/{user}', 'ProfilesController@index')->name('profiles.index');
Route::get('/profile/{user}/show', 'ProfilesController@show')->name('profiles.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');


//Home Controller
Route::get('/home', 'HomeController@index')->name('home');


//Task Controller
Route::post('save_new_tasklist', 'TaskListController@store');
Route::get('/tasks/{list_id}', 'TaskListController@show');
Route::post('/tasks/{list_id}/new_task', 'TaskListController@addTask');
Route::post('/tasks/{list_id}/mark_as_done', 'TaskListController@markTaskAsDone');
Route::get('/tasks/{list_id}/destroy', 'TaskListController@destroy');
Route::get('/tasks/{list_id}/delete', 'TaskListController@delete');

//FeedBack Controller
Route::get('/feedback', 'FeedbackController@index')->name('feedback');
Route::post('/addComment', 'FeedbackController@addComment');
Route::get('/show/{feedback}', 'FeedbackController@show')->name('feedback');







