<?php

use App\Models\CountryFlag;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainerController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[TrainerController::class, 'CountryFlag'])->name('country.flag');
Route::post('/store/trainer',[TrainerController::class, 'StoreTrainer'])->name('store.trainer');
