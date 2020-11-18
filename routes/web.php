<?php

use Illuminate\Support\Facades\Route;

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


//middleware('checkadmin')->
 Route::middleware('checklog')->prefix('admin')->name('admin.')->group(function () { 
    Route::prefix('user')->name('user.')->group(function () { 
        Route::get('index','UserController@index')->name('index');

        Route::get('register','UserController@create')->name('register'); 
        Route::post('store','UserController@store')->name('store');  

        Route::get('edit/525{id}125.html','UserController@edit')->name('edit');
        Route::post('update/{id}','UserController@update')->name('update'); 

        Route::get('destroy/aa{id}as1.html','UserController@destroy')->name('destroy');
        Route::get('users-information/150{id}41.html','UserController@showhistory')->name('show');
        Route::post('reset/{id}','UserController@show')->name('reset');
    });
    Route::prefix('class')->name('class.')->group(function () { 
        Route::get('index','ClassController@index')->name('index');

        Route::get('create','ClassController@create')->name('create'); 
        Route::post('store','ClassController@store')->name('store');  

        Route::get('edit/152{id}33.html','ClassController@edit')->name('edit');
        Route::post('update/{id}','ClassController@update')->name('update'); 

        Route::get('destroy/{id}','ClassController@destroy')->name('destroy');
    });
    Route::prefix('event')->name('event.')->group(function () { 
        Route::get('index','EventController@index')->name('index');

        Route::get('showlist/152{id}.html','EventController@show')->name('showlist'); 

        Route::get('create','EventController@create')->name('create'); 
        Route::post('store','EventController@store')->name('store');  

        Route::get('edit/123{id}154.html','EventController@edit')->name('edit');
        Route::post('update/{id}','EventController@update')->name('update'); 
        Route::post('valu/{id}','EventController@valu')->name('valu');

        Route::get('destroy/{id}','EventController@destroy')->name('destroy');
    });
    Route::prefix('noti')->name('noti.')->group(function () { 
        Route::get('index','NotiController@index')->name('index');

        Route::get('create','NotiController@create')->name('create'); 
        Route::post('store','NotiController@store')->name('store');  

        Route::get('edit/4445{id}.html','NotiController@edit')->name('edit');
        Route::post('update/{id}','NotiController@update')->name('update'); 

        Route::get('destroy/{id}','NotiController@destroy')->name('destroy');
    });
    Route::prefix('evaluate')->name('evaluate.')->group(function () { 
        Route::get('index','EvaluateController@index')->name('index');

        Route::get('create','EvaluateController@create')->name('create'); 
        Route::post('store','EvaluateController@store')->name('store');  

        Route::get('show/415s{id}.html','EvaluateController@show')->name('show');

        Route::get('edit/516{id}.html','EvaluateController@edit')->name('edit');
        Route::post('valu/{id}','AjaxController@getvalue')->name('valu');

        Route::post('update/{id}','EvaluateController@update')->name('update'); 

        Route::get('destroy/{id}','EvaluateController@destroy')->name('destroy');
        Route::get('add-user/516{id}.html','EvaluateController@addget')->name('addget');
        Route::post('update','EvaluateController@addpost')->name('addpost');
        
    });
});


Route::middleware('checklead')->prefix('lead')->name('lead.')->group(function () { 
    Route::get('index','lead\EventController@show')->name('index');
    
    Route::get('show','lead\UserController@index')->name('show'); 

    Route::get('register','lead\UserController@create')->name('register'); 
    Route::post('store','lead\UserController@store')->name('store');  

    Route::post('reset/{id}','lead\UserController@show')->name('reset');

    Route::get('evaluate','lead\EvaluateController@index')->name('evaluate');

    Route::get('evaluatesv/562{id}54.html','lead\EvaluateController@show')->name('evaluatesv');

    Route::get('event','lead\EventController@show')->name('event'); 
    
    Route::post('valu/{id}','lead\EvaluateController@update')->name('valu');

    Route::post('eventregister','lead\EventController@create')->name('eventregister'); 
    Route::get('notification','lead\EventController@index')->name('notification');
    // Route::post('update/{id}','UserController@update')->name('update'); 

    Route::post('destroy/{id}','lead\EventController@destroy')->name('destroy');
});

Route::middleware('auth')->prefix('user')->name('user.')->group(function () { 
    Route::get('index','user\UserController@index')->name('index');
    
    Route::get('show','user\UserController@index')->name('show'); 

    Route::get('evaluate','user\EvaluateController@index')->name('evaluate');

    Route::get('evaluatesv/5266{id}55.html','user\EvaluateController@show')->name('evaluatesv');

    Route::get('event','user\EventController@show')->name('event'); 
    
    Route::post('valu/{id}','user\EvaluateController@update')->name('valu');

    Route::post('eventregister','user\EventController@create')->name('eventregister'); 
});
Route::fallback(function () {
    return view('404');
});

Auth::routes();
Auth::routes(['verify' => true]);
//AjaxController
Route::post('getdistricts','AjaxController@getdistricts')->name('getdistricts');
Route::post('getwards','AjaxController@getwards')->name('getwards');
// Route::post('index','CommentController@index')->name('index');
Route::post('change','lead\UserController@change')->name('change');
Route::post('destroy/{id}','lead\EventController@destroy')->name('destroy');
Route::post('editpf','lead\UserController@update')->name('editpf');
Route::post('editimg','lead\UserController@edit')->name('editimg');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/welcome', 'HomeController@red')->name('welcome');
Route::get('/admin', 'HomeController@admin')->name('home');
Route::get('/', 'PostContoller@homepage')->name('index');
Route::get('/post/55{id}215.html', 'PostContoller@show')->name('post');
Route::get('/about', 'PostContoller@ab')->name('about');
Route::get('/contact', 'PostContoller@ct')->name('contact');
Route::post('oldpost', 'PostContoller@oldpost')->name('oldpost');
