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

// Route untuk paket data designer
Route::group(['middleware'=>['auth','CheckRole:Designers']], function(){
  // paket dessign interior
  Route::get('/dashboardDesigner', 'HomeController@index')->name('dashboardDesigner');
  Route::get('/paketdesign', 'CPaketDesign@index')->name('paketdesign1');
  Route::get('/paketdesign/create', 'CPaketDesign@create');
  Route::get('/paketdesign/{paketdesign}', 'CPaketDesign@show');
  Route::post('/paketdesign', 'CPaketDesign@store');
  // Route::delete('/paketdesign/{paketdesign}', 'CPaketDesign@destroy'); //hapus data permanen
  Route::get('/paketdesign/{paketdesign}/edit', 'CPaketDesign@edit');
  Route::patch('/paketdesign/{paketdesign}','CPaketDesign@update');
  //paket design rumah
  Route::get('/designrumah','C_DataPaketDesignRumah@index')->name('designrumah');
  Route::get('/designrumah/create','C_DataPaketDesignRumah@create');
  Route::get('/designrumah/{m_DataPaketDesign}','C_DataPaketDesignRumah@show');
  Route::post('/designrumah','C_DataPaketDesignRumah@store');
  Route::get('/designrumah/{m_DataPaketDesign}/edit', 'C_DataPaketDesignRumah@edit');
  Route::patch('/designrumah/{m_DataPaketDesign}', 'C_DataPaketDesignRumah@update');
});

//route paket design unser
Route::group(['middleware'=>['auth','CheckRole:Customers']], function(){
  Route::get('/dashboard', 'HomeController@indexUser')->name('dashboard');
  Route::get('/paketdesignUser', 'CPaketDesign@paketdesignUser')->name('paketdesign2');
  Route::get('/paketdesignUser/{paketdesign}', 'CPaketDesign@lihat');
  Route::get('/designrumahUser', 'C_DataPaketDesignRumah@designrumahUser')->name('designrumahUser');
  Route::get('/designrumahUser/{m_DataPaketDesign}', 'C_DataPaketDesignRumah@showUser');

});
