<?php
use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
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
Route::get('/',[ListingController::class, 'index']);

//show create form
Route::get('/listings/create',[ListingController::class, 'create'])->middleware('auth');

//store listing data
Route::post('/listings',[ListingController::class, 'store']);

//show edit form
Route::get('/listings/{id}/edit',[ListingController::class, 'edit'])->middleware('auth');

//update listing
Route::put('/listings/{id}',[ListingController::class, 'update'])->middleware('auth');

//DELETE listing
Route::delete('/listings/{id}',[ListingController::class, 'destroy'])->middleware('auth');

//single
Route::get('/listings/{id}',[ListingController::class, 'show']);

//show register form
Route::get('/register',[UserController::class,'create'])->middleware('guest');

//create new user
Route::post('/users',[UserController::class,'store']);

//log user out
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');

//show login form
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

//login user
Route::post('/users/authenticate',[UserController::class,'authenticate']);

