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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');



/*------------------------------------------------
  Route For frontend
------------------------------------------------*/
Route::get('/', function () {
    return view('frontend.home');
});
Route::get('/','App\Http\Controllers\Frontend\Homcontroller@index')->name('home');






/*------------------------------------------------
  Route For Backend
------------------------------------------------*/
Route::get('/admin', function () {
    return view('backend.admindashboard');
})->middleware(['auth','controll'])->name('adminDashboard');

Route::get('/addadmin',function(){
  return view('auth.backend.adminregester');
})->name('admin.add');



Route::group(['prefix'=>'product'],function(){
    Route::get('/add','App\Http\Controllers\Backend\productController@index')->name('viewforaddproduct');
    Route::post('/store','App\Http\Controllers\Backend\productController@store')->name('store');
    Route::get('/manage','App\Http\Controllers\Backend\productController@create')->name('manage');
    Route::get('/showforupdate/{id}','App\Http\Controllers\Backend\productController@show')->name('showforupdate');
    Route::post('/update/{id}','App\Http\Controllers\Backend\productController@update')->name('productupdate');
    Route::get('/delete/{id}','App\Http\Controllers\Backend\productController@destroy')->name('productdelete');
});

require __DIR__.'/auth.php';

