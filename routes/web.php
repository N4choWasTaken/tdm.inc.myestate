<?php

use App\Models\Recipe;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EstateController;
use Illuminate\Routing\Route as RoutingRoute;

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

//All recipes
Route::get('/', [EstateController::class, 'index']);

//Show create form
Route::get('recipes/create', [EstateController::class, 'create'])->middleware('auth');

//Store Recipe Data
Route::post('recipes', [EstateController::class, 'store'])->middleware('auth');

//show Edit Form
Route::get('/recipes/{recipe}/edit', [EstateController::class, 'edit'])->middleware('auth');

//Update Recipes
Route::put('/recipes/{recipe}', [EstateController::class, 'update'])->middleware('auth');

//Delete Recipes
Route::delete('/recipes/{recipe}', [EstateController::class, 'destroy'])->middleware('auth');

//Manage Recipes
Route::get('/recipes/manage', [EstateController::class, 'manage'])->middleware('auth');

//Single recipe
Route::get('recipes/{recipe}', [EstateController::class, 'show']);

//Show register Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create New User
Route::post('/users', [UserController::class, 'store']);

//Log User out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log in User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


