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
Route::post('payments/notification', 'C_payment@notification');
Route::get('payments/completed','C_payment@completed');
Route::get('payments/failed','C_payment@failed');
Route::get('payments/unfinish','C_payment@unfinish');
// Route::get('/payments/unfinish','C_payment@index');

Auth::routes();
//route all user
Route::group(['middleware'=> 'auth'], function(){
  Route::get('/dashboard', 'HomeController@index')->name('dashboard');
  Route::get('/paketdesign', 'CPaketDesign@index')->name('paketdesign1'); //design Interior
  Route::get('/paketdesign/create', 'CPaketDesign@create'); // paket dessign interior
  Route::get('/paketdesign/{paketdesign}', 'CPaketDesign@show');
  Route::get('/designrumah','C_DataPaketDesignRumah@index')->name('designrumah'); // design rumah
  Route::get('/designrumah/create','C_DataPaketDesignRumah@create'); //paket design rumah
  Route::get('/designrumah/{m_DataPaketDesign}','C_DataPaketDesignRumah@show');
  Route::get('/profilsaya','HomeController@profil')->name('profilsaya');
  Route::get('/profilsaya/{User}/edit','HomeController@edit');
  Route::patch('/profilsaya/{User}','HomeController@updateProfil');

  // Route::get('/designrumah','C_DataPaketDesignRumah@index')->name('designrumah'); // design rumah
  // Route::get('/designrumah/{m_DataPaketDesign}','C_DataPaketDesignRumah@show');
});

// Route user = designer
Route::group(['middleware'=>['auth','CheckRole:Designers']], function(){
  Route::post('/paketdesign', 'CPaketDesign@store');
  Route::get('/paketdesign/{paketdesign}/edit', 'CPaketDesign@edit');
  Route::patch('/paketdesign/{paketdesign}','CPaketDesign@update');
  Route::post('/designrumah','C_DataPaketDesignRumah@store');
  Route::get('/designrumah/{m_DataPaketDesign}/edit', 'C_DataPaketDesignRumah@edit');
  Route::patch('/designrumah/{m_DataPaketDesign}', 'C_DataPaketDesignRumah@update');
  Route::patch('/dashboard/{m_PesananDesign}', 'HomeController@verifikasi');
  Route::get('/profilUser/{m_PesananDesign}','HomeController@profilUser')->name('profilUSer');
  Route::get('/riwayatpesanan','C_PesananDesign@RiwayatPemesanan')->name('riwayatpesanan');

});

// Route user = Customers
Route::group(['middleware'=>['auth','CheckRole:Customers']], function(){
  Route::get('/fpdesignrumah/{m_DataPaketDesign}','C_DataPaketDesignRumah@createPesananRumah')->name('fpdesignrumah');
  Route::get('/fpdesigninterior/{paketdesign}','CPaketDesign@createPesananInterior')->name('fpdesignInterior');
  Route::post('/pdesignrumah','C_PesananDesign@store')->name('pdesignrumah');
  Route::post('/pdesigninterior','C_PesananDesign@storeInterior')->name('pdesigninterior');
  Route::delete('/pesanan/{m_PesananDesign}', 'C_PesananDesign@destroy'); //hapus data permanen
  Route::get('/pesananBayar','C_PesananDesign@indexBelumBayar')->name('pesananBayar');
  Route::get('/pesananProses','C_PesananDesign@indexProsesDesign')->name('pesananProses');
  Route::get('/pesananSelesai','C_PesananDesign@indexSelesaiDesign')->name('pesananSelesai');
  Route::get('/pesananDibatalkan','C_PesananDesign@indexDibatalkan')->name('pesananDibatalkan');
  Route::patch('/pesananDibatalkan/{m_PesananDesign}','C_PesananDesign@BatalkanPesanan');
  Route::get('/profilDesigner/{User}','C_DataPaketDesignRumah@profilDesigner')->name('profilDesigner');
});
