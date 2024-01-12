<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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
});

require __DIR__.'/auth.php';

    // Routes accessible only to users with the 'Admin' role
Route::middleware(['auth', 'checkRoleAndPermission:Admin'])->group(function () {

    Route::get('/admin/create', [TaskController::class, 'create'])->name('admin.create.task');
    Route::post('/admin/store', [TaskController::class, 'store'])->name('admin.store.tasks');
    Route::get('/admin/tasks/edit/{task}', [TaskController::class, 'edit'])->name('admin.tasks.edit');
    Route::post('/admin/tasks/update/{task}', [TaskController::class, 'update'])->name('admin.update.tasks');
    Route::get('/admin/destroy/{taskId}', [TaskController::class, 'destroy'])->name('tasks.destroy');

});

    // Routes accessible only to users with the 'Manager' role
Route::middleware(['auth', 'checkRoleAndPermission:Manager'])->group(function () {

    Route::get('/manager/tasks/edit/{task}', [TaskController::class, 'edit'])->name('manager.tasks.edit');
    Route::post('/manager/tasks/update/{task}', [TaskController::class, 'update'])->name('manager.update.tasks');


});

    // Routes accessible only to users with the 'User' role
Route::middleware(['auth', 'checkRoleAndPermission:User'])->group(function () {

    Route::get('/user/tasks', [TaskController::class, 'index'])->name('tasks.index.user');

});

Route::get('/tasks/view', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/search/tasks', [TaskController::class, 'search'])->name('search.tasks');
