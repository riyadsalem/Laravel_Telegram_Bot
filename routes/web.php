<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TelegramController;

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
    return view('telegramView');
});


Route::get('/updated-activity', [TelegramController::class ,'updatedActivity'] );


Route::get('/', [TelegramController::class ,'sendMessage'] );

Route::post('/send-message', [TelegramController::class ,'storeMessage'] );


Route::post('/store-photo', [TelegramController::class ,'storePhoto'] );
