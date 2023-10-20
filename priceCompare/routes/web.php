<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\SupermarketController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Auth\GoogleSocialiteController;

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
Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);  // redirect to google login
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);    // callback route after google account chosen

Route::middleware('auth')->group(function () {
    Route::get('/recipe/search/input', [SearchController::class, 'create'])->name('search.input');
    Route::get('/recipe/search/result', [SearchController::class, 'index'])->name('search.result');
    Route::resource('recipe', RecipeController::class);
    Route::resource('ingredient', IngredientController::class);
    Route::resource('supermarket', SupermarketController::class);
    Route::post('recipe/{id}/pricelist', [RecipeController::class, 'priceList'])->name('recipe.priceList');
    Route::post('recipe/{id}/cheapest', [RecipeController::class, 'cheapest'])->name('recipe.cheapest');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return redirect()->route('recipe.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
