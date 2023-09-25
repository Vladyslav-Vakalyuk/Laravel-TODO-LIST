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

Route::post('/create', [\App\Http\Controllers\TodoListController::class, 'create'])->middleware(['auth', 'verified'])->name('task.create');
Route::post('/update', [\App\Http\Controllers\TodoListController::class, 'update'])->middleware(['auth', 'verified'])->name('task.update');
Route::post('/destroy', [\App\Http\Controllers\TodoListController::class, 'destroy'])->middleware(['auth', 'verified'])->name('task.destroy');
Route::post('/completed', [\App\Http\Controllers\TodoListController::class, 'completed'])->middleware(['auth', 'verified'])->name('task.completed');


//Route::post('/create', [\App\Http\Controllers\TodoListController::class, 'create'])->middleware(['auth', 'verified'])->name('task.create');
Route::get('/dashboard', [\App\Http\Controllers\TodoListController::class, 'createTask'])->middleware(['auth', 'verified'])->name('task.createTask');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
