<?php

use Illuminate\Support\Facades\Route;
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}
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

// Route::name('admin.')->group(function(){
//  // we use Route::name to add prefix admin. to the route, to prevent route conflict with the front side

// // admin route
// Route::get('/admin', function(){

//     return view('admin.index');
// });




// });
// //Route group for middleware
// Route::group(['middleware'=>'admin'],function(){
//     //Resoure rout 
//     Route::resource('/admin/users','AdminUsersController');
    
//     });
    // Sourced 
    
    Route::get('/admin', function () {
 
        return view('admin.index');
    });
     
     
    Route::group(['middleware' => 'admin'], function () {
     
        Route::resource('/admin/users', 'AdminUsersController');
        Route::resource('/admin/posts', 'AdminPostsController',['names'=>[
 
            'index'=>'admin.posts.index',
            'create'=>'admin.posts.create',
            'store'=>'admin.posts.store',
            'edit'=>'admin.posts.edit'
         
        ]]);

        
    });