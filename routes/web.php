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
    return view('auth.login');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/create', [App\Http\Controllers\MainController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/storeMemberData', [App\Http\Controllers\MainController::class, 'storeMemberData'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [App\Http\Controllers\MainController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/edit', [App\Http\Controllers\MainController::class, 'edit'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/edit/{id}', [App\Http\Controllers\MainController::class, 'editMember'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/viewadmin/{id}', [App\Http\Controllers\MainController::class, 'viewMemberAdmin'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/viewadminall', [App\Http\Controllers\MainController::class, 'viewMemberAdminAll'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/newmember', [App\Http\Controllers\MainController::class, 'newmember'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/newmemberData', [App\Http\Controllers\MainController::class, 'storenewmember'])->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
