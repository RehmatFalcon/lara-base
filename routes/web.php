<?php

use App\Http\Controllers\ProfileController;
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


    Route::prefix("/inventory")->group(function() {
        Route::get("/category", [\App\Http\Controllers\Inventory\CategoryController::class, 'index'])->name("inventory.category.index");
        Route::get("/category/add", [\App\Http\Controllers\Inventory\CategoryController::class, 'add'])->name("inventory.category.add");
        Route::post("/category/add", [\App\Http\Controllers\Inventory\CategoryController::class, 'AddPost'])->name("inventory.category.add.post");

        Route::get("/category/edit/{id}", [\App\Http\Controllers\Inventory\CategoryController::class, 'Edit'])->name("inventory.category.edit");
        Route::post("/category/edit", [\App\Http\Controllers\Inventory\CategoryController::class, 'EditPost'])->name("inventory.category.edit.post");

        Route::get("/product", [\App\Http\Controllers\Inventory\ProductController::class, 'index'])->name("inventory.product.index");
        Route::get("/product/add", [\App\Http\Controllers\Inventory\ProductController::class, 'add'])->name("inventory.product.add");
        Route::post("/product/add", [\App\Http\Controllers\Inventory\ProductController::class, 'AddPost'])->name("inventory.product.add.post");

        Route::get("/product/edit/{id}", [\App\Http\Controllers\Inventory\ProductController::class, 'Edit'])->name("inventory.product.edit");
        Route::post("/product/edit", [\App\Http\Controllers\Inventory\ProductController::class, 'EditPost'])->name("inventory.product.edit.post");


    });


});

require __DIR__ . '/auth.php';
