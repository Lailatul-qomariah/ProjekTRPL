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
//route all user
Route::group(['middleware'=> 'auth'], function(){
  Route::get('/dashboard', 'HomeController@index')->name('dashboard');
  Route::get('/paketdesign', 'CPaketDesign@index')->name('paketdesign1'); //design Interior
  Route::get('/paketdesign/{paketdesign}', 'CPaketDesign@show');
  Route::get('/designrumah','C_DataPaketDesignRumah@index')->name('designrumah'); // design rumah
  Route::get('/designrumah/{m_DataPaketDesign}','C_DataPaketDesignRumah@show');
});

// Route user = designer
Route::group(['middleware'=>['auth','CheckRole:Designers']], function(){
  Route::get('/paketdesign/create', 'CPaketDesign@create'); // paket dessign interior
  Route::post('/paketdesign', 'CPaketDesign@store');
  // Route::delete('/paketdesign/{paketdesign}', 'CPaketDesign@destroy'); //hapus data permanen
  Route::get('/paketdesign/{paketdesign}/edit', 'CPaketDesign@edit');
  Route::patch('/paketdesign/{paketdesign}','CPaketDesign@update');
  Route::get('/designrumah/create','C_DataPaketDesignRumah@create'); //paket design rumah
  Route::post('/designrumah','C_DataPaketDesignRumah@store');
  Route::get('/designrumah/{m_DataPaketDesign}/edit', 'C_DataPaketDesignRumah@edit');
  Route::patch('/designrumah/{m_DataPaketDesign}', 'C_DataPaketDesignRumah@update');
});

// Route user = Customers
Route::group(['middleware'=>['auth','CheckRole:Customers']], function(){

});
