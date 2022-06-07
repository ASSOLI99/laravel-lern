<?php
use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
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

//all
Route::get('/listings',[ListingController::class, 'index']);

//show create form
Route::get('/listings/create',[ListingController::class, 'create']);

//store listing data
Route::post('/listings',[ListingController::class, 'store']);

//single
Route::get('/listings/{id}',[ListingController::class, 'show']);