<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\ProductsController;

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

Route::get("/", [LoginController::class, "index"])->name("login")->middleware(['guest', 'prevent-back-history']);
Route::post("/do-login", [LoginController::class, "doLogin"])->name("doLogin");

Route::get("/do-logout", [LoginController::class, "doLogout"])->name("doLogout");
Route::get("/welcome", [ProductsController::class, "index"])->name("welcome")->middleware("auth");
Route::get("/register", [ProductsController::class, "register"])->name("register")->middleware("auth");
Route::post("/do-register", [ProductsController::class, "doRegister"])->name("doRegister")->middleware("auth");

Route::get("/edit/{id}", [ProductsController::class, "edit"])->name("edit")->middleware("auth");
Route::post("/update/{id}", [ProductsController::class, "doUpdate"])->name("doUpdate")->middleware("auth");

Route::get("/delete/{id}", [ProductsController::class, "delete"])->name("delete")->middleware("auth");
Route::get("/add", [ProductsController::class, "add"])->name("add")->middleware("auth");
