<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TimetableController;
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
    Route::get('allclasslist',[TimetableController::class,'allclasslist'])->name('classlist');
    Route::get('sectionlist/{classid?}',[TimetableController::class,'sectionlist'])->name('sectionlist');
    Route::post('checkconfig',[TimetableController::class,'checkconfig'])->name('checkconfig');
    Route::post('saveconfig',[TimetableController::class,'saveconfig'])->name('saveconfig');
    Route::post('loadconfig',[TimetableController::class,'loadconfig'])->name('loadconfig');
    Route::post('loadslot',[TimetableController::class,'loadslot'])->name('loadslot');
    Route::post('updateslot',[TimetableController::class,'updateslot'])->name('updateslot');
});
require __DIR__.'/auth.php';
