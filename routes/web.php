<?php

use App\Http\Controllers\SMSControler;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middlewarex group. Now create something great!
|
*/

Route::get('/',[SMSControler::class , 'index' ] );
Route::get('/sms/{id}',[SMSControler::class , 'show' ] );
Route::post('/sms',[SMSControler::class , 'store' ]);
Route::get('/status',[StatusController::class , 'index' ]);



