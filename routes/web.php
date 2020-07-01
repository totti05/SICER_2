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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/evolution', 'EvolutionController');
Route::resource('/cell', 'CellController');
Route::resource('/fail', 'FailController');
Route::resource('/bath', 'BathController');
Route::resource('/infoline', 'InfolineController');
Route::resource('/crucible', 'CrucibleController');


Route::get('/celldata', 'CellController@CellDataChart')->name('cell.dataChart');
Route::get('/celldatable', 'CellController@CellDataTable')->name('cell.datatable');
Route::post('/celldatable', 'CellController@CellDataTable')->name('cell.datatablep');

Route::get('/evolutionChartPredet', 'EvolutionController@EvolutionDataChartGet')->name('evolution.dataChart');
Route::post('/evolutionChartPredet', 'EvolutionController@EvolutionDataChartPost')->name('evolution.dataChartPrePost');
Route::post('/evolutionChart', 'EvolutionController@EvolutionDataChart')->name('evolution.dataChartp');
Route::get('/lineV', 'EvolutionController@lineV')->name('evolution.lineaV');
Route::post('/cellChart', 'CellController@CellDataChartTable')->name('cell.dataChartp');