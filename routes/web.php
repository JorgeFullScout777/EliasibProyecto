<?php

use App\Http\Controllers\ActorsController;
use App\Http\Controllers\AddressesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\FilmsController;
use App\Http\Controllers\FilmsActorsController;
use App\Http\Controllers\FilmsCategoriesController;
use App\Http\Controllers\FilmsTextsController;
use App\Http\Controllers\LanguagesController;
use App\Http\Controllers\InventoriesController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\RentalsController;
use App\Http\Controllers\StoresController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
})->name('index');

# Actors routes
Route::get('/Actors', [ActorsController::class, 'index'])->name('Actors.index');
Route::post('/Actors', [ActorsController::class, 'store'])->name('Actors.store');
Route::put('/actors/{id}', [ActorsController::class, 'update'])->name('Actors.update');
Route::delete('/actors/{id}', [ActorsController::class, 'destroy'])->name('Actors.destroy');

# Addresses routes
Route::get('/Address', [AddressesController::class, 'index'])->name('Address.index');
Route::post('/Address', [AddressesController::class, 'store'])->name('Address.store');
Route::put('/address/{id}', [AddressesController::class, 'update'])->name('Address.update');
Route::delete('/address/{id}', [AddressesController::class, 'destroy'])->name('Address.destroy');

# Categories routes
Route::get('/Categories', [CategoriesController::class, 'index'])->name('Categories.index');

# Cities routes
Route::get('/Citys', [CitiesController::class, 'index'])->name('Citys.index');

# Customers routes
Route::get('/Customers', [CustomersController::class, 'index'])->name('Customers.index');
Route::post('/Customers', [CustomersController::class, 'store'])->name('Customers.store');
Route::put('/customers/{id}', [CustomersController::class, 'update'])->name('Customers.update');
Route::delete('/customers/{id}', [CustomersController::class, 'destroy'])->name('Customers.destroy');

# Films routes
Route::get('/Films', [FilmsController::class, 'index'])->name('Films.index');
Route::post('/Films', [FilmsController::class, 'store'])->name('Films.store');
Route::put('/films/{id}', [FilmsController::class, 'update'])->name('Films.update');
Route::delete('/films/{id}', [FilmsController::class, 'destroy'])->name('Films.destroy');

# FilmsActors routes
Route::get('/Flim_Actor', [FilmsActorsController::class, 'index'])->name('FilmsActors.index');

# FilmsCategories routes
Route::get('/Flim_Category', [FilmsCategoriesController::class, 'index'])->name('FilmsCategories.index');

# FilmsText routes
Route::get('/Film_text', [FilmsTextsController::class, 'index'])->name('FilmsTexts.index');
Route::post('/Film_text', [FilmsTextsController::class, 'store'])->name('FilmsTexts.store');
Route::put('/film_text/{id}', [FilmsTextsController::class, 'update'])->name('FilmsTexts.update');
Route::delete('/film_text/{id}', [FilmsTextsController::class, 'destroy'])->name('FilmsTexts.destroy');

# Inventories routes
Route::get('/Inventories', [InventoriesController::class, 'index'])->name('Inventories.index');
Route::post('/Inventories', [InventoriesController::class, 'store'])->name('Inventories.store');
Route::put('/inventories/{id}', [InventoriesController::class, 'update'])->name('Inventories.update');
Route::delete('/inventories/{id}', [InventoriesController::class, 'destroy'])->name('Inventories.destroy');

# Languages routes
Route::get('/Languages', [LanguagesController::class, 'index'])->name('Languages.index');

# Payments routes
Route::get('/Payments', [PaymentsController::class, 'index'])->name('Payments.index');
Route::post('/Payments', [PaymentsController::class, 'store'])->name('Payments.store');
Route::put('/payments/{id}', [PaymentsController::class, 'update'])->name('Payments.update');
Route::delete('/payments/{id}', [PaymentsController::class, 'destroy'])->name('Payments.destroy');

# Rentals routes
Route::get('/Rentals', [RentalsController::class, 'index'])->name('Rentals.index');
Route::post('/Rentals', [RentalsController::class, 'store'])->name('Rentals.store');
Route::put('/rentals/{id}', [RentalsController::class, 'update'])->name('Rentals.update');
Route::delete('/rentals/{id}', [RentalsController::class, 'destroy'])->name('Rentals.destroy');

# Staff routes
Route::get('/Staff', [StaffController::class, 'index'])->name('Staff.index');
Route::post('/Staff', [StaffController::class, 'store'])->name('Staff.store');
Route::put('/staff/{id}', [StaffController::class, 'update'])->name('Staff.update');
Route::delete('/staff/{id}', [StaffController::class, 'destroy'])->name('Staff.destroy');

# Stores routes
Route::get('/Stores', [StoresController::class, 'index'])->name('Stores.index');
