<?php

use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [RecipeController::class, 'index']);

// create form file location
Route::get('/recipes/create', [RecipeController::class, 'create'])->middleware('auth');
// send data to the database
Route::post('/recipes', [RecipeController::class, 'store'])->middleware('auth');
// show edit form UI or front end
Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->middleware('auth');
// update file data
Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->middleware('auth');

// delete data
Route::delete('/recipes/{recipe}', [RecipeController::class, 'delete'])->middleware('auth');

// get all recipe
Route::get('/recipes/manage', [RecipeController::class, 'manage']);

// get all recipe
Route::get('/recipes/{recipe}', [RecipeController::class, 'show']);
// Route::get('/', function () {
//     return view('index');
// });


// USER LOGIN, REGISTER FIELDS

// registration form field
Route::get('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/user/register', [UserController::class, 'store']);



Route::get('/user/{user}/edit', [UserController::class, 'edit'])->middleware('auth');
Route::put('/user/update', [UserController::class, 'update'])->middleware('auth');


Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/user/authenticate', [UserController::class, 'authenticate'])->middleware('guest');


Route::get('/user/profile', [UserController::class, 'userprofile'])->middleware('auth');
