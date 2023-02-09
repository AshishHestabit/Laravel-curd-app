<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\showData;
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

Route::get('show',[showData::class,'list']);

Route::get('delete/{id}',[showData::class,'delete']);

Route::post('insert',[showData::class,'insert']);

Route::get('edit/{id}',[showData::class,'edit']);

Route::post('update',[showData::class,'update']);


// Route::view('sho','show');



