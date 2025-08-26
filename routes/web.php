<?php

use App\Http\Controllers\admin\basicController;
use App\Http\Controllers\admin\bultstudentinputController;
use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\website\regFormController;
use App\Http\Controllers\website\studentSearchController;
use App\Http\Controllers\website\webController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/', [webController::class, 'index']);
Route::get('/reg', [regFormController::class, 'index']);
Route::get('/reg/store', [regFormController::class, 'store']);
Route::get('/get-districts/{division_id}', [regFormController::class, 'getDistricts']);
Route::get('/get-upazilas/{district_id}', [regFormController::class, 'getUpazilas']);
Route::post('/student/store', [regFormController::class, 'store']);
Route::post('/students/search', [studentSearchController::class, 'search'])->name('students.search');

Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard/basic', [basicController::class, 'basic'])->name('admin.basic.dashboard');
    Route::get('/dashboard/bulk/student', [bultstudentinputController::class, 'bulk'])->name('admin.bulk.dashboard');
    Route::get('/dashboard/bulk/student/list', [bultstudentinputController::class, 'list'])->name('students.list');
    Route::post('/import-excel', [bultstudentinputController::class, 'importExcel'])->name('import.excel');
    Route::get('/download-demo', [bultstudentinputController::class, 'downloadDemo'])->name('download.demo');

    Route::get('/student/delete/{id}', [bultstudentinputController::class, 'delete'])->name('student.delete');
    Route::put('/student/update/{id}', [bultstudentinputController::class, 'update'])->name('student.update');
});
