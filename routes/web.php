<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoreController;
use App\Http\Controllers\LangController;

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

    // Route::get('', function () {

    //     return view('index');
    // });

//CoreControllers
Route::get('/', [CoreController::class, 'index']);
Route::get('/view', [CoreController::class, 'view']);
Route::get('/edit', [CoreController::class, 'edit']);
Route::get('/list', [CoreController::class, 'list']);
Route::get('/create', [CoreController::class, 'create']);
Route::get('/history', [CoreController::class, 'history']);
Route::get('/salercontact', [CoreController::class, 'salercontact']);


//LangControllers
Route::get('/change', [LangController::class, 'change'])->name('changeLang');


