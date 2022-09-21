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

//Route to display post
Route::get('/post/{id}',['as'=>'home.post','uses'=>'AdminPostsController@post']);

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

        //Categories controller 
        Route::resource('/admin/categories','AdminCategoriesController',[
            'names'=>[
 
                'index'=>'admin.categories.index',
                'create'=>'admin.categories.create',
                'store'=>'admin.categories.store',
                'edit'=>'admin.categories.edit'
        ]]);
        
        //Media files
        Route::resource('/admin/media','AdminMediasController');
        // Route::resource('/admin/media','AdminMediasController',['names'=>[
        //     'index'=>'admin.media.index'
        // ] ]);
      // defining route name , and controller this way

     // Route::get('/admin/media/uploads',['as'=>'admin.media.uploads','uses'=>'AdminMediasController@store']);
   
   //Comments Routes
   Route::resource('/admin/comments','PostCommentsController');
   //Replies
   Route::resource('/admin/comment/replies','CommentRepliesController');
   
   
    });