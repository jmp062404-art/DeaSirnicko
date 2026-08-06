<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\PermitController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
});

// TAX ROUTES
Route::get('/taxpayers', [TaxController::class, 'index'])->name('admin.taxpayer.index');
Route::get('/taxpayers/create', [TaxController::class, 'create'])->name('admin.taxpayer.create');
Route::post('/taxpayers', [TaxController::class, 'store'])->name('admin.taxpayer.store');
Route::get('/taxpayers/{taxpayer}/edit', [TaxController::class, 'edit'])->name('admin.taxpayer.edit');
Route::put('/taxpayers/{taxpayer}', [TaxController::class, 'update'])->name('admin.taxpayer.update');
Route::delete('/taxpayers/{taxpayer}', [TaxController::class, 'destroy'])->name('admin.taxpayer.destroy');

// PERMIT ROUTES
Route::get('/permits', [PermitController::class, 'index'])->name('admin.permit.index');
Route::get('/permits/create', [PermitController::class, 'create'])->name('admin.permit.create');
Route::post('/permits', [PermitController::class, 'store'])->name('permit.store');
Route::get('/permits/{permit}/edit', [PermitController::class, 'edit'])->name('admin.permit.edit');
Route::put('/permits/{permit}', [PermitController::class, 'update'])->name('admin.permit.update');
Route::delete('/permits/{permit}', [PermitController::class, 'destroy'])->name('admin.permit.destroy');

// REPORT ROUTES
Route::get('/reports', [ReportController::class, 'index'])->name('report.index');
Route::get('/admin/reports', [ReportController::class, 'index'])->name('admin.report.index');
Route::get('/admin/reports/generate', [ReportController::class, 'generate'])->name('admin.report.generate');

// PAYMENT ROUTES
Route::get('/payment', [PaymentController::class, 'index'])->name('admin.payment.index');
Route::get('/payment/create', [PaymentController::class, 'create'])->name('admin.payment.create');
Route::post('/payment', [PaymentController::class, 'store'])->name('admin.payment.store');
Route::get('/payment/{payment}', [PaymentController::class, 'show'])->name('admin.payment.show');
Route::get('/payment/{payment}/edit', [PaymentController::class, 'edit'])->name('admin.payment.edit');
Route::put('/payment/{payment}', [PaymentController::class, 'update'])->name('admin.payment.update');
Route::delete('/payment/{payment}', [PaymentController::class, 'destroy'])->name('admin.payment.destroy');

// Show form
//show the files
Route::get('/file/create', function(){
    return view('file'); // loads resources/views/file.blade.php
})->name('file.create');

// Store job order data (calls your controller store method)
Route::post('/file/store', [FileController::class, 'store'])
    ->name('file.store');

Route::get('/college', [CollegeController::class, 'index'])->name('college.index');
Route::get('/college/create', [CollegeController::class, 'create'])->name('college.create');
Route::post('/college', [CollegeController::class, 'store'])->name('college.store');

Route::get('/items', [App\Http\Controllers\ItemController::class, 'index']);

Route::get('/products', [ProductController::class, 'index']);

require __DIR__.'/auth.php';
