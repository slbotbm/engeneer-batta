<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
<<<<<<< HEAD
=======
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\SupermarketController;
>>>>>>> 9dc8343f25d9df3aa827045ac10dee5e3ffb2df4

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

<<<<<<< HEAD
Route::resource('recipe', RecipeController::class);
=======
Route::middleware('auth')->group(function () {
    Route::resource('recipe', RecipeController::class);
    Route::resource('ingredient', IngredientController::class);
    Route::resource('supermarket', SupermarketController::class);
});
>>>>>>> 9dc8343f25d9df3aa827045ac10dee5e3ffb2df4

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
