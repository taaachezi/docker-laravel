<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContentController;

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
    logger("welcome route.");
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get("/input", [ContentController::class, "input"])->name("input");
Route::post("/save", [ContentController::class, "save"])->name("save");
Route::get("/index", [ContentController::class, "index"])->name("index");
Route::get("/show/{content_id}", [ContentController::class, "show"])->name("show");
Route::get("/edit/{content_id}", [ContentController::class, "edit"])->name("edit");
Route::post("/update", [ContentController::class, "update"])->name("update");
Route::post("/delete", [ContentController::class, "delete"])->name("delete");